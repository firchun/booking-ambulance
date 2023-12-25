@include('layout/sidebar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Admin</title>
</head>
<body>
    <div class="container-fluid d-flex flex-column align-items-end bg-white min-vh-100 p-4">
        @include('layout.header')
        <hr>
        <div class="dashboard-content card d-flex flex-column p-4 bg-white">
            <h3>Halo Selamat Datang Administrator</h3>
            <p>
                Di sistem ini kamu bisa kelola data terkait pemesanan ambulance
            </p>
            <div class="d-flex flex-row gap-4">
                <div class="card p-4">
                    <b>Jumlah Supir</b>
                    {{count($supir)}}
                </div>
                <div class="card p-4">
                    <b>Jumlah Mobil Tersedia</b>
                    {{count($ambulance)}}
                </div>
            </div>
        </div>
    </div>
</body>
</html>