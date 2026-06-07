<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Sewa;
use Illuminate\Http\Request;

class AdminPembayaranController extends Controller
{
    public function index(Request $request)
    {
        $query = Pembayaran::with(['sewa.user', 'sewa.kamar.tipeKamar']);

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($query) use ($search) {
                $query->where('id_pembayaran', 'like', "%{$search}%")
                    ->orWhere('tgl_bayar', 'like', "%{$search}%")
                    ->orWhere('jumlah', 'like', "%{$search}%")
                    ->orWhereHas('sewa', function ($query) use ($search) {
                        $query->where('no_kamar', 'like', "%{$search}%")
                            ->orWhereHas('user', function ($query) use ($search) {
                                $query->where('nama', 'like', "%{$search}%")
                                    ->orWhere('username', 'like', "%{$search}%")
                                    ->orWhere('email', 'like', "%{$search}%");
                            });
                    })
                    ->orWhereHas('sewa.kamar.tipeKamar', function ($query) use ($search) {
                        $query->where('tipe_kamar', 'like', "%{$search}%");
                    });
            });
        }

        $pembayaran = $query->get();

        return view('admin.pembayaran.index', compact('pembayaran'));
    }

    public function create()
    {
        $sewas = Sewa::with(['user', 'kamar.tipeKamar'])
            ->doesntHave('pembayaran')
            ->get();

        return view('admin.pembayaran.create', compact('sewas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_sewa' => 'required|exists:sewa,id_sewa',
            'tgl_bayar' => 'required|date',
            'jumlah' => 'required|numeric|min:1',
            'bukti' => 'required|image'
        ]);

        $sewa = Sewa::with(['kamar.tipeKamar', 'pembayaran'])->findOrFail($request->id_sewa);

        if ($sewa->pembayaran) {
            return back()->with('error', 'Pembayaran untuk sewa ini sudah ada.');
        }

        $totalContract = $sewa->kamar->tipeKamar->harga * $sewa->jumlah_bulan;
        $due = max(0, $totalContract);

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

        return redirect('/admin/pembayaran')->with('success', 'Data pembayaran berhasil ditambahkan.');
    }

    public function show($id)
    {
        $pembayaran = Pembayaran::with(['sewa.user', 'sewa.kamar.tipeKamar'])->findOrFail($id);

        return view('admin.pembayaran.show', compact('pembayaran'));
    }

    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        if ($pembayaran->bukti &&
            \Storage::disk('public')->exists($pembayaran->bukti)) {

            \Storage::disk('public')->delete($pembayaran->bukti);
        }

        $pembayaran->delete();

        return back()->with(
            'success',
            'Data pembayaran berhasil dihapus.'
        );
    }

    public function cetakSemua(Request $request)
    {
        $q = $request->get('q');
        $pembayaran = \App\Models\Pembayaran::with(['sewa.user'])
            ->when($q, fn($query) => $query->whereHas('sewa.user', fn($u) => $u->where('nama', 'like', "%$q%"))
                ->orWhereHas('sewa', fn($s) => $s->where('no_kamar', 'like', "%$q%")))
            ->orderBy('tgl_bayar', 'desc')
            ->get();

        return view('admin.pembayaran.cetak-semua', compact('pembayaran'));
    }

    public function cetakSatu($id)
    {
        $item = \App\Models\Pembayaran::with(['sewa.user'])->findOrFail($id);
        return view('admin.pembayaran.cetak-satu', compact('item'));
    }
}
