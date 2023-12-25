<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Ambulance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid py-4 px-5">
          <a class="navbar-brand" href="#">Ambulance.</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </nav>
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

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

</body>
</html>
