@include('layout.sidebar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Ambulance</title>
</head>
<body>
    <div class="container-fluid d-flex flex-column align-items-end p-0 bg-white min-vh-100 p-4">
        @include('layout.header')
        <hr>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('ambulance.index')}}">Ambulance</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Ambulance</li>
            </ol>
        </nav>
        <div class="dashboard-content card d-flex flex-column p-4 bg-white">
            <div class="dashboard-title">
                <i class="uil uil-edit"></i>&nbsp;Edit Ambulance
            </div>
            <hr class="pb-4">
            <form action="{{route('ambulance.update', $ambulance->id)}}" method="post" class="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                <div class="mb-3 d-flex flex-column gap-2">
                    <label for="nama" class="control-label fw-bold">No Polisi</label>
                    <input type="text" name="noPolisi" id="nama" class="form-control @error('noPolisi') is-invalid @enderror" placeholder="No Polisi" value="{{$ambulance->noPolisi}}">
                    @error('noPolisi')
                        <small class="text-danger fw-bold">{{$message}}</small>
                    @enderror
                </div>
                <div class="mb-3 d-flex flex-column gap-2">
                    <label for="email" class="control-label fw-bold">Merk</label>
                    <input type="text" name="merk" id="merk" class="form-control @error('merk') is-invalid @enderror" placeholder="Merk" value="{{$ambulance->merk}}">
                    @error('merk')
                        <small class="text-danger fw-bold">{{$message}}</small>
                    @enderror
                </div>
                <div class="mb-3 d-flex flex-column gap-2">
                    <label for="noMesin" class="control-label fw-bold">No Mesin</label>
                    <input type="text" name="noMesin" id="noMesin" class="form-control @error('noMesin') is-invalid @enderror" placeholder="No Mesin" value="{{$ambulance->noMesin}}">
                    @error('noMesin')
                        <small class="text-danger fw-bold">{{$message}}</small>
                    @enderror
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('ambulance.index')}}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>    
</body>
</html>
