<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengguna;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.pengguna.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $message = [
            'required' => ':attribute tidak boleh kosong!',
            'password.min' => 'Password harus berisi minimal 8 karakter',
            'email.unique' => 'Email sudah dipakai',
        ];

        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'noHP' => 'required',
            'email' => 'required|email|unique:pengguna,email',
            'password' => 'required|min:8',
        ], $message);

        try {
            $pengguna = new Pengguna;
            $pengguna->nama = $request->nama;
            $pengguna->alamat = $request->alamat;
            $pengguna->noHP = $request->noHP;
            $pengguna->email = $request->email;
            $pengguna->password = Hash::make($request->password);
            $pengguna->status = 'disetujui'; 
            $pengguna->save();
    
            Alert::success('Registrasi Berhasil', 'Akun Pengguna telah berhasil didaftarkan!')->showConfirmButton('Ok', '#0d6efd');
            return Redirect::route('pengguna.index');
        } catch (Exception $e) {
            return Redirect::back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengguna $pengguna)
    {
        //
        return view('admin.pengguna.edit', ['pengguna'=>$pengguna]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengguna $pengguna)
{
    //
    $message = [
        'required' => ':attribute tidak boleh kosong!',
        'password.min' => 'Password harus berisi minimal 8 karakter',
        'email' => 'required|email|unique:pengguna,email',
    ];

    $this->validate($request, [
        'nama' => 'required',
        'alamat' => 'required',
        'noHP' => 'required',
        'email' => 'required|email',
        'password' => 'nullable|min:8',
    ], $message);

    try {
        $pengguna->nama = $request->nama;
        $pengguna->alamat = $request->alamat;
        $pengguna->noHP = $request->noHP;
        $pengguna->email = $request->email;
        $pengguna->status = $request->status; 
        if ($request->password) {
            $pengguna->password = Hash::make($request->password);
        }

        $pengguna->save();

        Alert::success('Data Berhasil Diupdate', 'Data Pengguna telah berhasil diupdate!')->showConfirmButton('Ok', '#0d6efd');
        return Redirect::route('pengguna.index');
    } catch (Exception $e) {
        return Redirect::back()->withInput();
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}