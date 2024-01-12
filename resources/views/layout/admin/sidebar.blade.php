<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('asset/css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
</head>

<body>
    <div class="sidebar container position-fixed fixed-left bg-light min-vh-100 d-flex flex-column py-4"
        style="width:300px">
        <div class="logo">
            <h4>
                Ambulance.
            </h4>
        </div>
        <hr>
        <ul class="nav nav-pills d-flex flex-column mb-auto">
            <li class="nav-item"><a href="{{ route('admin.home') }}"
                    class="nav-link {{ Request::is('admin/dashboard') ? 'bg-primary active' : '' }}"><i
                        class="uil uil-tachometer-fast-alt"></i>&nbsp;Dashboard</a></li>
            <li class="nav-item"><a href="{{ route('pengguna.index') }}"
                    class="nav-link {{ Request::is('admin/pengguna*') ? 'bg-primary active' : '' }}"><i
                        class="uil uil-user"></i>&nbsp;Pengguna</a></li>
            <li class="nav-item"><a href="{{ route('supir.index') }}"
                    class="nav-link {{ Request::is('admin/supir*') ? 'bg-primary active' : '' }}"><i
                        class="uil uil-user-md"></i>&nbsp;Supir</a></li>
            <li class="nav-item"><a href="{{ route('ambulance.index') }}"
                    class="nav-link {{ Request::is('admin/ambulance*') ? 'bg-primary active' : '' }}"><i
                        class="uil uil-ambulance"></i>&nbsp;Ambulance</a></li>
            <li class="nav-item"><a href="{{ route('peti.index') }}"
                    class="nav-link {{ Request::is('admin/peti*') ? 'bg-primary active' : '' }}"><i
                        class="uil uil-cube"></i>&nbsp;Peti</a></li>
            <li class="nav-item"><a href="{{ route('pemesanan.index') }}"
                    class="nav-link {{ Request::is('admin/pemesanan*') ? 'bg-primary active' : '' }}"><i
                        class="uil uil-ambulance"></i>&nbsp;Pemesanan</a></li>
            <li class="nav-item"><a href="{{ route('auth.logout') }}" class="nav-link"><i
                        class="uil uil-sign-out-alt"></i>&nbsp;Logout</a></li>
        </ul>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.14.0/sweetalert2.all.min.js"
        integrity="sha512-LXVbtSLdKM9Rpog8WtfAbD3Wks1NSDE7tMwOW3XbQTPQnaTrpIot0rzzekOslA1DVbXSVzS7c/lWZHRGkn3Xpg=="
        crossorigin="anonymous"></script>
</body>

</html>
