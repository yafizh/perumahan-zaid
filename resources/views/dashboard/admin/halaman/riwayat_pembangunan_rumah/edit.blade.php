@extends('dashboard.admin.layouts.main')

@section('content')
    <div class="container pt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Edit Riwayat Pembangunan Rumah</h4>
            <button onclick="history.back()" class="btn btn-secondary">Kembali</button>
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
                <form action="/admin/riwayat-pembangunan-rumah/{{ $riwayat_pembangunan_rumah->id }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Blok Rumah</label>
                        <input type="text" class="form-control" disabled
                            value="{{ $riwayat_pembangunan_rumah->rumah->blokPerumahan->nama }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nomor Rumah</label>
                        <input type="text" class="form-control" disabled
                            value="{{ $riwayat_pembangunan_rumah->rumah->nomor_rumah }}">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal"
                            value="{{ old('tanggal', $riwayat_pembangunan_rumah->tanggal) }}">
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control" required>{{ old('keterangan', $riwayat_pembangunan_rumah->keterangan) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                    </div>
                    <div class="mb-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Perbaharui Data</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
@endsection
