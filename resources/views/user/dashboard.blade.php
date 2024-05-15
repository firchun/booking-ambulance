@extends('layout.app')
@section('content')
    <div class="container">
        {{-- @if (session('alert'))
            <div class="alert alert-{{ session('alert')['type'] }} alert-dismissible fade show" role="alert">
                <strong>{{ ucfirst(session('alert')['type']) }}!</strong> {{ session('alert')['message'] }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif --}}
    </div>
    <div class="container-fluid bg-light min-vh-100 p-4 row">
        <div class="booked col-xl-6 p-4">
            <h3>Pemesanan</h3>
            <div class="card bg-light d-flex p-4 gap-4 justify-content-center ">
                @if (count($pemesanan) > 0)
                    @foreach ($pemesanan as $item)
                        <h4>No. Resi : <b class="text-primary">{{ $item->no_resi }}</b></h4>
                        <h4>Ambulance : {{ $item->merk }}</h4>
                        <h4>No Polisi : {{ $item->noPolisi }}</h4>
                        <p>Tujuan Pengantaran : {{ $item->tujuan }}</p>
                        @if ($item->peti_id != null || $item->peti_id != '')
                            <hr>
                            <p><strong>Informasi Peti :</strong></p>
                            <p>Panjang : {{ $item->panjang_peti }} cm<br>Lebar : {{ $item->lebar_peti }} cm</p>
                        @endif
                        @if ($item->status == 'proses')
                            <form action="{{ route('pemesanan.destroy', $item->id) }}" method="POST" id="deleteForm">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete()" class="btn btn-sm btn-danger mb-3">Batalkan
                                    Pesanan</button>
                            </form>
                        @endif
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
                <form action="{{ route('page.update', Auth::guard('pengguna')->user()->id) }}" method="post" class="form"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="" value="{{ Auth::guard('pengguna')->user()->id }}">
                    <div class="mb-3 d-flex flex-column gap-2">
                        <label for="nama" class="control-label fw-bold">Nama</label>
                        <input type="text" name="nama" id="nama"
                            class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Pengguna"
                            value="{{ Auth::guard('pengguna')->user()->nama }}">
                        @error('nama')
                            <small class="text-danger fw-bold">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 d-flex flex-column gap-2">
                        <label for="noHP" class="control-label fw-bold">No. HP</label>
                        <input type="number" name="noHP" id="noHP"
                            class="form-control @error('noHP') is-invalid @enderror"
                            value="{{ Auth::guard('pengguna')->user()->noHP }}" placeholder="No. HP">
                        @error('noHP')
                            <small class="text-danger fw-bold">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 d-flex flex-column gap-2">
                        <label for="email" class="control-label fw-bold">Email</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ Auth::guard('pengguna')->user()->email }}" placeholder="Alamat Email">
                        @error('email')
                            <small class="text-danger fw-bold">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 d-flex flex-column gap-2">
                        <label for="alamat" class="control-label fw-bold">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat">{{ Auth::guard('pengguna')->user()->alamat }}</textarea>
                        @error('alamat')
                            <small class="text-danger fw-bold">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update Data Diri</button>
                </form>
            </div>
        </div>
    </div>
    <!-- SweetAlert2 JS -->
    <script>
        function confirmDelete() {
            if (confirm("Apakah Anda yakin ingin membatalkan pesanan?")) {
                document.getElementById("deleteForm").submit();
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.14.0/dist/sweetalert2.all.min.js"></script>
@endsection
