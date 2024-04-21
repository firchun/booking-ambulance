<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Peti;

class PetiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Peti::all();
        return view('admin.peti.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.peti.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $message = [
            'required' => ':attribute tidak boleh kosong!'
        ];
        $this->validate($request, [
            'jenis' => 'required',
            'stok' => 'required'
        ], $message);
        try {
            $peti = new Peti;
            $peti->jenis = $request->jenis;
            $peti->stok = $request->stok;
            $peti->save();
            Alert::success('Success', 'Peti telah berhasil ditambahkan!')->showConfirmButton('Ok', '#0d6efd');
            return Redirect::route('peti.index');
        } catch (Exception $e) {
            return Redirect::back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peti $peti)
    {
        //  
        return view('admin.peti.edit', ['peti' => $peti]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peti $peti)
    {
        //
        $message = [
            'required' => ':attribute tidak boleh kosong!'
        ];
        $this->validate($request, [
            'jenis' => 'required',
            'stok' => 'required'
        ], $message);
        try {
            $peti->jenis = $request->jenis;
            $peti->stok = $request->stok;
            $peti->save();
            Alert::success('Success', 'Peti telah berhasil diupdate!')->showConfirmButton('Ok', '#0d6efd');
            return Redirect::route('peti.index');
        } catch (Exception $e) {
            return Redirect::back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $peti = Peti::findOrFail($id);
            $peti->delete();

            Alert::success('Success', 'Peti telah berhasil diupdate!')->showConfirmButton('Ok', '#0d6efd');
            return response()->json(['success' => true]); // Ubah di sini
        } catch (Exception $e) {
            return response()->json(['success' => false]); // Ubah di sini
        }
    }
}
