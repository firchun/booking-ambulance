@include('layout.sidebar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Pengguna</title>
</head>
<body>
    <div class="container-fluid d-flex flex-column align-items-end p-0 bg-white min-vh-100 p-4">
        @include('layout.header')
        <hr>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('pengguna.index')}}">Pengguna</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Pengguna</li>
            </ol>
        </nav>
        <div class="dashboard-content card d-flex flex-column p-4 bg-white">
            <div class="dashboard-title">
                <i class="uil uil-edit"></i>&nbsp;Edit Pengguna
            </div>
            <hr class="pb-4">
            <form action="{{route('pengguna.update', $pengguna->id)}}" method="post" class="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                <div class="mb-3 d-flex flex-column gap-2">
                    <label for="nama" class="control-label fw-bold">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Pengguna" value="{{$pengguna->nama}}">
                    @error('nama')
                        <small class="text-danger fw-bold">{{$message}}</small>
                    @enderror
                </div>
                <div class="mb-3 d-flex flex-column gap-2">
                    <label for="alamat" class="control-label fw-bold">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat">{{$pengguna->alamat}}</textarea>
                    @error('alamat')
                        <small class="text-danger fw-bold">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3 d-flex flex-column gap-2">
                    <label for="noHP" class="control-label fw-bold">No. HP</label>
                    <input type="number" name="noHP" id="noHP" class="form-control @error('noHP') is-invalid @enderror" value="{{ $pengguna->noHP }}" placeholder="No. HP">
                    @error('noHP')
                        <small class="text-danger fw-bold">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3 d-flex flex-column gap-2">
                    <label for="email" class="control-label fw-bold">Email</label>
                    <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{$pengguna->email}}">
                    @error('email')
                        <small class="text-danger fw-bold">{{$message}}</small>
                    @enderror
                </div>
                <div class="mb-3 d-flex flex-column gap-2">
                    <label for="password" class="control-label fw-bold">Password</label>
                    <input type="text" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                    @error('password')
                        <small class="text-danger fw-bold">{{$message}}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="status" class="control-label fw-bold">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="diproses" {{ $pengguna->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                        <option value="disetujui" {{ $pengguna->status == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                        <option value="ditolak" {{ $pengguna->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('pengguna.index')}}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>    
</body>
</html>
