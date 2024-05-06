<?php

namespace App\Http\Controllers;

use App\Models\Ambulance;
use App\Models\Berita;
use Illuminate\Http\Request;
use App\Models\Pengguna;
use App\Models\Supir;

class HomeController extends Controller
{
    //
    public function welcome()
    {
        $data = [
            'title' => 'Home',
            'berita' => Berita::latest()->get(),
        ];
        return view('landing_page/index', $data);
    }
    public function panduan()
    {
        $data = [
            'title' => 'Pemesanan mobil dan peti',
            'file' => asset('file/panduan.pdf'),
        ];
        return view('landing_page/panduan', $data);
    }
    public function baca_berita($slug)
    {
        $berita = Berita::where('slug', $slug)->first();
        $data = [
            'title' => $berita->judul_berita,
            'berita' => $berita,
        ];
        return view('landing_page/baca_berita', $data);
    }
    public function struktur()
    {
        $data = [
            'title' => 'Struktur',
        ];
        return view('landing_page/struktur', $data);
    }

    public function dashboard()
    {
        $supir = Supir::get();
        $ambulance = Ambulance::where('status', '=', 'tersedia')->get();
        return view('admin.home', ['supir' => $supir, 'ambulance' => $ambulance]);
    }
}
