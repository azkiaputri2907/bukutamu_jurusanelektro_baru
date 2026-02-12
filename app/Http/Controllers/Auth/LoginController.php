<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // Tambahkan ini

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Redirect default jika method authenticated tidak ditemukan
     */
    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Logika pengalihan setelah login berhasil
     */
    protected function authenticated(Request $request, $user)
    {
        // Cek nama role dari relasi 'role' di model User
        if ($user->role && $user->role->nama_role === 'Administrator') {
            return redirect('/dashboard'); // Arahkan ke dashboard admin
        } elseif ($user->role && $user->role->nama_role === 'Ketua Jurusan') {
            return redirect('/dashboard'); // Arahkan ke dashboard yang sama (karena sidebar Anda sudah otomatis)
        }

        // Jika tidak ada role yang cocok, arahkan ke home atau dashboard default
        return redirect('/dashboard');
    }

    protected function loggedOut(\Illuminate\Http\Request $request)
{
    return redirect()->route('guest.landing');
}
}