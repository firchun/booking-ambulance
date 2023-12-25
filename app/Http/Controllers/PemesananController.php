<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ambulance;
use App\Models\Peti;
use App\Models\Pemesanan;
use App\Models\Supir;
use Exception;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
class PemesananController extends Controller
{
    //
    public function index(){
        return view('admin.pemesanan.index');
    }
    public function create(){
        $ambulance = Ambulance::get();
        $peti = Peti::get();
        return view('user.pemesanan',['ambulance'=>$ambulance,'peti'=>$peti]);
    }

    public function store(Request $request){
        $message = [
            'required'=>':attribute tidak boleh kosong'
        ];
        $this->validate($request, [
            'waktuPenjemputan'=>'required',
            'tanggalPenjemputan'=>'required',
            'alamat'=>'required',
            'tujuan'=>'required',
        ], $message);
        try{
            $data = new Pemesanan;
            $data->pengguna_id = $request->penggunaID;
            $data->ambulance_id = $request->ambulanceID;
            $data->peti_id = $request->petiID;
            $data->tanggal_penjemputan = $request->tanggalPenjemputan;
            $data->waktu_penjemputan = $request->waktuPenjemputan;
            $data->lokasi_penjemputan = $request->alamat;
            $data->tujuan = $request->tujuan;
            $data->status = 'proses';
            $data->save();

            if($request->petiID != 0){
                $peti = Peti::where('id',$request->petiID)->first();
                $peti->stok = (int) $peti->stok - 1;
                $peti->save();
            }
            
            Alert::success('Success', 'Pemesanan Berhasil')->showConfirmButton('Ok', '#0d6efd');
            return Redirect::route('pengguna.home');
        }catch(Exception $e){
            Alert::error('Error', 'Gagal Membuat Pesanan')->showConfirmButton('Ok', '#0d6efd');
            return Redirect::back()->withInput();
        }
    }
    public function edit($id){
        $supir = Supir::where('status','=','tersedia')->get();
        return view('admin.pemesanan.edit',['supir'=>$supir,'id'=>$id]);
    }
    public function update(Request $request){
        $id = $request->id;
        $pemesanan = Pemesanan::where('id',$id)->first();
        $pemesanan->supir_id = $request->supir;
        $pemesanan->status = $request->status;

        if($pemesanan->peti_id !=0){
            $peti = Peti::where('id',$pemesanan->peti_id)->first();
            $peti->stok = (int) $peti->stok - 1;
            $peti->save();
        }

        $supir = Supir::Where('id',$pemesanan->supir_id)->first();
        $supir->status = 'booked';

        $ambulance = Ambulance::where('id',$pemesanan->ambulance_id)->first();
        $ambulance->status = 'full';

        $pemesanan->save();
        $supir->save();
        $ambulance->save();

        Alert::success('Data Berhasil Diupdate', 'Data Pesanan telah berhasil diupdate!')->showConfirmButton('Ok', '#0d6efd');
        return Redirect::route('pemesanan.index');
    }
    public function terima(Request $request){
        $status = $request->status;
        $id = $request->id;
        $pemesanan = Pemesanan::where('id',$id)->first();
        $supir = Supir::where('id',$pemesanan->supir_id)->first();
        $ambulance = Ambulance::where('id',$pemesanan->ambulance_id)->first();
        if($status == 'diterima'){
            $pemesanan->status = 'menuju lokasi';
            $supir->status = 'full';
        }elseif($status == 'menuju lokasi'){
            $pemesanan->status = 'selesai';
            $supir->status = 'tersedia';
            $ambulance->status = 'tersedia';
        }
        $pemesanan->save();
        $supir->save();
        $ambulance->save();
        Alert::success('Status Berhasil Diupdate', 'Data Pesanan telah berhasil diupdate!')->showConfirmButton('Ok', '#0d6efd');
        return Redirect::route('supir.home');
    }
}
