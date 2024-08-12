<!DOCTYPE html>
<html lang="en">

<head>
    <title>PERUMAHAN</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/styles/main.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/assets/images/logo1.png">
    <link rel="preload" as="image" href="/assets/images/no-image.png">
    <link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/r-2.4.1/datatables.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/table.css">
    <script src="/assets/js/currency.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <main id="main" class="d-flex flex-nowrap">
        @include('dashboard.staf.partials.sidebar')
        @yield('content')
    </main>
    <script src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/r-2.4.1/datatables.min.js"></script>
    <script src="/assets/js/datatables.js"></script>
</body>

</html>
