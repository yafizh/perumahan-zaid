@extends('dashboard.admin.layouts.main')

@section('content')
    <div class="container pt-5">
        <x-header-dashboard>
            <x-slot:title-page>
                Tambah Blok Perumahan
            </x-slot:title-page>
            <x-slot:buttons>
                <a href="/admin/blok-perumahan" class="btn btn-secondary w-100 mb-3">Kembali</a>
            </x-slot:buttons>
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
                <form action="/admin/blok-perumahan" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Blok Perumahan</label>
                        <input type="text" class="form-control" id="nama" name="nama" required autocomplete="off"
                            value="{{ old('nama') }}">
                    </div>
                    <div class="mb-3">
                        <label for="nomor_awal_rumah" class="form-label">Nomor Awal Rumah</label>
                        <input type="number" class="form-control" id="nomor_awal_rumah" name="nomor_awal_rumah"
                            min="1" required autocomplete="off" value="{{ old('nomor_awal_rumah') }}">
                    </div>
                    <div class="mb-3">
                        <label for="nomor_akhir_rumah" class="form-label">Nomor Akhir Rumah</label>
                        <input type="number" class="form-control" id="nomor_akhir_rumah" name="nomor_akhir_rumah"
                            min="1" required autocomplete="off" value="{{ old('nomor_akhir_rumah') }}">
                    </div>
                    <div class="mb-3">
                        <label for="urutan" class="form-label">Urutan</label>
                        <input type="number" class="form-control" id="urutan" name="urutan" min="1" required
                            autocomplete="off" value="{{ old('urutan') }}">
                    </div>
                    <div class="mb-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
@endsection
