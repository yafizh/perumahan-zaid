<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>
    <link rel="icon" type="image/x-icon" href="/assets/images/logo1.png">

    <link href="/styles/main.min.css" rel="stylesheet">
    <style>
        body {
            background-color: var(--bs-primary);
            height: 90vh;
        }
    </style>
</head>

<body>
    <main class="row justify-content-center mx-0 mt-5 p-5 w-100">
        <div class="col-12 col-sm-6 col-md-4 bg-white shadow rounded p-4">
            <div class="text-center">
                <h5><a href="/" class="text-decoration-none">PT. KARYA PUTRA BERSAUDARA</a></h5>
                <hr>
                <p>Masukkan Username/NIK/Email dan Password yang terdaftar untuk melanjutkan proses.</p>
            </div>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger text-capitalize" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            @if (session('auth'))
                <div class="alert alert-danger text-capitalize" role="alert">
                    {{ session('auth') }}
                </div>
            @endif
            @if (session('pendaftaran'))
                <div class="alert alert-success text-capitalize" role="alert">
                    {{ session('pendaftaran') }}
                </div>
            @endif
            <form action="/login" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="username" class="mb-1">Username/NIK/Email</label>
                    <input type="text" class="form-control" name="username" id="username" required
                        autocomplete="off" autofocus>
                </div>
                <div class="mb-3">
                    <label for="password" class="mb-1">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100">LOGIN</button>
                </div>
                <div class="text-center">
                    <a href="/pendaftaran-pelanggan">Daftar Baru?</a>
                </div>
            </form>
        </div>
    </main>
    <svg style="position: absolute; bottom: 0; z-index: -2;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#F8F9FA" fill-opacity="1"
            d="M0,32L120,74.7C240,117,480,203,720,208C960,213,1200,139,1320,101.3L1440,64L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z">
        </path>
    </svg>
</body>

</html>
