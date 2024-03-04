<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ambulance;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    //
    public function dashboard()
    {
        $id = Auth::guard('pengguna')->user()->id;
        $pemesanan = DB::table('pemesanan')
            ->join('ambulance', 'ambulance.id', '=', 'pemesanan.ambulance_id')
            ->select('ambulance.merk', 'ambulance.noPolisi', 'pemesanan.*')
            ->where('pemesanan.pengguna_id', $id)
            ->where('pemesanan.status', '!=', 'selesai')
            ->get();
        return view('user.dashboard', ['pemesanan' => $pemesanan]);
    }
    public function dashboardSupir()
    {
        $id = Auth::guard('supir')->user()->id;
        $pemesanan = DB::table('pemesanan')
            ->join('ambulance', 'ambulance.id', '=', 'pemesanan.ambulance_id')
            ->join('pengguna', 'pengguna.id', '=', 'pemesanan.pengguna_id')
            ->select('ambulance.merk', 'ambulance.noPolisi', 'pemesanan.*', 'pengguna.nama', 'pengguna.noHP')
            ->where('pemesanan.supir_id', $id)
            ->where('pemesanan.status', '!=', 'selesai')
            ->first();
        return view('supir.dashboard', ['pemesanan' => $pemesanan]);
    }
    public function dashboardPembuatPeti()
    {
        $id = Auth::guard('pembuat_peti')->user()->id;
        $pemesanan = DB::table('pemesanan')
            ->join('ambulance', 'ambulance.id', '=', 'pemesanan.ambulance_id')
            ->join('pengguna', 'pengguna.id', '=', 'pemesanan.pengguna_id')
            ->select('ambulance.merk', 'ambulance.noPolisi', 'pemesanan.*', 'pengguna.nama', 'pengguna.noHP')
            ->where('pemesanan.peti_id', '!=', null)
            ->where('pemesanan.status', '!=', 'selesai')
            ->first();
        return view('pembuat_peti.dashboard', ['pemesanan' => $pemesanan]);
    }
    public function ambulance()
    {
        $ambulance = Ambulance::get();
        return view('user.daftarambulance', ['ambulance' => $ambulance]);
    }
    public function riwayat()
    {
        $riwayat = Pemesanan::where('pengguna_id', Auth::guard('pengguna')->user()->id)->get();
        return view('user.riwayat', ['riwayat' => $riwayat]);
    }
}
