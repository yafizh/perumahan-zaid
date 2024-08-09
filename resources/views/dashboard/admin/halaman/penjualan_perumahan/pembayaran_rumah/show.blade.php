@extends('dashboard.admin.layouts.main')

@section('content')
    <div class="container pt-5">
        <x-header-dashboard>
            <x-slot:title-page>
                Verifikasi Pembayaran RUmah
            </x-slot:title-page>
            <x-slot:buttons>
                <a href="/admin/pembayaran-rumah" class="btn btn-secondary w-100 mb-3">Kembali</a>
            </x-slot:buttons>
        </x-header-dashboard>
        <hr>
        <main class="mb-3 row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label class="form-label">NIK Pelanggan</label>
                    <input type="text" class="form-control" disabled value="{{ $pelanggan->nik }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Pelanggan</label>
                    <input type="text" class="form-control" disabled value="{{ $pelanggan->nama }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nomor Telepon</label>
                    <input type="text" class="form-control" disabled value="{{ $pelanggan->nomor_telepon }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" disabled value="{{ $pelanggan->email }}">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label class="form-label">Blok Perumahan</label>
                    <input type="text" class="form-control" disabled value="{{ $rumah->blokPerumahan->nama }}">
                </div>
                <div class="mb-3">
                    <label for="id_rumah" class="form-label">Nomor Rumah</label>
                    <input type="text" class="form-control" disabled value="Rumah Nomor {{ $rumah->nomor_rumah }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Pembayaran</label>
                    <input type="text" class="form-control" disabled
                        value="{{ $detail_pembayaran->tanggalPembayaran() }}">
                </div>
                <div class="mb-3">
                    <label class="form-label d-block">Bukti Pembayaran</label>
                    <a href="{{ asset('storage/' . $detail_pembayaran->foto) }}" target="_blank">Lihat</a>
                </div>
                <div class="mb-3">
                    <label class="form-label d-block">Status</label>
                    @if ($detail_pembayaran->status == 1)
                        <span class="badge text-bg-warning">Menunggu Verifikasi</span>
                    @elseif ($detail_pembayaran->status == 2)
                        <span class="badge text-bg-danger">Ditolak</span>
                    @elseif ($detail_pembayaran->status == 3)
                        <span class="badge text-bg-success">Diterima</span>
                    @endif
                </div>
                @if ($detail_pembayaran->status == 2 || $detail_pembayaran->status == 3)
                    <div class="mb-3">
                        <label class="form-label">Tanggal Verifikasi</label>
                        <input type="text" class="form-control" disabled
                            value="{{ $detail_pembayaran->tanggalVerifikasi() }}">
                    </div>
                @endif
                @if ($detail_pembayaran->status == 1)
                    <div class="mb-3 d-flex justify-content-end gap-2">
                        <form action="/admin/pembayaran-rumah/{{ $detail_pembayaran->id }}/tolak" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger">Tolak</button>
                        </form>
                        <form action="/admin/pembayaran-rumah/{{ $detail_pembayaran->id }}/terima" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success">Terima</button>
                        </form>
                    </div>
                @endif
            </div>
        </main>
    </div>
@endsection
