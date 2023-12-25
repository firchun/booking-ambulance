<?php

namespace App\Http\Controllers;

use App\Models\Ambulance;
use Illuminate\Http\Request;
use App\Models\Pengguna;
use App\Models\Supir;

class HomeController extends Controller
{
    //
    public function welcome(){
        return view('welcome');
    }
    
    public function dashboard(){
        $supir = Supir::get();
        $ambulance = Ambulance::where('status','=','tersedia')->get();
        return view('admin.home',['supir'=>$supir,'ambulance'=>$ambulance]);
    }
}
