@extends('layout.app')
@section('content')
    <div class="container-fluid bg-light min-vh-100 p-4 d-flex flex-row">
        <div class="booked w-50 p-4">
            <h3>Pemesanan Ambulance</h3>
            <div class="card bg-light d-flex p-4 gap-2 justify-content-center h-50">
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
                        @if ($pemesanan->peti_id != null || $pemesanan->peti_id != 0)
                            @if ($pemesanan->status == 'peti di proses' || $pemesanan->status == 'diterima')
                                <hr>
                                <span class="text-danger">Menunggu Pembuatan Peti</span>
                            @elseif ($pemesanan->status == 'peti siap')
                                <button class="btn btn-primary">Menuju Lokasi</button>
                            @elseif($pemesanan->status == 'menuju lokasi')
                                <button class="btn btn-success">Selesaikan Pesanan</button>
                            @endif
                        @else
                            @if ($pemesanan->status == 'diterima')
                                <button class="btn btn-primary">Terima Pesanan</button>
                            @elseif($pemesanan->status == 'menuju lokasi')
                                <button class="btn btn-success">Selesaikan Pesanan</button>
                            @else
                                <div class="alert alert-info d-flex justify-content-center fw-bold my-3">
                                    Menunggu Persetujuan Admin
                                </div>
                            @endif
                        @endif
                    </form>
                @else
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="fs-4 fw-bold">Tidak Ada Pesanan Yang Ditampilkan</div>
                    </div>
                @endif
            </div>
        </div>
        <div class="profile w-50">
            <div class="p-4">
                <h3>Data Diri</h3>
                <form action="" class="form" method="post">
                    <input type="hidden" name="id" id="" value="{{ Auth::guard('supir')->user()->id }}">
                    <div class="d-flex gap-2 flex-column mb-3">
                        <label for="" class="control-label fw-bold">Nama</label>
                        <input type="text" name="nama" id="" class="form-control"
                            value="{{ Auth::guard('supir')->user()->nama }}" readonly>
                    </div>
                    <div class="d-flex gap-2 flex-column mb-3">
                        <label for="" class="control-label fw-bold">No Telp</label>
                        <input type="text" name="noHP" id="" class="form-control"
                            value="{{ Auth::guard('supir')->user()->noHP }}" readonly>
                    </div>
                    <div class="d-flex gap-2 flex-column mb-3">
                        <label for="" class="control-label fw-bold">Alamat Penjemputan</label>
                        <textarea name="alamat" id="" cols="30" rows="5" class="form-control" readonly>{{ Auth::guard('supir')->user()->alamat }}</textarea>
                    </div>
                    {{-- <button class="btn btn-primary">Update Data Diri</button> --}}
                </form>
            </div>
        </div>
    </div>
@endsection
