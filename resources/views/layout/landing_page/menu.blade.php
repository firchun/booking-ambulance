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
                        <li><a class="dropdown-item @@blog" href="#">Pemesanan Mobil dan
                                Peti</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    @guest
                        <a class="nav-link" href="{{ route('auth.pengguna_form') }}">Login</a>
                    @else
                        <a class="nav-link text-danger" href="{{ route('auth.logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('auth.logout') }}" method="GET" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--End Main Header -->
