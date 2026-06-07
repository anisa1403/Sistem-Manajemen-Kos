<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Sewa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class UserKamarController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Sewa berjalan (due > 0)
        $activeSewa = Sewa::with('kamar.tipeKamar', 'pembayaran')
            ->where('id_user', $user->id_user)
            ->orderByDesc('id_sewa')
            ->get()
            ->first(function ($s) {
                $totalContract = $s->kamar->tipeKamar->harga * $s->jumlah_bulan;
                $paid = $s->pembayaran?->jumlah ?? 0;
                return max(0, $totalContract - $paid) > 0;
            });

        // Allowed kamar untuk aturan "tidak bisa sewa kamar lain":
        // Jika ada sewa berjalan (due > 0) maka hanya kamar milik sewa berjalan yang boleh.
        // Jika tidak ada sewa berjalan (due = 0 / sudah lunas), hanya kamar terakhir yang boleh (agar perpanjangan tidak loncat kamar).
        $allowedNoKamar = null;
        $lastSewaUser = Sewa::with('kamar.tipeKamar', 'pembayaran')
            ->where('id_user', $user->id_user)
            ->orderByDesc('id_sewa')
            ->first();

        if ($activeSewa) {
            $allowedNoKamar = (int) $activeSewa->no_kamar;
        } elseif ($lastSewaUser) {
            $allowedNoKamar = (int) $lastSewaUser->no_kamar;
        }

        $dueActive = null;
        if ($activeSewa) {
            $totalContract = $activeSewa->kamar->tipeKamar->harga * $activeSewa->jumlah_bulan;
            $paid = $activeSewa->pembayaran?->jumlah ?? 0;
            $dueActive = max(0, $totalContract - $paid);
        }

        $kamar = Kamar::with('tipeKamar')
            ->whereDoesntHave('sewa')
            ->get();

        return view('user.kamar.index', [
            'kamar' => $kamar,
            'allowedNoKamar' => $allowedNoKamar,
            'hasActiveSewa' => (bool) $activeSewa,
            'dueActive' => $dueActive,
        ]);

    }
}

