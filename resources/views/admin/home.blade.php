@extends('layout.admin')

@section('main-content')
        <hr>
        <div class="dashboard-content card d-flex flex-column p-4 bg-white">
            <h3>Halo Selamat Datang Administrator</h3>
            <p>
                Di sistem ini kamu bisa kelola data terkait pemesanan ambulance
            </p>
            <div class="row">
                <div class="col-xl-3">
                    <div class="card p-4">
                        <b>Jumlah Supir</b>
                        {{count($supir)}}
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card p-4">
                        <b>Jumlah Mobil Tersedia</b>
                        {{count($ambulance)}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection