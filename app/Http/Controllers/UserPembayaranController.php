<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Sewa;
use Illuminate\Http\Request;

class UserPembayaranController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();

        //filter sewa
        $sewaQuery = Sewa::with(['kamar.tipeKamar', 'pembayaran'])
            ->where('id_user', $user->id_user);

        if ($request->filled('sewa_bulan')) {
            $sewaQuery->whereMonth('tgl_masuk', $request->sewa_bulan);
        }

        if ($request->filled('sewa_jumlah_bulan')) {
            $sewaQuery->where('jumlah_bulan', $request->sewa_jumlah_bulan);
        }

        if ($request->filled('sewa_tgl_mulai')) {
            $sewaQuery->where('tgl_masuk', '>=', $request->sewa_tgl_mulai);
        }
        if ($request->filled('sewa_tgl_selesai')) {
            $sewaQuery->where('tgl_masuk', '<=', $request->sewa_tgl_selesai);
        }

        $sewa = $sewaQuery->get();

        $payQuery = Pembayaran::with('sewa')
            ->whereHas('sewa', fn($q) => $q->where('id_user', $user->id_user));

        if ($request->filled('pay_jumlah_min')) {
            $payQuery->where('jumlah', '>=', $request->pay_jumlah_min);
        }
        if ($request->filled('pay_jumlah_max')) {
            $payQuery->where('jumlah', '<=', $request->pay_jumlah_max);
        }
        if ($request->filled('pay_tgl_mulai')) {
            $payQuery->where('tgl_bayar', '>=', $request->pay_tgl_mulai);
        }
        if ($request->filled('pay_tgl_selesai')) {
            $payQuery->where('tgl_bayar', '<=', $request->pay_tgl_selesai);
        }

        $payments = $payQuery->latest()->get();

        return view('user.pembayaran.index', compact('sewa', 'payments'));
    }

    public function next()
    {
        $user = auth()->user();

        $sewas = Sewa::with(['kamar.tipeKamar', 'pembayaran'])
            ->where('id_user', $user->id_user)
            ->orderByDesc('id_sewa')
            ->get();

        foreach ($sewas as $s) {
            $totalContract = $s->kamar->tipeKamar->harga * $s->jumlah_bulan;
            $paid = $s->pembayaran?->jumlah ?? 0;
            $due  = max(0, $totalContract - $paid);
            if ($due > 0) {
                return redirect('/user/pembayaran/' . $s->id_sewa);
            }
        }

        return redirect('/user/pembayaran')->with('info', 'Belum ada tunggakan.');
    }

    public function create($id)
    {
        $sewa = Sewa::with(['kamar.tipeKamar', 'pembayaran'])->findOrFail($id);

        if ($sewa->id_user !== auth()->user()->id_user) {
            abort(403);
        }

        $totalContract = $sewa->kamar->tipeKamar->harga * $sewa->jumlah_bulan;
        $paidAmount    = $sewa->pembayaran?->jumlah ?? 0;
        $due           = max(0, $totalContract - $paidAmount);

        if ($due <= 0) {
            return redirect('/user/pembayaran')->with('success', 'Sewa ini sudah lunas.');
        }

        return view('user.pembayaran.create', compact('sewa', 'due'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_sewa'  => 'required|exists:sewa,id_sewa',
            'tgl_bayar'=> 'required|date',
            'jumlah'   => 'required|numeric',
            'bukti'    => 'required|image',
        ]);

        $sewa = Sewa::with(['kamar.tipeKamar', 'pembayaran'])->findOrFail($request->id_sewa);

        if ($sewa->id_user !== auth()->user()->id_user) {
            abort(403);
        }

        $totalContract = $sewa->kamar->tipeKamar->harga * $sewa->jumlah_bulan;
        $paidAmount    = $sewa->pembayaran?->jumlah ?? 0;
        $due           = max(0, $totalContract - $paidAmount);

        if ($due <= 0) {
            return back()->with('error', 'Sewa ini sudah lunas.');
        }

        if ((float) $request->jumlah !== (float) $due) {
            return back()->with('error',
                'Jumlah pembayaran harus sesuai dengan tagihan Rp ' . number_format($due, 0, ',', '.')
            );
        }

        if ($sewa->pembayaran) {
            return back()->with('error', 'Pembayaran untuk sewa ini sudah ada.');
        }

        $file = $request->file('bukti')->store('bukti', 'public');

        Pembayaran::create([
            'id_sewa'   => $request->id_sewa,
            'tgl_bayar' => $request->tgl_bayar,
            'jumlah'    => $request->jumlah,
            'bukti'     => $file,
        ]);

        return redirect('/user/pembayaran');
    }

    public function edit($id)
    {
        $pembayaran = Pembayaran::with('sewa.kamar.tipeKamar')->findOrFail($id);

        if ($pembayaran->sewa->id_user !== auth()->user()->id_user) {
            abort(403);
        }

        return view('user.pembayaran.edit', compact('pembayaran'));
    }

    public function update(Request $request, $id)
    {
        $pembayaran = Pembayaran::with('sewa')->findOrFail($id);

        if ($pembayaran->sewa->id_user !== auth()->user()->id_user) {
            abort(403);
        }

        $request->validate([
            'tgl_bayar' => 'required|date',
            'bukti'     => 'nullable|image',
        ]);

        if ($request->hasFile('bukti')) {
            if ($pembayaran->bukti &&
                \Storage::disk('public')->exists($pembayaran->bukti)) {
                \Storage::disk('public')->delete($pembayaran->bukti);
            }
            $pembayaran->bukti = $request->file('bukti')->store('bukti', 'public');
        }

        $pembayaran->tgl_bayar = $request->tgl_bayar;
        $pembayaran->save();

        return redirect('/user/pembayaran');
    }
}