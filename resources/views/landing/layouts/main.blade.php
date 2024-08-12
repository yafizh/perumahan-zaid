<!DOCTYPE html>
<html lang="en">

<head>
    <title>PERUMAHAN</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preload" as="style" href="/styles/main.min.css">
    <link rel="preload" as="image" href="/assets/images/no-image.png">
    <link rel="preload" as="image" href="/assets/images/logo2.png">
    <link rel="preload" as="image" href="/assets/images/rumah.png">
    <link rel="icon" type="image/x-icon" href="/assets/images/logo1.png">
    <link href="/styles/main.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/r-2.4.1/datatables.min.css" rel="stylesheet" />

    {{-- Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <style>
        ::-webkit-scrollbar {
            width: 0;
            /* Remove scrollbar space */
        }

        html {
            scrollbar-width: none;
        }

        * {
            font-family: 'Rubik';
        }

        #lokasi-perumahan ul li,
        .navbar ul li {
            margin: .4rem 0;
        }

        #lokasi-perumahan ul li i {
            margin-right: .4rem;
        }

        .no-select {
            -webkit-touch-callout: none;
            /* iOS Safari */
            -webkit-user-select: none;
            /* Safari */
            -khtml-user-select: none;
            /* Konqueror HTML */
            -moz-user-select: none;
            /* Old versions of Firefox */
            -ms-user-select: none;
            /* Internet Explorer/Edge */
            user-select: none;
            /* Non-prefixed version, currently
                                        supported by Chrome, Edge, Opera and Firefox */
        }
    </style>
</head>

<body>
    <!-- Navbar-->
    @include('landing.partials.navbar')

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('landing.partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/r-2.4.1/datatables.min.js"></script>
    <script>
        document.querySelectorAll('img').forEach(element => {
            element.onerror = function error() {
                element.src = '/assets/images/no-image.png'
            }
        });
    </script>
</body>

</html>
