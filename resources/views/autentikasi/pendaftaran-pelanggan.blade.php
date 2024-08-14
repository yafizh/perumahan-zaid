<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Pendaftaran</title>
    <link rel="icon" type="image/x-icon" href="/assets/images/logo.jpg">

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
                <p>Masukkan Identitas Diri dan Password untuk proses pendaftaran.</p>
            </div>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger text-capitalize" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            <form action="/pendaftaran-pelanggan" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nik" class="mb-1">NIK</label>
                    <input type="text" class="form-control" name="nik" id="nik" required autocomplete="off"
                        autofocus value="{{ old('nik') }}">
                </div>
                <div class="mb-3">
                    <label for="nama" class="mb-1">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" required
                        autocomplete="off" value="{{ old('nama') }}">
                </div>
                <div class="mb-3">
                    <label for="nomor_telepon" class="mb-1">Nomor Telepon</label>
                    <input type="text" class="form-control" name="nomor_telepon" id="nomor_telepon" required
                        autocomplete="off" value="{{ old('nomor_telepon') }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="mb-1">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="mb-3">
                    <label for="konfirmasi_password" class="mb-1">Konfirmasi Password</label>
                    <input type="password" class="form-control" name="konfirmasi_password" id="konfirmasi_password"
                        required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100">DAFTAR</button>
                </div>
                <div class="text-center">
                    <a href="/login">Login</a>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
