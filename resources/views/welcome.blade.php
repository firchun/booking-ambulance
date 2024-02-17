@extends('layout.app')
@section('content')
<div class="container-fluid d-flex flex-row align-items-center justify-content-center min-vh-100 bg-white">
    <div class="hero-text w-50 p-4">
        <h1>Selamat Datang di Aplikasi Booking Ambulance</h1>
        <p class="lead">Solusi terbaik untuk mendapatkan ambulance dengan cepat dan efisien.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam velit corrupti recusandae dolore, nemo laborum pariatur modi optio, ab accusamus molestias, sint atque ullam perferendis maiores voluptates unde repellat temporibus!</p>
        <div>
            <a class="btn btn-info btn-lg" href="{{ route('auth.pengguna_form') }}" role="button">Booking Sekarang</a>
            <a class="btn btn-outline-info btn-lg" href="{{ route('auth.supir_form') }}" role="button">Daftar Menjadi Driver</a>
        </div>
    </div>
    <div class="hero-illustration w-50 d-flex align-items-center justify-content-center">
        <div class="w-75">
            <img src="{{ asset('asset/images/ambulance-illustration.png') }}" alt="" class="img-fluid">
        </div>
    </div>
</div>
@endsection
