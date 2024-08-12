@extends('dashboard.pelanggan.layouts.main')

@section('content')
    <div class="container pt-4">
        <h4>Kepemilikan Rumah</h4>
        <hr>
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
        <main class="mb-3 row justify-content-center">
            @if (count($rumah_pelanggan))
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
                                            @if ($item->rumah->status_pembangunan == 1 || $item->rumah->status_pembangunan == 2)
                                                |
                                                <a href="/pelanggan/{{ $item->rumah->id }}/riwayat-pembangunan-rumah">
                                                    Lihat Riwayat Pembangunan
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Harga</th>
                                        <td class="colon align-middle">:</td>
                                        <td class="align-middle">
                                            {{ number_format($item->harga_penjualan, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                    @if ($item->jenis_pembayaran == 1 || $item->jenis_pembayaran == 2)
                                        <tr>
                                            <th>Status Pembayaran</th>
                                            <td class="colon align-middle">:</td>
                                            <td class="align-middle">
                                                @if ($item->status_pembayaran == 1)
                                                    <span class="badge text-bg-danger">Belum Lunas</span>
                                                @elseif ($item->status_pembayaran == 2)
                                                    <span class="badge text-bg-success">Lunas</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @if ($item->jenis_pembayaran == 2)
                                            <tr>
                                                <th>Sisa Pembayaran</th>
                                                <td class="colon align-middle">:</td>
                                                <td class="align-middle">
                                                    {{ number_format($item->sisa_pembayaran, 0, ',', '.') }}
                                                    |
                                                    <a href="/pelanggan/{{ $item->id }}/riwayat-pembayaran-rumah">
                                                        Lihat Riwayat Pembayaran
                                                    </a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                @endforeach
            @else
                <h4 class="text-center p-5">Tidak Memiliki Rumah</h4>
            @endif
        </main>
    </div>
@endsection
