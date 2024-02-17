@extends('layout.admin')

@section('main-content')
        <hr>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('pemesanan.index')}}">Data Pemesanan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Supir</li>
            </ol>
        </nav>
        <div class="dashboard-content card d-flex flex-column p-4 bg-white">
            <div class="dashboard-title">
                <i class="uil uil-plus"></i>&nbsp;Tambah Supir
            </div>
            <hr class="pb-4">
            <form action="{{route('pemesanan.update')}}" class="form" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$id}}">
                <div class="mb-3 d-flex flex-column gap-2">
                    <label for="" class="control-label fw-bold">Pilih</label>
                    <select name="supir" id="" class="form-select">
                        <option value="0">Supir Yang Tersedia</option>
                        @foreach ($supir as $item)
                        <option value="{{$item->id}}">{{$item->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 d-flex flex-column gap-2">
                    <label for="alamat" class="control-label fw-bold">Status</label>
                    <select name="status" id="" class="form-select">
                        <option>Pilih Status</option>
                        <option value="diterima">Pesanan Diterima</option>
                        <option value="ditolak"> Pesanan Ditolak</option>
                    </select>
                </div>
                <div class="buttons">
                    <button class="btn btn-primary">Submit</button>
                    <a href="{{route('pemesanan.index')}}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>    
    @endsection