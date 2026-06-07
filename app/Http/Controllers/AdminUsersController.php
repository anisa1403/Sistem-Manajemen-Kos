<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUsersController extends Controller
{
    public function index(Request $request)
    {
        $query = User::orderBy('id_user');

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($query) use ($search) {
                $query->where('id_user', 'like', "%{$search}%")
                    ->orWhere('username', 'like', "%{$search}%")
                    ->orWhere('nama', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('no_hp', 'like', "%{$search}%");
            });
        }

        $users = $query->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'no_hp' => 'required|string|max:50',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'username' => $validated['username'],
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'no_hp' => $validated['no_hp'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect('/admin/user')->with('success', 'User berhasil ditambahkan');
    }

    public function edit($id_user)
    {
        $user = User::findOrFail($id_user);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id_user)
    {
        $user = User::findOrFail($id_user);

        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $id_user . ',id_user',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id_user . ',id_user',
            'no_hp' => 'required|string|max:50',
            'password' => 'nullable|string|min:6',
        ]);

        $payload = [
            'username' => $validated['username'],
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'no_hp' => $validated['no_hp'],
        ];

        if (!empty($validated['password'])) {
            $payload['password'] = Hash::make($validated['password']);
        }

        $user->update($payload);

        return redirect('/admin/user')->with('success', 'User berhasil diupdate');
    }

    public function destroy($id_user)
    {
        $user = User::findOrFail($id_user);
        $user->delete();

        return redirect('/admin/user')->with('success', 'User berhasil dihapus');
    }
}

