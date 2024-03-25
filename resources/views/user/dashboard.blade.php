@extends('layout.app')
@section('content')
    <div class="container-fluid bg-light min-vh-100 p-4 row">
        <div class="booked col-xl-6 p-4">
            <h3>Pemesanan</h3>
            <div class="card bg-light d-flex p-4 gap-4 justify-content-center h-50">
                @if (count($pemesanan) > 0)
                    @foreach ($pemesanan as $item)
                        <h4>No. Resi : <b class="text-primary">{{ $item->no_resi }}</b></h4>
                        <h4>Ambulance : {{ $item->merk }}</h4>
                        <h4>No Polisi : {{ $item->noPolisi }}</h4>
                        <p>Tujuan Pengantaran : {{ $item->tujuan }}</p>
                        <div class="alert alert-info d-flex justify-content-center fw-bold">
                            Pesanan {{ $item->status }}
                        </div>
                    @endforeach
                @else
                    <div class="d-flex flex-column align-items-center justify-content-center gap-4">
                        <div class="fs-4 fw-bold">Tidak Pesanan Yang Ditampilkan</div>
                        <a href="{{ route('pemesanan.create') }}" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                @endif
            </div>
        </div>
        <div class="profile col-xl-6">
            <div class="p-4">
                <h3>Data Diri</h3>
                <form action="" class="form" method="post">
                    <input type="hidden" name="id" id="" value="{{ Auth::guard('pengguna')->user()->id }}">
                    <div class="d-flex gap-2 flex-column mb-3">
                        <label for="" class="control-label fw-bold">Nama</label>
                        <input type="text" name="nama" id="" class="form-control"
                            value="{{ Auth::guard('pengguna')->user()->nama }}">
                    </div>
                    <div class="d-flex gap-2 flex-column mb-3">
                        <label for="" class="control-label fw-bold">No Telp</label>
                        <input type="text" name="noHP" id="" class="form-control"
                            value="{{ Auth::guard('pengguna')->user()->noHP }}">
                    </div>
                    <div class="d-flex gap-2 flex-column mb-3">
                        <label for="" class="control-label fw-bold">Alamat Penjemputan</label>
                        <textarea name="alamat" id="" cols="30" rows="5" class="form-control">{{ Auth::guard('pengguna')->user()->alamat }}</textarea>
                    </div>
                    <button class="btn btn-primary">Update Data Diri</button>
                </form>
            </div>
        </div>
    </div>
@endsection
