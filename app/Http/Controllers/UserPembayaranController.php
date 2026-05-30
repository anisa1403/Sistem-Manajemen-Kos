<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Sewa;
use Illuminate\Http\Request;

class UserPembayaranController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $sewa = Sewa::with(['kamar.tipeKamar', 'pembayaran'])
            ->where('id_user', $user->id_user)
            ->get();

        $payments = Pembayaran::with('sewa.kamar.tipeKamar')
            ->whereHas('sewa', function ($query) use ($user) {
                $query->where('id_user', $user->id_user);
            })
            ->orderByDesc('created_at')
            ->get();

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
            $paid = $s->pembayaran()->sum('jumlah');
            $due = max(0, $totalContract - $paid);
            if ($due > 0) {
                return redirect('/user/pembayaran/'.$s->id_sewa);
            }
        }

        return redirect('/user/pembayaran')->with('info', 'Belum ada tunggakan.');
    }

    public function create($id)
    {
        $sewa = Sewa::with('kamar.tipeKamar')->findOrFail($id);

        if ($sewa->id_user !== auth()->user()->id_user) {
            abort(403);
        }

        $totalContract = $sewa->kamar->tipeKamar->harga * $sewa->jumlah_bulan;
        $paidAmount = $sewa->pembayaran()->sum('jumlah');
        $due = max(0, $totalContract - $paidAmount);

        if ($due <= 0) {
            return redirect('/user/pembayaran')->with('success', 'Sewa ini sudah lunas.');
        }

        return view('user.pembayaran.create', compact('sewa', 'due'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_sewa' => 'required|exists:sewa,id_sewa',
            'tgl_bayar' => 'required|date',
            'jumlah' => 'required|numeric',
            'bukti' => 'required|image'
        ]);

        $sewa = Sewa::with('kamar.tipeKamar')->findOrFail($request->id_sewa);

        if ($sewa->id_user !== auth()->user()->id_user) {
            abort(403);
        }

        $totalContract = $sewa->kamar->tipeKamar->harga * $sewa->jumlah_bulan;
        $paidAmount = $sewa->pembayaran()->sum('jumlah');
        $due = max(0, $totalContract - $paidAmount);

        if ($due <= 0) {
            return back()->with('error', 'Sewa ini sudah lunas.');
        }

        if ((float) $request->jumlah !== (float) $due) {
            return back()->with('error', 'Jumlah pembayaran harus sesuai dengan tagihan Rp ' . number_format($due, 0, ',', '.'));
        }

        $file = $request->file('bukti')->store('bukti', 'public');

        Pembayaran::create([
            'id_sewa' => $request->id_sewa,
            'tgl_bayar' => $request->tgl_bayar,
            'jumlah' => $request->jumlah,
            'bukti' => $file,
        ]);

        return redirect('/user/pembayaran')->with('success', 'Pembayaran berhasil dikirim.');
    }
}

