@include('layout/sidebar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pemesanan</title>
    <livewire:styles/>
</head>
<body>
    <livewire:data-pemesanan/>
    @include('sweetalert::alert')
    <livewire:scripts/>
    @stack('scripts')
</body>
</html>