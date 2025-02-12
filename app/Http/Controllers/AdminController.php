<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Tampilkan daftar admin
    public function index()
    {
        $admins = Admin::all();
        return view('admin.index', compact('admins'));
    }

    // Tampilkan form untuk menambah admin baru
    public function create()
    {
        return view('admin.create');
    }

    // Simpan admin baru
    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:6|confirmed'
        ]);

        Admin::create([
            'nama'  => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.index')->with('success', 'Admin berhasil ditambahkan.');
    }

    // Tampilkan form edit untuk admin
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.edit', compact('admin'));
    }

    // Perbarui admin
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $request->validate([
            'nama'  => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            // Password opsional; jika kosong, jangan update
        ]);

        $data = [
            'nama'  => $request->nama,
            'email' => $request->email,
        ];
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'string|min:6|confirmed'
            ]);
            $data['password'] = Hash::make($request->password);
        }

        $admin->update($data);
        return redirect()->route('admin.index')->with('success', 'Admin berhasil diperbarui.');
    }

    // Hapus admin
    public function destroy($id)
    {
        Admin::findOrFail($id)->delete();
        return redirect()->route('admin.index')->with('success', 'Admin berhasil dihapus.');
    }
}
