<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Halaman Home (Guest).
     */
    public function home()
    {
        return view('guest.home');
    }

    /**
     * Tampilkan form Login.
     */
    public function showLogin()
    {
        return view('guest.auth.login');
    }

    /**
     * Proses login sederhana:
     * - username === password  -> Dashboard Admin
     * - selain itu             -> kembali ke Login dengan Alert
     */
    public function login(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($data['username'] === $data['password']) {
            return redirect()->route('dashboard')->with('success', 'Selamat datang, ' . $data['username'] . '!');
        }

        return redirect()->route('login')
            ->withInput($request->only('username'))
            ->with('error', 'Username atau password salah.');
    }

    /**
     * Tampilkan form Register.
     */
    public function showRegister()
    {
        return view('guest.auth.register');
    }

    /**
     * Simpan akun baru lalu arahkan ke halaman Login.
     */
    public function register(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        // password otomatis di-hash oleh cast 'hashed' pada model User
        User::create($data);

        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }
}
