<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Ambulance</title>
    <link href="{{ asset('/vendor/bootstrap') }}/css/bootstrap.css" rel="stylesheet">
    <script src="{{ asset('/vendor/bootstrap') }}/js/bootstrap.bundle.min.js"></script>
    {{-- <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"> --}}
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
</head>

<body class="bg-white">
    {{-- <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid py-4 px-5">
            <a class="navbar-brand" href="#">Ambulance.</a>
        </div>
    </nav> --}}
    <div class="">
        <img src="{{ asset('asset/images/ambulance-illustration.png') }}" alt=""
            class="img-fluid  d-md-none mt-4">
        <div class="d-flex align-items-center justify-content-center container-fluid min-vh-100  ">
            <div class="hero-text  p-4">
                <h1>Selamat Datang di Aplikasi Booking Ambulance</h1>
                <p class="lead">Solusi terbaik untuk mendapatkan ambulance dengan cepat dan efisien.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam velit corrupti recusandae dolore,
                    nemo
                    laborum pariatur modi optio, ab accusamus molestias, sint atque ullam perferendis maiores voluptates
                    unde repellat temporibus!</p>
                <div>
                    <a class="btn btn-info btn-lg mb-3" href="{{ route('auth.pengguna_form') }}" role="button">Booking
                        Sekarang</a>
                    <a class="btn btn-outline-info btn-lg mb-3" href="{{ route('auth.supir_form') }}"
                        role="button">Daftar
                        Menjadi Driver</a>

                </div>
            </div>
            <div class="hero-illustration d-flex align-items-center justify-content-center d-none d-md-block">
                <div class="w-75">
                    <img src="{{ asset('asset/images/ambulance-illustration.png') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('/vendor/jquery') }}/jquery.min.js"></script>
    <script src="{{ asset('/vendor') }}/popper.js/popper.min.js"></script>

</body>

</html>
