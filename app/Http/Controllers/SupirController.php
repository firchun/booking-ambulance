<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\Supir;

class SupirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.supir.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.supir.create');
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
            'email' => 'required|email|unique:supir,email',
            'password' => 'required|min:8',
        ], $message);

        try {
            $supir = new Supir;
            $supir->nama = $request->nama;
            $supir->alamat = $request->alamat;
            $supir->noHP = $request->noHP;
            $supir->email = $request->email;
            $supir->status = 'tersedia';
            $supir->password = Hash::make($request->password);

            $supir->save();
    
            Alert::success('Registrasi Berhasil', 'Akun Supir telah berhasil didaftarkan!')->showConfirmButton('Ok', '#0d6efd');
            return Redirect::route('supir.index');
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
    public function edit(Supir $supir)
    {
        //
        return view('admin.supir.edit', ['supir'=>$supir]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supir $supir)
{
    //
    $message = [
        'required' => ':attribute tidak boleh kosong!',
        'password.min' => 'Password harus berisi minimal 8 karakter',
        'email' => 'required|email|unique:supir,email',
    ];

    $this->validate($request, [
        'nama' => 'required',
        'alamat' => 'required',
        'noHP' => 'required',
        'email' => 'required|email',
        'password' => 'nullable|min:8',
    ], $message);

    try {
        $supir->nama = $request->nama;
        $supir->alamat = $request->alamat;
        $supir->noHP = $request->noHP;
        $supir->email = $request->email;

        if ($request->password) {
            $supir->password = Hash::make($request->password);
        }

        $supir->save();

        Alert::success('Data Berhasil Diupdate', 'Data Supir telah berhasil diupdate!')->showConfirmButton('Ok', '#0d6efd');
        return Redirect::route('supir.index');
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