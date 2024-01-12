@extends('layout.auth.app')
@section('content')
    <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center bg-info">
        <div class="card py-4 d-flex flex-row align-items-center shadow-lg" style="border-radius: 20px;">
            <div class="login-illustration d-none d-md-block">
                <img src="{{ asset('asset/images/ambulance-illustration.png') }}" alt="">
            </div>
            <div class="login-form py-4">
                <div class="login-title d-flex flex-column gap-2 align-items-left">
                    <strong>
                        Welcome Back
                    </strong>
                    <p class="text-secondary">Login to continue</p>
                </div>
                <form action="{{ route('auth.admin_login') }}" method="post">
                    {{ csrf_field() }}
                    <div class="mb-3 d-flex flex-column gap-2">
                        <label for="email" class="control-label fw-bold">Email</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                            placeholder="Email">
                        @error('email')
                            <small class="text-danger fw-bold">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 d-flex flex-column gap-2 password-toggle">
                        <label for="password" class="control-label fw-bold">Password</label>
                        <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        @error('password')
                            <small class="text-danger fw-bold">{{ $message }}</small>
                        @enderror
                    </div>
                    <button class="btn btn-info">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection
