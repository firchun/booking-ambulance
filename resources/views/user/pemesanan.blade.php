@include('layout.navigation')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid bg-light min-vh-100 p-4">
        <div class="card p-5">
            <h3>Pemesanan Ambulance</h3>
            <hr>
            <div class="d-flex flex-row gap-4">
                <form action="{{route('pemesanan.store')}}" method="post" class="form w-50">
                    {{ csrf_field() }}
                    <input type="hidden" name="penggunaID" id="" value="{{Auth::guard('pengguna')->user()->id}}">
                    <div class="d-flex gap-2 flex-column mb-3">
                        <label for="" class="control-label fw-bold">Ambulance Tersedia</label>
                        <select name="ambulanceID" id="" class="form-select">
                            @foreach ($ambulance as $item)
                                <option value="{{$item->id}}">{{$item->merk}} | {{$item->noPolisi}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex gap-2 flex-column mb-3">
                        <label for="" class="control-label fw-bold">Peti**</label>
                        <select name="petiID" id="" class="form-select">
                                <option value="0">Tidak Menggunakan Peti</option>
                            @foreach ($peti as $item)
                                <option value="{{$item->id}}">{{$item->jenis}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex gap-2 flex-column mb-3">
                        <label for="" class="control-label fw-bold">Waktu Penjemputan</label>
                        <input type="time" name="waktuPenjemputan" id="" class="form-control @error('waktuPenjemputan') is-invalid @enderror" placeholder="Waktu Penjemputan">
                        @error('waktuPenjemputan')
                            <small class="fw-bold text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="d-flex gap-2 flex-column mb-3">
                        <label for="" class="control-label fw-bold">Tanggal Penjemputan</label>
                        <input type="date" name="tanggalPenjemputan" id="" class="form-control @error('tanggalPenjemputan') is-invalid @enderror" placeholder="Tanggal Penjemputan"> 
                        @error('tanggalPenjemputan')
                            <small class="fw-bold text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="d-flex gap-2 flex-column mb-3">
                        <label for="" class="control-label fw-bold">Alamat Penjemputan</label>
                        <textarea name="alamat" id="" cols="30" rows="5" class="form-control @error('alamat') is-invalid @enderror"></textarea>
                        @error('alamat')
                            <small class="fw-bold text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="d-flex gap-2 flex-column mb-3">
                        <label for="" class="control-label fw-bold">Tujuan</label>
                        <textarea name="tujuan" id="" cols="30" rows="5" class="form-control @error('tujuan') is-invalid @enderror"></textarea>
                        @error('tujuan')
                            <small class="fw-bold text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Submit</button>
                </form>
                <div class="w-50 py-4">
                    <div class="alert alert-info h-auto">
                        A simple info alert—check it out!
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@include('layout.footer')