<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Ambulance;
class AmbulanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.ambulance.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.ambulance.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $message = [
            'required'=>':attribute tidak boleh kosong!',            
        ];
        $this->validate($request,[
            'merk'=>'required',
            'noPolisi'=>'required',
            'noMesin'=>'required'
        ], $message);
        try{
            $ambulance = new Ambulance;
            $ambulance->merk = $request->merk;
            $ambulance->noPolisi = $request->noPolisi;
            $ambulance->noMesin = $request->noMesin;
            $ambulance->status = "tersedia";
            $ambulance->save();
            Alert::success('Success', 'Ambulance telah berhasil ditambahkan!')->showConfirmButton('Ok', '#0d6efd');
            return Redirect::route('ambulance.index');
        }catch(Exception $e){
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
    public function edit(Ambulance $ambulance)
    {
        // 
        return view('admin.ambulance.edit', ['ambulance'=>$ambulance]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ambulance $ambulance)
    {
        //
        $message = [
            'required'=>':attribute tidak boleh kosong!'
        ];
        $this->validate($request, [
            'merk'=>'required',
            'noPolisi'=>'required',
            'noMesin'=>'required'
        ], $message);
        try{
            $ambulance->merk = $request->merk;
            $ambulance->noPolisi = $request->noPolisi;
            $ambulance->noMesin = $request->noMesin;
            $ambulance->save();
            Alert::success('Success', 'Ambulance telah berhasil diupdate!')->showConfirmButton('Ok', '#0d6efd');
            return Redirect::route('ambulance.index');
        }catch(Exception $e){
            return Redirect::back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
