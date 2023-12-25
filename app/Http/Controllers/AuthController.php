<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Pengguna;
use App\Models\Supir;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function showSupirRegisterForm()
    {
        return view('auth.supir_register');
    }

    public function supirRegister(Request $request)
    {
        $message = [
            'required' => ':attribute tidak boleh kosong!',
            'password.min' => 'Password harus berisi minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'email.unique' => 'Email sudah dipakai',
        ];

        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'noHP' => 'required',
            'email' => 'required|email|unique:supir,email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ], $message);

        try {
            $supir = new Supir;
            $supir->nama = $request->nama;
            $supir->alamat = $request->alamat;
            $supir->noHP = $request->noHP;
            $supir->email = $request->email;
            $supir->password = Hash::make($request->password);
            $supir->status = 'tersedia';

            $supir->save();

            Alert::success('Registrasi Berhasil', 'Akun supir telah berhasil didaftarkan!')->showConfirmButton('Ok', '#0d6efd');
            return Redirect::route('auth.supir_form');
        } catch (Exception $e) {
            return Redirect::back()->withInput()->withErrors(['error' => 'Registrasi gagal. Silakan coba lagi.']);
        }
    }

    public function showPenggunaRegisterForm()
    {
        return view('auth.pengguna_register');
    }

    public function penggunaRegister(Request $request)
    {
        $message = [
            'required' => ':attribute tidak boleh kosong!',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.min' => 'Password harus berisi minimal 8 karakter',
            'email.unique' => 'Email sudah dipakai',
        ];

        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'noHP' => 'required',
            'email' => 'required|email|unique:pengguna,email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ], $message);

        try {
            $pengguna = new Pengguna;
            $pengguna->nama = $request->nama;
            $pengguna->alamat = $request->alamat;
            $pengguna->noHP = $request->noHP;
            $pengguna->email = $request->email;
            $pengguna->password = Hash::make($request->password);
            $pengguna->status = 'diproses';
            $pengguna->save();

            Alert::success('Registrasi Berhasil', 'Akun pengguna telah berhasil didaftarkan!')->showConfirmButton('Ok', '#0d6efd');
            return Redirect::route('auth.pengguna_form');
        } catch (Exception $e) {
            return Redirect::back()->withInput()->withErrors(['error' => 'Registrasi gagal. Silakan coba lagi.']);
        }
    }

    public function showAdminLoginForm()
    {
        return view('auth.admin_login');
    }

    public function adminLogin(Request $request)
    {
        $message = [
            'required' => ':attribute tidak boleh kosong!',
        ];

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ], $message);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.home');
        }

        Alert::error('Login Gagal', 'Email atau Password Salah!')->showConfirmButton('Ok', '#0d6efd');
        return redirect()->back()->withInput();
    }
    public function showPenggunaLoginForm()
    {
        return view('auth.pengguna_login');
    }
    public function penggunaLogin(Request $request)
    {
        $message = [
            'required' => ':attribute tidak boleh kosong!',
        ];

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ], $message);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::guard('pengguna')->attempt($credentials)) {
            return redirect()->route('pengguna.home');
        }

        Alert::error('Login Gagal', 'Email atau Password Salah!')->showConfirmButton('Ok', '#0d6efd');
        return redirect()->back()->withInput();
    }

    public function showSupirLoginForm()
    {
        return view('auth.supir_login');
    }
    public function supirLogin(Request $request)
    {
        $message = [
            'required' => ':attribute tidak boleh kosong!',
        ];

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ], $message);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::guard('supir')->attempt($credentials)) {
            return redirect()->route('supir.home');
        }

        Alert::error('Login Gagal', 'Email atau Password Salah!')->showConfirmButton('Ok', '#0d6efd');
        return redirect()->back()->withInput();
    }

    public function logout()
    {
        if (Auth::guard('pengguna')->check()) {
            Auth::guard('pengguna')->logout();
        } elseif (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } elseif (Auth::guard('supir')->check()) {
            Auth::guard('supir')->logout();
        }

        return redirect()->route('welcome');
    }
}
