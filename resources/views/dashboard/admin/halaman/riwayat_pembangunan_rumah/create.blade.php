@extends('dashboard.admin.layouts.main')

@section('content')
    <div class="container pt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Tambah Riwayat Pembangunan Rumah</h4>
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
                <form action="/admin/riwayat-pembangunan-rumah" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" hidden name="id_rumah" value="{{ $rumah->id }}">
                    <div class="mb-3">
                        <label class="form-label">Blok Rumah</label>
                        <input type="text" class="form-control" disabled value="{{ $rumah->blokPerumahan->nama }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nomor Rumah</label>
                        <input type="text" class="form-control" disabled value="{{ $rumah->nomor_rumah }}">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal"
                            value="{{ old('tanggal', Date('Y-m-d')) }}">
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control" required>{{ old('keterangan') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="proses_pembangunan"
                                name="proses_pembangunan">
                            <label class="form-check-label" for="proses_pembangunan">
                                Pembangunan Selesai?
                            </label>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
@endsection
