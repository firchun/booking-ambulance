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
use Illuminate\Support\Str;

class PemesananController extends Controller
{
    //
    public function index()
    {
        $data = Pemesanan::with(['pengguna', 'ambulance', 'peti'])->get();
        return view('admin.pemesanan.index', compact('data'));
    }
    public function create()
    {
        $ambulance = Ambulance::get();
        $peti = Peti::get();
        return view('user.pemesanan', ['ambulance' => $ambulance, 'peti' => $peti]);
    }

    public function store(Request $request)
    {
        $message = [
            'required' => ':attribute tidak boleh kosong'
        ];
        $this->validate($request, [
            'waktuPenjemputan' => 'required',
            'tanggalPenjemputan' => 'required',
            'alamat' => 'required',
            'tujuan' => 'required',
            'panjang_peti' => 'nullable',
            'lebar_peti' => 'nullable',
            'upload_ktm' => ['nullable', 'file',  'mimes:jpg,jpeg,png,bmp,webp'],
            'upload_kmd' => ['nullable', 'file',  'mimes:jpg,jpeg,png,bmp,webp'],
            'upload_kk' => ['nullable', 'file',  'mimes:jpg,jpeg,png,bmp,webp'],
            'upload_ktp' => ['nullable', 'file',  'mimes:jpg,jpeg,png,bmp,webp'],
        ], $message);
        try {
            $milliseconds = round(microtime(true) * 1000);


            $data = new Pemesanan;
            $data->pengguna_id = $request->penggunaID;
            $data->ambulance_id = $request->ambulanceID;
            $data->peti_id = $request->petiID;
            $data->tanggal_penjemputan = $request->tanggalPenjemputan;
            $data->waktu_penjemputan = $request->waktuPenjemputan;
            $data->lokasi_penjemputan = $request->alamat;
            $data->tujuan = $request->tujuan;
            $data->panjang_peti = $request->panjang_peti;
            $data->lebar_peti = $request->lebar_peti;
            $data->status = 'proses';
            //resi
            $data->no_resi = 'AMC' . $milliseconds;
            //upload
            if ($request->hasFile('upload_ktm')) {
                $filename = Str::random(32) . '.' . $request->file('upload_ktm')->getClientOriginalExtension();
                $file_path_ktm = $request->file('upload_ktm')->storeAs('public/berkas', $filename);
                $data->upload_ktm = $file_path_ktm;
            }

            if ($request->hasFile('upload_kmd')) {
                $filename = Str::random(32) . '.' . $request->file('upload_kmd')->getClientOriginalExtension();
                $file_path_kmd = $request->file('upload_kmd')->storeAs('public/berkas', $filename);
                $data->upload_kmd = $file_path_kmd;
            }

            if ($request->hasFile('upload_kk')) {
                $filename = Str::random(32) . '.' . $request->file('upload_kk')->getClientOriginalExtension();
                $file_path_kk = $request->file('upload_kk')->storeAs('public/berkas', $filename);
                $data->upload_kk = $file_path_kk;
            }

            if ($request->hasFile('upload_ktp')) {
                $filename = Str::random(32) . '.' . $request->file('upload_ktp')->getClientOriginalExtension();
                $file_path_ktp = $request->file('upload_ktp')->storeAs('public/berkas', $filename);
                $data->upload_ktp = $file_path_ktp;
            }


            //simpan
            $data->save();

            if ($request->petiID != 0) {
                $peti = Peti::where('id', $request->petiID)->first();
                $peti->stok = (int) $peti->stok - 1;
                $peti->save();
            }

            Alert::success('Success', 'Pemesanan Berhasil')->showConfirmButton('Ok', '#0d6efd');
            return Redirect::route('pengguna.home');
        } catch (Exception $e) {
            Alert::error('Error', 'Gagal Membuat Pesanan')->showConfirmButton('Ok', '#0d6efd');
            return Redirect::back()->withInput();
        }
    }
    public function edit($id)
    {
        $supir = Supir::where('status', '=', 'tersedia')->get();
        return view('admin.pemesanan.edit', ['supir' => $supir, 'id' => $id]);
    }
    public function update(Request $request)
    {
        $id = $request->id;
        $pemesanan = Pemesanan::where('id', $id)->first();
        $pemesanan->supir_id = $request->supir;
        $pemesanan->status = $request->status;

        if ($pemesanan->peti_id != 0) {
            $peti = Peti::where('id', $pemesanan->peti_id)->first();
            $peti->stok = (int) $peti->stok - 1;
            $peti->save();
        }

        $supir = Supir::Where('id', $pemesanan->supir_id)->first();
        $supir->status = 'booked';

        $ambulance = Ambulance::where('id', $pemesanan->ambulance_id)->first();
        $ambulance->status = 'full';

        $pemesanan->save();
        $supir->save();
        $ambulance->save();

        Alert::success('Data Berhasil Diupdate', 'Data Pesanan telah berhasil diupdate!')->showConfirmButton('Ok', '#0d6efd');
        return Redirect::route('pemesanan.index');
    }
    public function terima(Request $request)
    {
        $status = $request->status;
        $id = $request->id;
        $pemesanan = Pemesanan::where('id', $id)->first();
        $supir = Supir::where('id', $pemesanan->supir_id)->first();
        $ambulance = Ambulance::where('id', $pemesanan->ambulance_id)->first();
        if ($pemesanan->peti_id == 0 || $pemesanan->peti_id == null) {

            if ($status == 'diterima') {
                $pemesanan->status = 'menuju lokasi';
                $supir->status = 'full';
            } elseif ($status == 'menuju lokasi') {
                if ($request->hasFile('foto_penerimaan')) {
                    $filename = Str::random(32) . '.' . $request->file('foto_penerimaan')->getClientOriginalExtension();
                    $file_path_foto = $request->file('foto_penerimaan')->storeAs('public/berkas', $filename);
                    $pemesanan->foto_penerimaan = $file_path_foto;
                }
                $pemesanan->status = 'selesai';
                $supir->status = 'tersedia';
                $ambulance->status = 'tersedia';
            }
        } else {
            if ($status == 'diterima') {
                $pemesanan->status = 'peti di proses';
                $supir->status = 'tersedia';
            } elseif ($status == 'peti di proses') {
                $pemesanan->status = 'peti siap';
                $supir->status = 'full';
                $ambulance->status = 'full';
            } elseif ($status == 'peti siap') {
                $pemesanan->status = 'menuju lokasi';
                $supir->status = 'full';
                $ambulance->status = 'full';
            } elseif ($status == 'menuju lokasi') {
                if ($request->hasFile('foto_penerimaan')) {
                    $filename = Str::random(32) . '.' . $request->file('foto_penerimaan')->getClientOriginalExtension();
                    $file_path_foto = $request->file('foto_penerimaan')->storeAs('public/berkas', $filename);
                    $pemesanan->foto_penerimaan = $file_path_foto;
                }
                $pemesanan->status = 'selesai';
                $supir->status = 'tersedia';
                $ambulance->status = 'tersedia';
            }
        }
        $pemesanan->save();
        $supir->save();
        $ambulance->save();
        Alert::success('Status Berhasil Diupdate', 'Data Pesanan telah berhasil diupdate!')->showConfirmButton('Ok', '#0d6efd');
        return Redirect::back();
    }
    public function print(Request $request)
    {
        $data =  Pemesanan::with(['pengguna', 'ambulance', 'peti'])->get();
        $pdf =  \PDF::loadView('admin.pemesanan.print', [
            'title' => 'Laporan Pemesanan Ambulan',
            'pemesanan' => $data,
        ])->setPaper('a4', 'landscape')->setOption(['dpi' => 150]);

        return $pdf->stream('Pemesanan ' . '.pdf');
    }
    public function destroy($id)
    {
        $pemesanan = Pemesanan::find($id);
        if ($pemesanan != null) {
            $pemesanan->delete();
        }
        return Redirect::back();
    }
}
