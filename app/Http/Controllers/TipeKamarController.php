<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipeKamar;

class TipeKamarController extends Controller
{
    public function index()
    {
        $data = TipeKamar::all();
        return view('admin.tipe_kamar.index', compact('data'));
    }

    public function create()
    {
        return view('admin.tipe_kamar.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipe_kamar' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0'
        ]);

        TipeKamar::create($validated);

        return redirect('/admin/tipe-kamar')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = TipeKamar::findOrFail($id);
        return view('admin.tipe_kamar.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tipe_kamar' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0'
        ]);

        $data = TipeKamar::findOrFail($id);
        $data->update($validated);

        return redirect('/admin/tipe-kamar')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = TipeKamar::findOrFail($id);
        $data->delete();

        return redirect('/admin/tipe-kamar')
            ->with('success', 'Data berhasil dihapus');
    }
}