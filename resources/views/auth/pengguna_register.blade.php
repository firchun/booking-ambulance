@extends('layout.auth')

@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <a href="{{ url('/') }}" class="h3 fw-bold">Ambulance</a>
                                        <h1 class="h4 text-gray-900 mb-4">{{ __('Register') }}</h1>
                                    </div>

                                    @if ($errors->any())
                                        <div class="alert alert-danger border-left-danger" role="alert">
                                            <ul class="pl-4 my-2">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="login-title d-flex flex-column gap-2 align-items-left">
                                        <strong>
                                            Booking Ambulance dengan cepat dan tepat
                                        </strong>
                                        <p class="text-secondary">Bergabung dengan kami sekarang!</p>
                                    </div>
                                    <form method="POST" action="{{ route('auth.pengguna_register') }}" class="user">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="nama"
                                                placeholder="{{ __('Nama') }}" value="{{ old('nama') }}" required
                                                autofocus>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="alamat"
                                                placeholder="{{ __('Alamat') }}" value="{{ old('alamat') }}" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-user" name="noHP"
                                                placeholder="{{ __('No Hp') }}" value="{{ old('noHP') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email"
                                                placeholder="{{ __('Email') }}" value="{{ old('email') }}" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password"
                                                placeholder="{{ __('Password') }}" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="password_confirmation" placeholder="{{ __('Confirm Password') }}"
                                                required>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </form>

                                    <hr>

                                    <div class="text-center">
                                        <p>Sudah punya akun? <a href="{{ route('auth.pengguna_form') }}"
                                                class="text-info">Masuk disini</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
