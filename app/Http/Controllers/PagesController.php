<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ambulance;
use App\Models\Pemesanan;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use Illuminate\Support\Facades\Hash;

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
        // dd($pemesanan);
        return view('supir.dashboard', ['pemesanan' => $pemesanan]);
    }
    public function dashboardPembuatPeti()
    {
        $id = Auth::guard('pembuat_peti')->user()->id;
        $pemesanan = DB::table('pemesanan')
            ->join('ambulance', 'ambulance.id', '=', 'pemesanan.ambulance_id')
            ->join('pengguna', 'pengguna.id', '=', 'pemesanan.pengguna_id')
            ->join('supir', 'supir.id', '=', 'pemesanan.supir_id')
            ->select('ambulance.merk', 'ambulance.noPolisi', 'pemesanan.*', 'pengguna.nama', 'pengguna.noHP', 'supir.noHP')
            ->where('pemesanan.peti_id', '!=', null)
            ->where('pemesanan.status', '!=', 'selesai')
            ->first();
        // dd($pemesanan);
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
    public function updatePengguna(Request $request, $id)
    {
        // dd($request);
        $message = [
            'required' => ':attribute tidak boleh kosong!',
            'password.min' => 'Password harus berisi minimal 8 karakter',
            'email' => 'required|email|unique:pengguna,email',
        ];

        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'noHP' => 'required',
            'email' => 'nullable|email',
            'password' => 'nullable|min:8',
        ], $message);

        try {
            $pengguna = Pengguna::find($id);
            $pengguna->nama = $request->nama;
            $pengguna->alamat = $request->alamat;
            $pengguna->noHP = $request->noHP;
            $pengguna->email = $request->email;
            $pengguna->status = $request->status ?? $pengguna->status;
            if ($request->filled('password')) {
                $pengguna->password = Hash::make($request->password);
            }

            $pengguna->save();

            return redirect()->back()
                ->with('alert', [
                    'type' => 'success',
                    'message' => 'Data berhasil diperbarui!'
                ]);
        } catch (Exception $e) {
            return redirect()->back()->withInput()
                ->with('alert', [
                    'type' => 'success',
                    'message' => 'Data berhasil diperbarui!'
                ]);
        }
    }
}
