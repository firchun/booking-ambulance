<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('/vendor/bootstrap') }}/bootstrap.min.css" rel="stylesheet">
    <script src="{{ asset('/vendor/bootstrap') }}/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-info">
        <div class="container-fluid px-4 py-2 gap-4">
            <a class="navbar-brand text-white" href="#">Ambulance.</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-4">
                    @if (Auth::guard('pengguna')->user())
                        <li class="nav-item">
                            <a class="nav-link text-white active" aria-current="page"
                                href="{{ route('pengguna.home') }}">Home</a>
                        </li>
                        <li class="nav-item text-white">
                            <a class="nav-link text-white" href="{{ route('page.ambulance') }}">Daftar Ambulance</a>
                        </li>
                    @else
                    @endif
                </ul>
                <div>
                    <a href="{{ route('auth.logout') }}" class="btn btn-light">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.14.0/sweetalert2.all.min.js"
        integrity="sha512-LXVbtSLdKM9Rpog8WtfAbD3Wks1NSDE7tMwOW3XbQTPQnaTrpIot0rzzekOslA1DVbXSVzS7c/lWZHRGkn3Xpg=="
        crossorigin="anonymous"></script>
</body>

</html>
