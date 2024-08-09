@extends('dashboard.admin.layouts.main')

@section('content')
    <div class="container pt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Kepemilikan Rumah</h4>
            <div>
                <a href="/admin/pelanggan" class="btn btn-secondary">Kembali</a>
                <a href="/admin/pendaftaran-pemesanan/create?id_pelanggan={{ $pelanggan->id }}"
                    class="btn btn-warning">Pemesanan</a>
                <a href="/admin/pembayaran-uang-muka/create?id_pelanggan={{ $pelanggan->id }}"
                    class="btn btn-primary">Pembelian</a>
            </div>
        </div>
        <hr>
        <style>
            .detail-table table {
                table-layout: fixed;
            }

            .detail-table th {
                width: 16rem;
            }

            .detail-table td.colon {
                width: 2px;
            }

            .detail-table td:not(td.colon) {
                word-wrap: break-word;
            }
        </style>
        <main class="mb-3 row justify-content-center">
            @if (!$pengajuan_kredit->count() && !$rumah_pelanggan->count())
                <h4 class="text-center mt-5">Belum Mempunyai Kepemilikan Rumah</h4>
            @endif
            @if ($pengajuan_kredit->count())
                @foreach ($pengajuan_kredit as $item)
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-md-4 mb-3">
                                <img src="{{ asset('storage/' . $item->rumah->foto) }}"
                                    style="width: 100%; object-fit: contain;">
                            </div>
                            <div class="col-12 col-md-8 mb-3">
                                <h5 class="text-decoration-underline">Data Rumah</h5>
                                <table class="detail-table table w-100">
                                    <tr>
                                        <th class="align-middle">Blok Rumah</th>
                                        <td class="colon align-middle">:</td>
                                        <td class="align-middle">{{ $item->rumah->blokPerumahan->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Nomor Rumah</th>
                                        <td class="colon align-middle">:</td>
                                        <td class="align-middle">{{ $item->rumah->nomor_rumah }}</td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Alamat</th>
                                        <td class="colon align-middle">:</td>
                                        <td class="align-middle">
                                            <a target="_blank"
                                                href="https://maps.google.com/?q={{ $item->rumah->latitude }},{{ $item->rumah->longitude }}">
                                                {{ $item->rumah->alamat }}
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Status Pembangunan</th>
                                        <td class="colon align-middle">:</td>
                                        <td class="align-middle">
                                            @if ($item->rumah->status_pembangunan == 1)
                                                <span class="badge text-bg-danger">Belum Dibangun</span>
                                            @elseif ($item->rumah->status_pembangunan == 2)
                                                <span class="badge text-bg-info">Dalam Tahap Pembangunan</span>
                                            @elseif ($item->rumah->status_pembangunan == 3)
                                                <span class="badge text-bg-success">Selesai Dibangun</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Status Pengajuan Kredit</th>
                                        <td class="colon align-middle">:</td>
                                        <td class="align-middle">
                                            @if ($item->status == 1)
                                                <span class="badge text-bg-info">Menunggu Verifikasi</span>
                                            @elseif ($item->status == 3)
                                                <span class="badge text-bg-success">Telah Disetujui</span>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                                @if ($item->status == 3)
                                    <div class="d-flex justify-content-end">
                                        <a href="/admin/pembayaran-uang-muka/create?id_pelanggan={{ $pelanggan->id }}&id_rumah={{ $item->rumah->id }}&kredit=true"
                                            class="btn btn-primary">
                                            Lakukan Pembayaran Uang Muka
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
            @endif
            @if ($rumah_pelanggan->count())
                @foreach ($rumah_pelanggan as $item)
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-md-4 mb-3">
                                <img src="{{ asset('storage/' . $item->rumah->foto) }}"
                                    style="width: 100%; object-fit: contain;">
                            </div>
                            <div class="col-12 col-md-8 mb-3">
                                <h5 class="text-decoration-underline">Data Rumah</h5>
                                <table class="detail-table table w-100">
                                    <tr>
                                        <th class="align-middle">Blok Rumah</th>
                                        <td class="colon align-middle">:</td>
                                        <td class="align-middle">{{ $item->rumah->blokPerumahan->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Nomor Rumah</th>
                                        <td class="colon align-middle">:</td>
                                        <td class="align-middle">{{ $item->rumah->nomor_rumah }}</td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Alamat</th>
                                        <td class="colon align-middle">:</td>
                                        <td class="align-middle">
                                            <a target="_blank"
                                                href="https://maps.google.com/?q={{ $item->rumah->latitude }},{{ $item->rumah->longitude }}">
                                                {{ $item->rumah->alamat }}
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Status Pembangunan</th>
                                        <td class="colon align-middle">:</td>
                                        <td class="align-middle">
                                            @if ($item->rumah->status_pembangunan == 1)
                                                <span class="badge text-bg-danger">Belum Dibangun</span>
                                            @elseif ($item->rumah->status_pembangunan == 2)
                                                <span class="badge text-bg-info">Dalam Tahap Pembangunan</span>
                                            @elseif ($item->rumah->status_pembangunan == 3)
                                                <span class="badge text-bg-success">Selesai Dibangun</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Status Kepemilikan</th>
                                        <td class="colon align-middle">:</td>
                                        <td class="align-middle">
                                            @if ($item->rumah->status_ketersediaan == 2)
                                                <span class="badge text-bg-warning">Dipesan</span>
                                            @elseif ($item->rumah->status_ketersediaan == 3)
                                                <span class="badge text-bg-success">Dibeli</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Harga</th>
                                        <td class="colon align-middle">:</td>
                                        <td class="align-middle">{{ number_format($item->harga_penjualan, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                    @if ($item->pengajuanKredit)
                                        @if ($item->pengajuanKredit->status == 1)
                                            <tr>
                                                <th class="align-middle">Status Pengajuan Kredit</th>
                                                <td class="colon align-middle">:</td>
                                                <td class="align-middle">
                                                    @if ($item->pengajuanKredit->status == 1)
                                                        <span class="badge text-bg-info">Menunggu Verifikasi</span>
                                                    @elseif ($item->pengajuanKredit->status == 3)
                                                        <span class="badge text-bg-success">Telah Disetujui</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endif
                                    @if ($item->pembayaranUangMuka)
                                        <tr>
                                            <th>Status Pembayaran</th>
                                            <td class="colon align-middle">:</td>
                                            <td class="align-middle">
                                                @if ($item->jenis_pembayaran == 1 || $item->jenis_pembayaran == 3)
                                                    <span class="badge text-bg-success">Lunas</span>
                                                @elseif ($item->jenis_pembayaran == 2)
                                                    <span class="badge text-bg-danger">Belum Lunas</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                </table>
                                @if ($item->rumah->status_ketersediaan == 2)
                                    <div class="d-flex justify-content-end gap-2">
                                        @if (!$item->pengajuanKredit)
                                            <a href="/admin/pengajuan-kredit/create?id_pelanggan={{ $pelanggan->id }}&id_rumah={{ $item->rumah->id }}"
                                                class="btn btn-info">
                                                Lakukan Pengajuan Kredit
                                            </a>
                                        @endif
                                        @if ($item->pengajuanKredit)
                                            @if ($item->pengajuanKredit->status == 1)
                                                <a href="/admin/pembayaran-uang-muka/create?id_pelanggan={{ $pelanggan->id }}&id_rumah={{ $item->rumah->id }}"
                                                    class="btn btn-primary">
                                                    Lakukan Pembayaran Uang Muka
                                                </a>
                                            @elseif ($item->pengajuanKredit->status == 2)
                                                <a href="/admin/pengajuan-kredit/create?id_pelanggan={{ $pelanggan->id }}&id_rumah={{ $item->rumah->id }}"
                                                    class="btn btn-info">
                                                    Lakukan Pengajuan Kredit
                                                </a>
                                                <a href="/admin/pembayaran-uang-muka/create?id_pelanggan={{ $pelanggan->id }}&id_rumah={{ $item->rumah->id }}"
                                                    class="btn btn-primary">
                                                    Lakukan Pembayaran Uang Muka
                                                </a>
                                            @elseif ($item->pengajuanKredit->status == 3)
                                                <a href="/admin/pembayaran-uang-muka/create?id_pelanggan={{ $pelanggan->id }}&id_rumah={{ $item->rumah->id }}&kredit=true"
                                                    class="btn btn-primary">
                                                    Lakukan Pembayaran Uang Muka
                                                </a>
                                            @endif
                                        @else
                                            <a href="/admin/pembayaran-uang-muka/create?id_pelanggan={{ $pelanggan->id }}&id_rumah={{ $item->rumah->id }}"
                                                class="btn btn-primary">
                                                Lakukan Pembayaran Uang Muka
                                            </a>
                                        @endif
                                    </div>
                                @endif
                            </div>
                            @if ($item->pembayaranUangMuka)
                                <div class="col-12">
                                    <h5>Riwayat Pembayaran</h5>
                                    <div class="table-responsive">
                                        <table class="table w-100">
                                            <thead>
                                                <tr>
                                                    <th class="fit text-center align-middle">No</th>
                                                    <th class="text-center align-middle">Tanggal</th>
                                                    <th class="text-center align-middle">Nominal</th>
                                                    <th class="text-center align-middle">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($item->pembayaran as $pembayaran)
                                                    <tr>
                                                        <td class="fit text-center align-middle">
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td class="text-center align-middle">
                                                            {{ $pembayaran->tanggal() }}
                                                        </td>
                                                        <td class="text-center align-middle">
                                                            {{ number_format($pembayaran->nominal, 0, ',', '.') }}
                                                        </td>
                                                        <td class="text-center align-middle">
                                                            @if ($pembayaran->status == 1)
                                                                <span class="badge text-bg-info">Menunggu Tanggal
                                                                    Pembayaran</span>
                                                            @elseif ($pembayaran->status == 2)
                                                                <span class="badge text-bg-warning">Menunggu
                                                                    Verifikasi</span>
                                                            @elseif ($pembayaran->status == 3)
                                                                <span class="badge text-bg-success">Telah Dibayar</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <hr>
                @endforeach
            @endif
        </main>
    </div>
@endsection
