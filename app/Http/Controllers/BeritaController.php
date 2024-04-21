<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        //
        $data = Berita::all();
        return view('admin.berita.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.berita.create');
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
            'judul_berita' => 'required',
            'isi_berita' => 'required',
            'foto_berita' => 'image|mimes:jpeg,png,jpg,gif'
        ], $message);
        try {
            $berita = new Berita;
            $berita->judul_berita = $request->judul_berita;
            $berita->slug = Str::slug($request->judul_berita);
            $berita->isi_berita = $request->isi_berita;
            if ($request->hasFile('foto_berita')) {
                $filename = Str::random(32) . '.' . $request->file('foto_berita')->getClientOriginalExtension();
                $file_path_foto = $request->file('foto_berita')->storeAs('public/berkas', $filename);
                $berita->upload_ktm = $file_path_foto;
            }
            $berita->save();
            Alert::success('Success', 'berita telah berhasil ditambahkan!')->showConfirmButton('Ok', '#0d6efd');
            return Redirect::route('berita.index');
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
    public function edit(Berita $berita, $id)
    {
        $isi_berita = berita::findOrFail($id);
        // dd($isi_berita);
        return view('admin.berita.edit', ['berita' => $isi_berita]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $berita, $id)
    {
        //
        $message = [
            'required' => ':attribute tidak boleh kosong!'
        ];
        $this->validate($request, [
            'judul_berita' => 'required',
            'isi_berita' => 'required',
            'foto_berita' => 'image|mimes:jpeg,png,jpg,gif'
        ], $message);
        try {
            $berita = Berita::findOrFail($id);
            $berita->judul_berita = $request->judul_berita;
            $berita->slug = Str::slug($request->judul_berita);
            $berita->isi_berita = $request->isi_berita;
            if ($request->hasFile('foto_berita')) {
                $filename = Str::random(32) . '.' . $request->file('foto_berita')->getClientOriginalExtension();
                $file_path_foto = $request->file('foto_berita')->storeAs('public/berkas', $filename);
                $berita->foto_berita = $file_path_foto;
            }
            $berita->save();
            Alert::success('Success', 'Berita telah berhasil diupdate!')->showConfirmButton('Ok', '#0d6efd');
            return Redirect::route('berita.index');
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
            $berita = berita::findOrFail($id);
            $berita->delete();

            Alert::success('Success', 'berita telah berhasil dihapus!')->showConfirmButton('Ok', '#0d6efd');
            return response()->json(['success' => true]); // Ubah di sini
        } catch (Exception $e) {
            return response()->json(['success' => false]); // Ubah di sini
        }
    }
}
