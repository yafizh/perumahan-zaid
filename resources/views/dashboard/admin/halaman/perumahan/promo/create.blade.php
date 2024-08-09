@extends('dashboard.admin.layouts.main')

@section('content')
    <div class="container pt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Tambah Promo</h4>
            <a href="/admin/promo" class="btn btn-secondary">Kembali</a>
        </div>
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
                <form action="/admin/promo" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Promo</label>
                        <input type="text" class="form-control" id="nama" name="nama" required autocomplete="off"
                            value="{{ old('nama') }}">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required
                            autocomplete="off" value="{{ old('tanggal_mulai') }}">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" required
                            autocomplete="off" value="{{ old('tanggal_selesai') }}">
                    </div>
                    <div class="mb-3">
                        <label for="pengurangan_harga" class="form-label">Pengurangan Harga</label>
                        <input type="text" class="form-control" id="pengurangan_harga" name="pengurangan_harga" required
                            autocomplete="off" value="{{ number_format(old('pengurangan_harga'), 0, ',', '.') }}">
                    </div>
                    <div class="mb-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
    <script>
        document.querySelector('input[name=pengurangan_harga]').addEventListener("keypress", function(evt) {
            if (evt.which < 48 || evt.which > 57) {
                evt.preventDefault();
                return;
            }

            this.addEventListener('input', function() {
                const pengurangan_harga = Number(((this.value).split('.')).join(''));
                this.value = formatNumberWithDot.format(pengurangan_harga);
            });
        });
    </script>
@endsection
