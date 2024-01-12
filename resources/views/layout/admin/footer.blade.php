<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <div class="container-fluid footer p-0 bg-dark" id="footer">
        <div class="container py-5 px-0 d-flex flex-column gap-4">
            <div class="foo text-center text-white">
                Copyright {{ \Carbon\Carbon::now()->format('Y') }} Ambulance.
            </div>
        </div>
    </div>
</body>

</html>
