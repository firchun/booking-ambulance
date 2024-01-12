@extends('layout.auth.app')
@section('content')
    <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center bg-info">
        <div class="py-4 d-flex flex-lg-row flex-column flex-wrap align-items-center my-4 ">
            <div class="flex-grow-1 login-form card py-4 shadow-lg" style="border-radius: 20px;">
                <div class="login-title d-flex flex-column gap-2 align-items-left">
                    <strong>
                        Booking Ambulance dengan cepat dan tepat
                    </strong>
                    <p class="text-secondary">Daftarkan sekarang!</p>
                </div>
                <form action="{{ route('auth.pengguna_register') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 d-flex flex-column gap-2">
                        <label for="nama" class="control-label fw-bold">Nama</label>
                        <input type="text" name="nama" id="nama"
                            class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}"
                            placeholder="Nama">
                        @error('nama')
                            <small class="text-danger fw-bold">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 d-flex flex-column gap-2">
                        <label for="alamat" class="control-label fw-bold">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <small class="text-danger fw-bold">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 d-flex flex-column gap-2">
                        <label for="noHP" class="control-label fw-bold">No. HP</label>
                        <input type="number" name="noHP" id="noHP"
                            class="form-control @error('noHP') is-invalid @enderror" value="{{ old('noHP') }}"
                            placeholder="No. HP">
                        @error('noHP')
                            <small class="text-danger fw-bold">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 d-flex flex-column gap-2">
                        <label for="email" class="control-label fw-bold">Email</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                            placeholder="Email">
                        @error('email')
                            <small class="text-danger fw-bold">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 d-flex flex-column gap-2">
                        <label for="password" class="control-label fw-bold">Password</label>
                        <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        @error('password')
                            <small class="text-danger fw-bold">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 d-flex flex-column gap-2">
                        <label for="password_confirmation" class="control-label fw-bold">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            placeholder="Konfirmasi Password">
                        @error('password_confirmation')
                            <small class="text-danger fw-bold">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="d-flex flex-column gap-2">
                        <button type="submit" class="btn btn-info btn-block mt-3 w-100">SignUp</button>
                        <a href="{{ route('auth.pengguna_form') }}" type="submit"
                            class="btn btn-outline-info btn-block w-100">Signin</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HD9oADWtyq5bmQ5L7Jd2bj74iBZhe+f/rqvP5wtAv0gD67le6zsl6NKK8MVXmI5N" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.14.0/sweetalert2.all.min.js"
        integrity="sha512-LXVbtSLdKM9Rpog8WtfAbD3Wks1NSDE7tMwOW3XbQTPQnaTrpIot0rzzekOslA1DVbXSVzS7c/lWZHRGkn3Xpg=="
        crossorigin="anonymous"></script>
@endsection
