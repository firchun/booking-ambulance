@include('layout.sidebar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid d-flex flex-column align-items-end p-0 bg-white min-vh-100 p-4">
        @include('layout.header')
        <hr>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('peti.index')}}">Peti</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Peti</li>
            </ol>
        </nav>
        <div class="dashboard-content card d-flex flex-column p-4 bg-white">
            <div class="dashboard-title">
                <i class="uil uil-plus"></i>&nbsp;Tambah Peti
            </div>
            <hr class="pb-4">
            <form action="{{route('peti.store')}}" method="post" class="form">
                {{csrf_field()}}
                <div class="mb-3 d-flex flex-column gap-2">
                    <label for="" class="control-label fw-bold">Jenis Peti</label>
                    <input type="text" name="jenis" id="" class="form-control @error('jenis') is-invalid @enderror" placeholder="Jenis Peti">
                    @error('jenis')
                        <small class="fw-bold text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="mb-3 d-flex flex-column gap-2">
                    <label for="" class="control-label fw-bold">Stok Peti</label>
                    <input type="number" name="stok" id="" class="form-control @error('stok') is-invalid @enderror" min="1" placeholder="Stok Peti">
                    @error('stok')
                        <small class="fw-bold text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-primary">Submit</button>
                    <a href="{{ route('peti.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>