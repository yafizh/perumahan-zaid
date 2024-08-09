<div class="container pt-5">
    <x-header-dashboard>
        <x-slot:title-page>
            Ganti Password
        </x-slot:title-page>
    </x-header-dashboard>
    <hr>
    <main class="mb-3 row justify-content-center">
        <div class="col-12 col-md-6">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger text-capitalize" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            @if (session('berhasil'))
                <div class="alert alert-success text-capitalize" role="alert">
                    {{ session('berhasil') }}
                </div>
            @endif
            <form action="{{ $action }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="password_lama" class="form-label">Password Lama</label>
                    <input type="password" class="form-control" id="password_lama" name="password_lama" required>
                </div>
                <div class="mb-3">
                    <label for="password_baru" class="form-label">Password Baru</label>
                    <input type="password" class="form-control" id="password_baru" name="password_baru" required>
                </div>
                <div class="mb-3">
                    <label for="konfirmasi_password_baru" class="form-label">Konfirmasi Password Baru</label>
                    <input type="password" class="form-control" id="konfirmasi_password_baru"
                        name="konfirmasi_password_baru" required>
                </div>
                <div class="mb-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Ganti Password</button>
                </div>
            </form>
        </div>
    </main>
</div>
