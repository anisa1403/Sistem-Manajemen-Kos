<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Sewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class UserSewaController extends Controller
{
    private static array $namaBulan = [
        'January' => 'Januari',
        'February' => 'Februari',
        'March' => 'Maret',
        'April' => 'April',
        'May' => 'Mei',
        'June' => 'Juni',
        'July' => 'Juli',
        'August' => 'Agustus',
        'September' => 'September',
        'October' => 'Oktober',
        'November' => 'November',
        'December' => 'Desember',
    ];

    public function create($no_kamar)
    {
        $kamar = Kamar::where('no_kamar', $no_kamar)->firstOrFail();
        $userId = Auth::user()->id_user;

        $lastSewaUser = $this->getLastSewaUser($userId);
        $currentSewa = $this->getCurrentSewa($lastSewaUser);
        $due = $currentSewa ? $this->calculateDue($currentSewa) : null;

        $blockedRoom = false;
        $popupError = null;

        if ($lastSewaUser && (int) $lastSewaUser->no_kamar !== (int) $no_kamar) {
            $blockedRoom = true;
            $popupError = 'Anda hanya bisa memperpanjang / melanjutkan kamar yang sebelumnya Anda sewa.';
        }

        if ($currentSewa && (int) $currentSewa->no_kamar !== (int) $no_kamar) {
            $blockedRoom = true;
            $popupError = 'Hanya bisa menyewa satu kamar. Perpanjang hanya untuk kamar yang sedang Anda sewa.';
        }

        $isPerpanjangan = ! $blockedRoom && $lastSewaUser && (int) $lastSewaUser->no_kamar === (int) $no_kamar && ! $currentSewa;

        $currentEnd = null;
        if ($currentSewa) {
            $currentEnd = Carbon::parse($currentSewa->tgl_masuk)->addMonths($currentSewa->jumlah_bulan);
        } elseif ($isPerpanjangan && $lastSewaUser) {
            $currentEnd = Carbon::parse($lastSewaUser->tgl_masuk)->addMonths($lastSewaUser->jumlah_bulan);
        }

        return view(
            'user.sewa.create',
            compact('kamar', 'currentSewa', 'currentEnd', 'due', 'blockedRoom', 'popupError', 'isPerpanjangan')
        );
    }

    public function store(Request $request)
    {
        $userId = Auth::user()->id_user;

        $rules = [
            'no_kamar' => 'required',
            'jumlah_bulan' => 'required|numeric|min:1',
        ];

        // Ambil sewa terakhir user untuk menentukan apakah ini sewa baru atau perpanjangan
        $lastSewaUser = Sewa::where('id_user', $userId)
            ->orderByDesc('id_sewa')
            ->with('kamar.tipeKamar', 'pembayaran')
            ->first();

        // Cek apakah user punya sewa berjalan (due > 0)
        $currentSewa = null;
        if ($lastSewaUser) {
            $totalContract = $lastSewaUser->kamar->tipeKamar->harga * $lastSewaUser->jumlah_bulan;
            $paid = $lastSewaUser->pembayaran->sum('jumlah');
            if (max(0, $totalContract - $paid) > 0) {
                $currentSewa = $lastSewaUser;
            }
        }

        // Logika input tanggal masuk:
        // Jika user belum punya sewa sama sekali, wajib input tgl_masuk
        // Jika user sudah punya sewa , jangan paksa input tgl_masuk, startDate pakai dari sewa bulan sebelumnya
        if (! $lastSewaUser) {
            $rules['tgl_masuk'] = 'required|date';
        }

        $request->validate($rules);

        // kamar yang diklik tidak boleh sedang disewa user lain apa pun statusnya
        $kamarDipakai = Sewa::where('no_kamar', $request->no_kamar)
            ->where('id_user', '!=', $userId)
            ->exists();

        if ($kamarDipakai) {
            return back()->with('error', 'Kamar sudah disewa!');
        }

        // Jika user pernah sewa sebelumnya walau sudah lunas, user tetap tidak boleh menyewa kamar lain.
        if ($lastSewaUser && (int) $lastSewaUser->no_kamar !== (int) $request->no_kamar) {
            return back()->with('error', 'Anda hanya bisa memperpanjang / melanjutkan kamar yang sebelumnya Anda sewa.');
        }

        // Jika user punya sewa berjalan di kamar lain => block (hanya bisa 1 kamar)
        if ($currentSewa && (int) $currentSewa->no_kamar !== (int) $request->no_kamar) {
            return back()->with('error', 'Hanya bisa menyewa satu kamar. Perpanjang hanya untuk kamar yang sedang Anda sewa.');
        }

        // Untuk perpanjangan: due harus 0, dan start date harus dari akhir sewa sebelumnya
        $due = 0;
        if ($currentSewa) {
            $totalContract = $currentSewa->kamar->tipeKamar->harga * $currentSewa->jumlah_bulan;
            $paidAmount = $currentSewa->pembayaran->sum('jumlah');
            $due = max(0, $totalContract - $paidAmount);

            if ($due > 0) {
                return back()->with('error', 'Selesaikan pembayaran sewa sebelumnya terlebih dahulu sebelum memperpanjang sewa.');
            }
        }

        $startDate = $this->resolveStartDate($request, $lastSewaUser);
        $keteranganBaru = $this->buildKeterangan($startDate, (int) $request->jumlah_bulan);

        $sewa = Sewa::create([
            'id_user' => $userId,
            'no_kamar' => $request->no_kamar,
            'tgl_masuk' => $startDate->format('Y-m-d'),
            'jumlah_bulan' => (int) $request->jumlah_bulan,
            'keterangan' => $keteranganBaru,
        ]);


        return redirect('/user/pembayaran/' . $sewa->id_sewa)
            ->with('success', 'Sewa berhasil dibuat. Lanjutkan ke pembayaran.');
    }

    private function getLastSewaUser(int $userId): ?Sewa
    {
        return Sewa::where('id_user', $userId)
            ->with('kamar.tipeKamar', 'pembayaran')
            ->orderByDesc('id_sewa')
            ->first();
    }

    private function getCurrentSewa(?Sewa $lastSewaUser): ?Sewa
    {
        if (! $lastSewaUser) {
            return null;
        }

        return $this->calculateDue($lastSewaUser) > 0 ? $lastSewaUser : null;
    }

    private function calculateDue(Sewa $sewa): int
    {
        $totalContract = $sewa->kamar->tipeKamar->harga * $sewa->jumlah_bulan;
        $paid = $sewa->pembayaran?->jumlah ?? 0;

        return max(0, $totalContract - $paid);
    }

    private function isKamarDipakai($no_kamar, int $userId): bool
    {
        return Sewa::where('no_kamar', $no_kamar)
            ->where('id_user', '!=', $userId)
            ->exists();
    }

    private function resolveStartDate(Request $request, ?Sewa $lastSewaUser): Carbon
    {
        return $lastSewaUser
            ? Carbon::parse($lastSewaUser->tgl_masuk)->addMonths($lastSewaUser->jumlah_bulan) //  tenary ?=if, :else
            : Carbon::parse($request->tgl_masuk);
    }

    private function buildKeterangan(Carbon $startDate, int $jumlahBulan): string
    {
        $bulanList = [];

        for ($i = 0; $i < $jumlahBulan; $i++) {
            $monthName = $startDate->copy()->addMonths($i)->format('F');
            $bulanList[] = self::$namaBulan[$monthName] ?? $monthName;
        }

        return implode(', ', $bulanList);
    }
}


