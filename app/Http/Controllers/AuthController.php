<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Tampilkan form login admin
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login admin
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            $request->session()->put('admin_authenticated', true);
            $request->session()->put('admin_id', $admin->id);
            return redirect()->route('admin.index');
        }

        return redirect()->back()->with('error', 'Email atau password salah.');
    }

    // Proses logout
    public function logout(Request $request)
    {
        $request->session()->forget(['admin_authenticated', 'admin_id']);
        return redirect()->route('login')->with('success', 'Berhasil logout.');
    }
}
