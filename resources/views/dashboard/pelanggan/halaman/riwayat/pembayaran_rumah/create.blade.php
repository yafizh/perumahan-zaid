@extends('dashboard.pelanggan.layouts.main')

@section('content')
    <div class="container pt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Pembayaran Rumah</h4>
            <a href="/pelanggan/{{ $rumahPelanggan->id }}/riwayat-pembayaran-rumah" class="btn btn-secondary">
                Kembali
            </a>
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
                <form action="/pelanggan/{{ $rumahPelanggan->id }}/riwayat-pembayaran-rumah" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id_pembayaran" value="{{ $pembayaran->id }}" hidden>
                    <div class="mb-3">
                        <label class="form-label">Blok Rumah</label>
                        <input type="text" class="form-control" disabled
                            value="{{ $rumahPelanggan->rumah->blokPerumahan->nama }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nomor Rumah</label>
                        <input type="text" class="form-control" disabled
                            value="{{ $rumahPelanggan->rumah->nomor_rumah }}">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Pembayaran Tanggal</label>
                        <input type="text" class="form-control" disabled value="{{ $pembayaran->tanggal() }}">
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Bukti Pembayaran</label>
                        <input type="file" class="form-control" id="foto" name="foto" required>
                    </div>
                    <div class="mb-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Lakukan Pembayaran</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
@endsection
