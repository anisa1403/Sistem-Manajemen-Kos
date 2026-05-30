<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\TipeKamar;

class KamarController extends Controller
{

    public function index()
    {
        $data = Kamar::with('tipe')->get();

        return view('admin.kamar.index', compact('data'));
    }

    public function create()
    {
        $tipe = TipeKamar::all();

        return view('admin.kamar.create', compact('tipe'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_tipe' => 'required|exists:tipe_kamars,id_tipe',
            'fasilitas' => 'required|string|max:255'
        ]);

        Kamar::create($validated);

        return redirect('/admin/kamar')
            ->with('success', 'Data kamar berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Kamar::findOrFail($id);
        $tipe = TipeKamar::all();

        return view('admin.kamar.edit', compact('data', 'tipe'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_tipe' => 'required|exists:tipe_kamars,id_tipe',
            'fasilitas' => 'required|string|max:255'
        ]);

        $data = Kamar::findOrFail($id);
        $data->update($validated);

        return redirect('/admin/kamar')
            ->with('success', 'Data kamar berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = Kamar::findOrFail($id);
        $data->delete();

        return redirect('/admin/kamar')
            ->with('success', 'Data kamar berhasil dihapus');
    }
}