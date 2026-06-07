<?php

namespace App\Http\Controllers;

use App\Models\Sewa;
use Illuminate\Http\Request;

class AdminSewaController extends Controller
{
    public function index(Request $request)
    {
        $query = Sewa::with(['user', 'kamar.tipeKamar', 'pembayaran'])->orderByDesc('id_sewa');

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($query) use ($search) {
                $query->where('id_sewa', 'like', "%{$search}%")
                    ->orWhere('no_kamar', 'like', "%{$search}%")
                    ->orWhere('tgl_masuk', 'like', "%{$search}%")
                    ->orWhere('jumlah_bulan', 'like', "%{$search}%")
                    ->orWhere('keterangan', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($query) use ($search) {
                        $query->where('nama', 'like', "%{$search}%")
                            ->orWhere('username', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%");
                    })
                    ->orWhereHas('kamar.tipeKamar', function ($query) use ($search) {
                        $query->where('tipe_kamar', 'like', "%{$search}%");
                    });
            });
        }

        $sewa = $query->get();

        return view('admin.sewa.index', compact('sewa'));
    }

    public function show($id_sewa)
    {
        $sewa = Sewa::with(['user', 'kamar.tipeKamar', 'pembayaran'])->findOrFail($id_sewa);

        return view('admin.sewa.show', compact('sewa'));
    }
}
