@extends('dashboard.admin.layouts.main')

@section('content')
    <div class="container pt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Detail Pendaftaran Pemesanan Online</h4>
            <a href="/admin/pengajuan-pemesanan" class="btn btn-secondary">Kembali</a>
        </div>
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
                    <label class="form-label">Tanggal Pengajuan</label>
                    <input type="text" class="form-control" disabled
                        value="{{ $pengajuanPemesanan->tanggalPemesanan() }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Pembelian</label>
                    <input type="text" class="form-control" disabled
                        value="{{ $pengajuanPemesanan->tanggalPembelian() }}">
                </div>
                <div class="mb-3">
                    <label class="form-label d-block">Bukti Pembayaran</label>
                    <a href="{{ asset('storage/' . $pengajuanPemesanan->foto) }}" target="_blank">Lihat</a>
                </div>
                <div class="mb-3">
                    <label class="form-label d-block">Status</label>
                    @if ($pengajuanPemesanan->status == 1)
                        <span class="badge text-bg-warning">Menunggu Verifikasi</span>
                    @elseif ($pengajuanPemesanan->status == 2)
                        <span class="badge text-bg-danger">Ditolak</span>
                    @elseif ($pengajuanPemesanan->status == 3)
                        <span class="badge text-bg-success">Diterima</span>
                    @endif
                </div>
                @if ($pengajuanPemesanan->status == 2 || $pengajuanPemesanan->status == 3)
                    <div class="mb-3">
                        <label class="form-label">Tanggal Verifikasi</label>
                        <input type="text" class="form-control" disabled
                            value="{{ $pengajuanPemesanan->tanggalVerifikasi() }}">
                    </div>
                @endif
                @if ($pengajuanPemesanan->status == 1)
                    <div class="mb-3 d-flex justify-content-end gap-2">
                        <form action="/admin/pengajuan-pemesanan/{{ $pengajuanPemesanan->id }}/tolak" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger">Tolak</button>
                        </form>
                        <form action="/admin/pengajuan-pemesanan/{{ $pengajuanPemesanan->id }}/terima" method="POST">
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
