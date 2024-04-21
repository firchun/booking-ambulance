<?php

namespace App\Http\Controllers;

use App\Models\Ambulance;
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
        ];
        return view('landing_page/index', $data);
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
