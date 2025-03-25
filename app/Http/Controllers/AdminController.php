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

    // Simpan admin baru
    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'email'     => 'required|email|unique:admins,email',
            'password'  => 'required|string|min:6|confirmed'
        ]);

        try {
            Admin::create([
                'nama'      => $request->nama,
                'email'     => $request->email,
                'password'  => Hash::make($request->password),
            ]);

            return redirect()->route('admin.index')->with('success', 'Admin berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('admin.index')->with('error', 'Terjadi kesalahan saat menambahkan admin.');
        }
    }

    // Perbarui admin
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $request->validate([
            'nama'  => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
        ]);

        try {
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
        } catch (\Exception $e) {
            return redirect()->route('admin.index')->with('error', 'Terjadi kesalahan saat memperbarui admin.');
        }
    }

    // Hapus admin
    public function destroy($id)
    {
        try {
            Admin::findOrFail($id)->delete();
            return redirect()->route('admin.index')->with('success', 'Admin berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('admin.index')->with('error', 'Terjadi kesalahan saat menghapus admin.');
        }
    }
}
