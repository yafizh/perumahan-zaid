@extends('dashboard.staf.layouts.main')

@section('content')
    <div class="container pt-5">
        <x-header-dashboard>
            <x-slot:title-page>
                Detail Pengajuan Kredit
            </x-slot:title-page>
            <x-slot:buttons>
                <a href="/staf/pengajuan-kredit" class="btn btn-secondary w-100 mb-3">Kembali</a>
            </x-slot:buttons>
        </x-header-dashboard>
        <hr>
        <main class="mb-3 row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label class="form-label">NIK Pelanggan</label>
                    <input type="text" class="form-control" disabled value="{{ $pengajuanKredit->pelanggan->nik }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Pelanggan</label>
                    <input type="text" class="form-control" disabled value="{{ $pengajuanKredit->pelanggan->nama }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nomor Telepon</label>
                    <input type="text" class="form-control" disabled
                        value="{{ $pengajuanKredit->pelanggan->nomor_telepon }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" disabled value="{{ $pengajuanKredit->pelanggan->email }}">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label class="form-label">Blok Perumahan</label>
                    <input type="text" class="form-control" disabled
                        value="{{ $pengajuanKredit->rumah->blokPerumahan->nama }}">
                </div>
                <div class="mb-3">
                    <label for="id_rumah" class="form-label">Nomor Rumah</label>
                    <input type="text" class="form-control" disabled
                        value="Rumah Nomor {{ $pengajuanKredit->rumah->nomor_rumah }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="text" class="form-control" disabled value="{{ $pengajuanKredit->tanggalPengajuan() }}">
                </div>
                <div class="mb-3">
                    <label class="form-label d-block">Status</label>
                    @if ($pengajuanKredit->status == 1)
                        <span class="badge text-bg-warning">Menunggu Verifikasi</span>
                    @elseif ($pengajuanKredit->status == 2)
                        <span class="badge text-bg-danger">Ditolak</span>
                    @elseif ($pengajuanKredit->status == 3)
                        <span class="badge text-bg-success">Diterima</span>
                    @endif
                </div>
                @if ($pengajuanKredit->status == 2 || $pengajuanKredit->status == 3)
                    <div class="mb-3">
                        <label class="form-label">Tanggal Verifikasi</label>
                        <input type="text" class="form-control" disabled
                            value="{{ $pengajuanKredit->tanggalVerifikasi() }}">
                    </div>
                @endif
            </div>
        </main>
    </div>
@endsection
