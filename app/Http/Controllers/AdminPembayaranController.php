<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class AdminPembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::with(['sewa.user', 'sewa.kamar.tipeKamar'])->get();

        return view('admin.pembayaran.index', compact('pembayaran'));
    }

    public function show($id)
    {
        $pembayaran = Pembayaran::with(['sewa.user', 'sewa.kamar.tipeKamar'])->findOrFail($id);

        return view('admin.pembayaran.show', compact('pembayaran'));
    }
}
