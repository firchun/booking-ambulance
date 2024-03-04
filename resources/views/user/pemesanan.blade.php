@extends('layout.app')
@section('content')
    <div class="container-fluid bg-light min-vh-100 p-4">
        <div class="card p-5">
            <h3>Pemesanan Ambulance</h3>
            <hr>
            <div class="row">
                <form action="{{ route('pemesanan.store') }}" method="post" class="form col-xl-6"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="penggunaID" id="" value="{{ Auth::guard('pengguna')->user()->id }}">
                    <div class="d-flex gap-2 flex-column mb-3">
                        <label for="" class="control-label fw-bold">Ambulance Tersedia</label>
                        <select name="ambulanceID" id="" class="form-control">
                            @foreach ($ambulance as $item)
                                <option value="{{ $item->id }}">{{ $item->merk }} | {{ $item->noPolisi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex gap-2 flex-column mb-3">
                        <label for="" class="control-label fw-bold">Peti**</label>
                        <select name="petiID" id="" class="form-control">
                            <option value="0">Tidak Menggunakan Peti</option>
                            @foreach ($peti as $item)
                                <option value="{{ $item->id }}">{{ $item->jenis }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row" id="ukuran">
                        <div class="col">
                            <div class="d-flex gap-2 flex-column mb-3">
                                <label for="" class="control-label fw-bold">Panjang Peti</label>
                                <input type="number" name="panjang_peti" value="0"
                                    class="form-control @error('panjang_peti') is-invalid @enderror" placeholder="Panjang">
                                @error('panjang_peti')
                                    <small class="fw-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex gap-2 flex-column mb-3">
                                <label for="" class="control-label fw-bold">Lebar Peti</label>
                                <input type="number" name="lebar_peti" value="0"
                                    class="form-control @error('lebar_peti') is-invalid @enderror" placeholder="Lebar">
                                @error('lebar_peti')
                                    <small class="fw-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="d-flex gap-2 flex-column mb-3">
                        <label for="" class="control-label fw-bold">Waktu Penjemputan</label>
                        <input type="time" name="waktuPenjemputan" id=""
                            class="form-control @error('waktuPenjemputan') is-invalid @enderror"
                            placeholder="Waktu Penjemputan" required>
                        @error('waktuPenjemputan')
                            <small class="fw-bold text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="d-flex gap-2 flex-column mb-3">
                        <label for="" class="control-label fw-bold">Tanggal Penjemputan</label>
                        <input type="date" name="tanggalPenjemputan" id=""
                            class="form-control @error('tanggalPenjemputan') is-invalid @enderror"
                            placeholder="Tanggal Penjemputan" required>
                        @error('tanggalPenjemputan')
                            <small class="fw-bold text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="d-flex gap-2 flex-column mb-3">
                        <label for="" class="control-label fw-bold">Alamat Penjemputan</label>
                        <textarea name="alamat" id="" cols="30" rows="5"
                            class="form-control @error('alamat') is-invalid @enderror" required></textarea>
                        @error('alamat')
                            <small class="fw-bold text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="d-flex gap-2 flex-column mb-3">
                        <label for="" class="control-label fw-bold">Tujuan</label>
                        <textarea name="tujuan" id="" cols="30" rows="5"
                            class="form-control @error('tujuan') is-invalid @enderror" required></textarea>
                        @error('tujuan')
                            <small class="fw-bold text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="d-flex gap-2 flex-column mb-3">
                        <label for="" class="control-label fw-bold">Upload Surat Keterangan Tidak Mampu</label>
                        <input name="upload_ktm" id="" type="file"
                            class="form-control @error('upload_ktm') is-invalid @enderror">
                        @error('upload_ktm')
                            <small class="fw-bold text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="d-flex gap-2 flex-column mb-3">
                        <label for="" class="control-label fw-bold">Upload Surat Keterangan Meninggal Dunia</label>
                        <input name="upload_kmd" id="" type="file"
                            class="form-control @error('upload_kmd') is-invalid @enderror">
                        @error('upload_kmd')
                            <small class="fw-bold text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="d-flex gap-2 flex-column mb-3">
                        <label for="" class="control-label fw-bold">Upload Kartu Keluarga</label>
                        <input name="upload_kk" id="" type="file"
                            class="form-control @error('upload_kk') is-invalid @enderror">
                        @error('upload_kk')
                            <small class="fw-bold text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="d-flex gap-2 flex-column mb-3">
                        <label for="" class="control-label fw-bold">Upload Kartu Tanda Penduduk (KTP)</label>
                        <input name="upload_ktp" id="" type="file"
                            class="form-control @error('upload_ktp') is-invalid @enderror">
                        @error('upload_ktp')
                            <small class="fw-bold text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Submit</button>
                </form>
                <div class="col-xl-6 py-4">
                    <div class="alert alert-info h-auto">
                        Data Wajib Diisi!
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#ukuran').hide();
            $('select[name="petiID"]').change(function() {
                var petiID = $(this).val();
                if (petiID != 0) {
                    $('input[name="panjang_peti"]').prop('required', true);
                    $('input[name="lebar_peti"]').prop('required', true);
                    $('#ukuran').show();
                } else {
                    $('#ukuran').hide();
                    $('input[name="panjang_peti"]').prop('required', false);
                    $('input[name="lebar_peti"]').prop('required', false);
                }
            });
        });
    </script>
@endsection
