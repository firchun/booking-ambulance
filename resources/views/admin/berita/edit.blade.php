@extends('layout.admin')

@section('main-content')
    <hr>
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('ambulance.index') }}">Ambulance</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Berita</li>
        </ol>
    </nav>
    <div class="dashboard-content card d-flex flex-column p-4 bg-white">
        <div class="dashboard-title">
            <i class="uil uil-plus"></i>&nbsp;Edit Berita
        </div>
        <hr class="pb-4">
        <form action="{{ route('berita.update', $berita->id) }}" class="form" method="post"
            enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
            @if ($berita->foto_berita)
                <div class="d-flex justify-content-center">

                    <img src="{{ $berita->foto_berita ? Storage::url($berita->foto_berita) : asset('img/no-image.png') }}"
                        alt="foto_berita" class="img-fluid" style="width:50%;">
                </div>
            @endif
            <div class="mb-3 d-flex flex-column gap-2">
                <label for="" class="control-label fw-bold">Judul Berita</label>
                <input type="text" name="judul_berita" id=""
                    class="form-control @error('judul_berita') is-invalid @enderror" placeholder="Judul Berita"
                    value="{{ $berita->judul_berita }}">
                @error('judul_berita')
                    <small class="text-danger fw-bold">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3 d-flex flex-column gap-2">
                <label for="" class="control-label fw-bold">Foto Berita <span class="text-muted">(upload jika ingin
                        mengganti)</span></label>
                <input name="foto_berita" id="" type="file"
                    class="form-control @error('foto_berita') is-invalid @enderror">
                @error('foto_berita')
                    <small class="fw-bold text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3 d-flex flex-column gap-2">
                <label for="" class="control-label fw-bold">Isi Berita</label>
                <textarea name="isi_berita" class="form-control @error('isi_berita') is-invalid @enderror">{{ $berita->isi_berita }}</textarea>
                @error('isi_berita')
                    <small class="text-danger fw-bold">{{ $message }}</small>
                @enderror
            </div>
            <div class="buttons">
                <button class="btn btn-primary">Submit</button>
                <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
    </div>
@endsection
