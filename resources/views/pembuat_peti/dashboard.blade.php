@extends('layout.app')
@section('content')
    <div class="container-fluid bg-light min-vh-100 p-4 d-flex flex-row">
        <div class="booked w-50 p-4">
            <h3>Pemesanan Peti</h3>
            <div class="card bg-light d-flex p-4 gap-2 justify-content-center ">
                @if (isset($pemesanan))
                    <div class="d-flex flex-column">
                        <div class="fw-bold fs-4">{{ $pemesanan->merk }}</div>
                        <div class="fw-bold fs-4">{{ $pemesanan->noPolisi }}</div>
                    </div>
                    <hr>
                    <div class="d-flex flex-column">
                        <b class="mb-2 h3">Detail Pemesanan</b>
                        No Resi : <b class="text-primary">{{ $pemesanan->no_resi }}</b>

                        Nama Pemesan {{ $pemesanan->nama }}
                        <div>No HP {{ $pemesanan->noHP }}</div>
                        <div>Alamat Pemesanan {{ $pemesanan->lokasi_penjemputan }}</div>
                        <div>Tujuan Pengantaran {{ $pemesanan->tujuan }}</div>
                        <div>Tanggal Penjemputan {{ $pemesanan->tanggal_penjemputan }}</div>
                        <div>Waktu Penjemputan {{ $pemesanan->waktu_penjemputan }}</div>
                    </div>
                    <form action="{{ route('pemesanan.terima') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $pemesanan->id }}">
                        <input type="hidden" name="status" value="{{ $pemesanan->status }}">

                        @if ($pemesanan->status == 'diterima' && $pemesanan->peti_id != 0)
                            <button class="btn btn-primary">Peti di proses</button>
                        @elseif($pemesanan->status == 'peti di proses')
                            <button class="btn btn-success">Peti siap diantar</button>
                        @elseif($pemesanan->status == 'proses')
                            <div class="alert alert-info d-flex justify-content-center fw-bold my-3">
                                Menunggu Persetujuan Admin
                            </div>
                        @elseif($pemesanan->status == 'menuju lokasi')
                            <div class="alert alert-info d-flex justify-content-center fw-bold my-3">
                                Peti telah selesai dan dalam pengantaran
                            </div>
                        @endif
                    </form>
                @else
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="fs-4 fw-bold">Tidak ada Pesanan Yang Ditampilkan</div>
                    </div>
                @endif
            </div>
        </div>
        <div class="profile w-50">
            <div class="p-4">
                <h3>Data Diri</h3>
                <form action="" class="form" method="post">
                    <input type="hidden" name="id" id=""
                        value="{{ Auth::guard('pembuat_peti')->user()->id }}">
                    <div class="d-flex gap-2 flex-column mb-3">
                        <label for="" class="control-label fw-bold">Nama</label>
                        <input type="text" name="nama" id="" class="form-control"
                            value="{{ Auth::guard('pembuat_peti')->user()->nama }}" readonly>
                    </div>

                    {{-- <button class="btn btn-primary">Update Data Diri</button> --}}
                </form>
            </div>
        </div>
    </div>
@endsection
