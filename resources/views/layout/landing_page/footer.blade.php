<!--footer-main-->
<footer class="footer-main">

    <div class="footer-bottom">
        <div class="container clearfix">
            <div class="copyright-text">
                <p>&copy; Copyright {{ date('Y') }}.
                </p>
            </div>
            <ul class="footer-bottom-link">
                <li>
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li>
                    <a href="{{ url('/struktur') }}">Struktur</a>
                </li>
                <li>
                    <a href="{{ route('auth.pengguna_form') }}">Login</a>
                </li>
            </ul>
        </div>
    </div>
</footer>
<!--End footer-main-->
