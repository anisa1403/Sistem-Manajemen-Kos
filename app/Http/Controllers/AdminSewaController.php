<?php

namespace App\Http\Controllers;

use App\Models\Sewa;
use Illuminate\Http\Request;

class AdminSewaController extends Controller
{
    public function index()
    {
        $sewa = Sewa::with(['user', 'kamar.tipeKamar', 'pembayaran'])->get();

        return view('admin.sewa.index', compact('sewa'));
    }

    public function show($id_sewa)
    {
        $sewa = Sewa::with(['user', 'kamar.tipeKamar', 'pembayaran'])->findOrFail($id_sewa);

        return view('admin.sewa.show', compact('sewa'));
    }
}
