@extends('dashboard.admin.layouts.main')

@section('content')
    <div class="container pt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Detail Rumah</h4>
            <a href="/admin/rumah?blok={{ $rumah->blokPerumahan->urutan }}" class="btn btn-secondary">Kembali</a>
        </div>
        <hr>
        <main class="mb-3 row justify-content-center">
            <div class="col-12">
                <h4>Detail Rumah</h4>
            </div>
            <div class="col-12 col-md-6 mb-3">
                <img src="{{ asset('storage/' . $rumah->foto) }}" style="width: 100%; object-fit: contain;">
            </div>
            <style>
                .detail-table table {
                    table-layout: fixed;
                }

                .detail-table th {
                    width: 8rem;
                }

                .detail-table td.colon {
                    width: 2px;
                }

                .detail-table td:not(td.colon) {
                    word-wrap: break-word;
                }
            </style>
            <div class="col-12 col-md-6 mb-3">
                <table class="detail-table table w-100">
                    <tr>
                        <th class="align-middle">Blok Rumah</th>
                        <td class="colon align-middle">:</td>
                        <td class="align-middle">{{ $rumah->blokPerumahan->nama }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle">Nomor Rumah</th>
                        <td class="colon align-middle">:</td>
                        <td class="align-middle">{{ $rumah->nomor_rumah }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle">Harga</th>
                        <td class="colon align-middle">:</td>
                        <td class="align-middle">{{ number_format($rumah->harga, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle">Lokasi</th>
                        <td class="colon align-middle">:</td>
                        <td class="align-middle">
                            <a target="_blank"
                                href="https://maps.google.com/?q={{ $rumah->latitude }},{{ $rumah->longitude }}">
                                {{ $rumah->latitude }}, {{ $rumah->longitude }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th class="align-middle">Alamat</th>
                        <td class="colon align-middle">:</td>
                        <td class="align-middle">{{ $rumah->alamat }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle">Status Ketersediaan</th>
                        <td class="colon align-middle">:</td>
                        <td class="align-middle">
                            @if ($rumah->status_ketersediaan == 1)
                                <span class="badge text-bg-success">Tersedia</span>
                            @elseif ($rumah->status_ketersediaan == 2)
                                <span class="badge text-bg-warning">Dipesan</span>
                                |
                                <a href="/admin/pelanggan/{{ $rumah->rumahPelanggan->pelanggan->id }}">Pelanggan</a>
                            @elseif ($rumah->status_ketersediaan == 3)
                                <span class="badge text-bg-danger">Terjual</span>
                                |
                                <a href="/admin/pelanggan/{{ $rumah->rumahPelanggan->pelanggan->id }}">Pelanggan</a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Status Pembangunan</th>
                        <td class="colon align-middle">:</td>
                        <td class="align-middle">
                            @if ($rumah->status_pembangunan == 1)
                                <span class="badge text-bg-danger">Belum Dibangun</span>
                            @elseif ($rumah->status_pembangunan == 2)
                                <span class="badge text-bg-info">Dalam Tahap Pembangunan</span>
                            @elseif ($rumah->status_pembangunan == 3)
                                <span class="badge text-bg-success">Selesai Dibangun</span>
                            @endif
                        </td>
                    </tr>
                </table>
                <div class="d-flex justify-content-end gap-2">
                    <a href="/admin/rumah/{{ $rumah->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <form action="/admin/rumah/{{ $rumah->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure?')">Hapus</button>
                    </form>
                </div>
            </div>
            @if ($rumah->status_pembangunan < 3 || $riwayat_pembangunan_rumah->count())
                <hr>
                <div class="col-12 d-flex justify-content-between mb-3">
                    <h4>Riwayat Pembangunan Rumah</h4>
                    @if ($rumah->status_pembangunan < 3)
                        <a class="btn btn-primary"
                            href="/admin/riwayat-pembangunan-rumah/create?id_rumah={{ $rumah->id }}">Tambah Riwayat
                            Pembangunan</a>
                    @endif
                </div>
                <div class="col-12 mb-5">
                    <div class="table-responsive">
                        <table class="table w-100">
                            <thead>
                                <tr>
                                    <th class="fit text-center align-middle">No</th>
                                    <th class="fit text-center align-middle">Tanggal</th>
                                    <th class="text-center align-middle">Keterangan</th>
                                    <th class="fit text-center align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($riwayat_pembangunan_rumah->count())
                                    @foreach ($riwayat_pembangunan_rumah as $item)
                                        <tr>
                                            <td class="fit text-center align-middle">{{ $loop->iteration }}</td>
                                            <td class="fit text-center align-middle">{{ $item->tanggal_terformat }}</td>
                                            <td class="align-middle">{{ $item->keterangan }}</td>
                                            <td class="fit text-center align-middle">
                                                <div class="d-flex gap-2 align-items-center">
                                                    <a href="{{ asset('storage/' . $item->foto) }}" target="_blank"
                                                        class="btn btn-info btn-sm">Foto</a>
                                                    <a href="/admin/riwayat-pembangunan-rumah/{{ $item->id }}/edit"
                                                        class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="/admin/riwayat-pembangunan-rumah/{{ $item->id }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure?')">Hapus</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center">Belum Ada Riwayat Pembangunan</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </main>
    </div>
@endsection
