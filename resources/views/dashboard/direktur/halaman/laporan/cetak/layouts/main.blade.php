<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <header class="text-center p-4">
        <img src="/assets/images/logo1.png" alt="Logo" width="120" style="position: absolute; left: 20px;">
        <h4>PT KARYA PUTRA BERSAUDARA</h4>
        Jalan Veteran Rt. 037 Rw. 013 Kelurahan Keraton Kecamatan Martapura Kota Kabupaten Banjar
        <br>
        Telepon: 0812 5511 1151, Website: https://ptkaryabersaudara.com/, 
        <br>
        Email: karyaputrabersaudara@gmail.com
    </header>
    <div class="d-flex flex-column justify-content-center w-100">
        <div style="width: 100%; border-top: 3px solid black;"></div>
    </div>
    @yield('content')
    <footer class="d-flex justify-content-end py-4">
        @php $today = new \Carbon\Carbon(); @endphp
        <div class="text-center">
            <h6>Banjarbaru,
                {{ $today->day . ' ' . $today->locale('ID')->getTranslatedMonthName() . ' ' . $today->year }}
            </h6>
            <br><br><br><br><br>
            <h6>ADMIN</h6>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js">
    </script>
    <script>
        window.print();
    </script>
</body>

</html>
