<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Verifikasi Pengguna</title>
    <link rel="icon" type="image/x-icon" href="/assets/images/logo1.png">

    <link href="/styles/main.min.css" rel="stylesheet">
    <style>
        body {
            background-color: var(--bs-primary);
        }
    </style>
</head>

<body>
    <main class="row justify-content-center mx-0 p-5 px-5 w-100">
        <div class="col-12 col-sm-6 col-md-4 bg-white shadow rounded p-4">
            <div class="text-center">
                <h5><a href="/" class="text-decoration-none">PT. CITRA PUTRI MUSTIKA</a></h5>
                <hr>
                <p>Masukkan Kode OTP yang telah diberikan melalui nomor telepon.</p>
            </div>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger text-capitalize" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            <form
                action="/verifikasi-pendaftaran-pelanggan?id_pendaftaran_pelanggan={{ request()->get('id_pendaftaran_pelanggan') }}"
                method="POST">
                @csrf
                <div class="mb-3">
                    <label for="kode_otp" class="mb-1">Kode OTP</label>
                    <input type="text" class="form-control" name="kode_otp" id="kode_otp" required
                        autocomplete="off" autofocus>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100">VERIFIKASI</button>
                </div>
                <div class="text-center">
                    <a href="/login">Login</a>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
