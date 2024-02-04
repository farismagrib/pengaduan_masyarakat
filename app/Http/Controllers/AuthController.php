<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.auth.index');
    }

    public function register()
    {
        return view('pages.auth.register');
    }

    public function login_petugas()
    {
        return view('pages.auth.petugas.index');
    }

    public function add(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        Masyarakat::create($data);

        return redirect()->route('login')->with('message', 'Berhasil Membuat Akun');;
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'nik' => 'required',
            'password' => 'required',
        ]);

        if(Auth::guard('masyarakat')->attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('masyarakat-index');
        }
        return redirect()->route('login')->with('auth-message', 'Login Gagal, NIK Atau Password Salah');
    }
    
    public function authenticate_petugas(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::guard('petugas')->attempt($credentials))
        {
            $request->session()->regenerate();
            if(Auth::guard('petugas')->user()->level == 'ADMIN')
            {
                return redirect()->route('admin-index');
            }
            if(Auth::guard('petugas')->user()->level == 'PETUGAS')
            {
                return redirect()->route('admin-index');
            }
        }
        return redirect()->route('petugas')->with('auth-message', 'Login Gagal, Username Atau Password Salah');
    }

    public function logout(Request $request)
    {
        Auth::guard('masyarakat')->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
