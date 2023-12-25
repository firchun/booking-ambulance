<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Supir</title>
    <link rel="stylesheet" href="{{ asset('asset/css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center bg-info">
        <div class="card py-4 d-flex flex-row align-items-center">
            <div class="login-illustration p-2"> 
                <img src="{{ asset('asset/images/ambulance-illustration.png') }}" alt="">
            </div>
            <div class="login-form py-4">
                <div class="login-title d-flex flex-column gap-2 align-items-left">
                    <strong>
                        Welcome Back
                    </strong>
                    <p class="text-secondary">Login to continue</p>
                </div>
                <form action="{{ route('auth.supir_login') }}" method="post">
                    {{ csrf_field() }}
                    <div class="mb-3 d-flex flex-column gap-2">
                        <label for="email" class="control-label fw-bold">Email</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email">
                        @error('email')
                            <small class="text-danger fw-bold">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 d-flex flex-column gap-2 password-toggle">
                        <label for="password" class="control-label fw-bold">Password</label>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        @error('password')
                            <small class="text-danger fw-bold">{{ $message }}</small>
                        @enderror
                    </div>
                    <button class="btn btn-info">Login</button>
                    <div class="mt-3">
                    <p>Belum punya akun? <a href="{{ route('auth.supir_register_form') }}" class="text-info">Daftar disini</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
</body>
</html>