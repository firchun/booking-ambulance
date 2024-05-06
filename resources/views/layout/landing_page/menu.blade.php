<!--Main Header-->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarLinks"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarLinks">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/struktur') }}">Struktur</a>
                </li>
                <li class="nav-item dropdown @@blogs">
                    <a class="nav-link dropdown-toggle" href="#!" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Info Pelayanan</a>

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ url('/panduan') }}">Pemesanan
                                Mobil dan
                                Peti</a></li>
                    </ul>
                </li>
                <li class="nav-item">

                    @if (auth()->guard('pembuat_peti')->check())
                        <a class="nav-link" href="{{ route('pembuat_peti.home') }}">Dashboard</a>
                    @elseif (auth()->guard('pengguna')->check())
                        <a class="nav-link" href="{{ route('pengguna.home') }}">Dashboard</a>
                    @elseif (auth()->guard('supir')->check())
                        <a class="nav-link" href="{{ route('supir.home') }}">Dashboard</a>
                    @elseif (auth()->guard('admin')->check())
                        <a class="nav-link" href="{{ route('admin.home') }}">Dashboard</a>
                    @else
                        <a class="nav-link" href="{{ route('auth.pengguna_form') }}">Login</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--End Main Header -->
