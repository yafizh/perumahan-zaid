@extends('dashboard.staf.layouts.main')

@section('content')
    <div class="container pt-5">
        <x-header-dashboard>
            <x-slot:title-page>
                Edit Penjualan
            </x-slot:title-page>
            <x-slot:buttons>
                <button onclick="history.back()" class="btn btn-secondary w-100 mb-3">Kembali</button>
            </x-slot:buttons>
        </x-header-dashboard>
        <hr>
        <form action="/staf/pembayaran-uang-muka/{{ $pembayaran_uang_muka->id }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <main class="mb-3 row justify-content-center">
                <div class="col-12">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger text-capitalize" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Blok Perumahan</label>
                        <input type="text" class="form-control" disabled
                            value="{{ $pembayaran_uang_muka->rumahPelanggan->rumah->blokPerumahan->nama }}">
                    </div>
                    <div class="mb-3">
                        <label for="id_rumah" class="form-label">Nomor Rumah</label>
                        <input type="text" class="form-control"
                            value="Rumah Nomor {{ $pembayaran_uang_muka->rumahPelanggan->rumah->nomor_rumah }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" required
                            value="{{ $pembayaran_uang_muka->tanggal }}">
                    </div>
                    <div class="mb-3">
                        <label for="nominal" class="form-label">Biaya Uang Muka</label>
                        <input type="text" class="form-control" name="nominal" id="nominal" required
                            value="{{ number_format($pembayaran_uang_muka->nominal, 0, ',', '.') }}">
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Bukti Pembayaran</label>
                        <input type="file" class="form-control" name="foto" id="foto" accept="image/*">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <input type="text" hidden name="id_pelanggan" id="id_pelanggan">
                    <div class="mb-3">
                        <label class="form-label">NIK Pelanggan</label>
                        <input type="text" class="form-control"
                            value="{{ $pembayaran_uang_muka->rumahPelanggan->pelanggan->nik }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Pelanggan</label>
                        <input type="text" class="form-control"
                            value="{{ $pembayaran_uang_muka->rumahPelanggan->pelanggan->nama }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control"
                            value="{{ $pembayaran_uang_muka->rumahPelanggan->pelanggan->nomor_telepon }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control"
                            value="{{ $pembayaran_uang_muka->rumahPelanggan->pelanggan->email }}" disabled>
                    </div>
                    <div class="mb-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Perbaharui Data</button>
                    </div>
                </div>
            </main>
        </form>
    </div>
    <script>
        document.querySelector('input[name=nominal]').addEventListener("keypress", function(evt) {
            if (evt.which < 48 || evt.which > 57) {
                evt.preventDefault();
                return;
            }

            this.addEventListener('input', function() {
                const nominal = Number(((this.value).split('.')).join(''));
                this.value = formatNumberWithDot.format(nominal);
            });
        });
    </script>
@endsection
