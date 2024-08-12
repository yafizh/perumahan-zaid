@extends('dashboard.pelanggan.layouts.main')

@section('content')
    <div class="container pt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Riwayat Pembayaran Rumah</h4>
            <a href="/pelanggan/rumah" class="btn btn-secondary">
                Kembali
            </a>
        </div>
        <hr>
        <main class="mb-3">
            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <h4>Rumah</h4>
                    <table class="table w-100">
                        <tr>
                            <th class="align-middle text-nowrap">Blok Rumah</th>
                            <td class="colon align-middle">:</td>
                            <td class="align-middle">{{ $rumah->blokPerumahan->nama }}</td>
                        </tr>
                        <tr>
                            <th class="align-middle text-nowrap">Nomor Rumah</th>
                            <td class="colon align-middle">:</td>
                            <td class="align-middle">{{ $rumah->nomor_rumah }}</td>
                        </tr>
                        <tr>
                            <th class="align-middle text-nowrap">Alamat</th>
                            <td class="colon align-middle">:</td>
                            <td class="align-middle">
                                <a target="_blank"
                                    href="https://maps.google.com/?q={{ $rumah->latitude }},{{ $rumah->longitude }}">
                                    {{ $rumah->alamat }}
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <h4>Pembayaran</h4>
                    <div class="table-responsive">
                        <table class="display table w-100">
                            <thead>
                                <tr>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Nominal</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center align-middle">
                                        {{ $rumah_pelanggan->pembayaranUangMuka->tanggal() }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ number_format($rumah_pelanggan->pembayaranUangMuka->nominal, 0, ',', '.') }}
                                    </td>
                                    <td class="text-center align-middle">
                                        <span class="badge text-bg-success">Telah Dibayar</span>
                                    </td>
                                </tr>
                                @foreach ($rumah_pelanggan->pembayaran as $item)
                                    <tr>
                                        <td class="text-center align-middle">{{ $item->tanggal() }}
                                        <td class="text-center align-middle">
                                            {{ number_format($item->nominal, 0, ',', '.') }}
                                        </td>
                                        <td class="text-center align-middle">
                                            @if ($item->status == 1)
                                                @if ($item->tanggal < $hari_ini)
                                                    <a href="/pelanggan/{{ $rumah_pelanggan->id }}/riwayat-pembayaran-rumah/create?id_pembayaran={{ $item->id }}"
                                                        class="btn btn-primary btn-sm">
                                                        Lakukan Pembayaran
                                                    </a>
                                                @else
                                                    <span class="badge text-bg-info">Menunggu Tanggal Pembayaran</span>
                                                @endif
                                            @elseif ($item->status == 2)
                                                <span class="badge text-bg-warning">Menunggu Verifikasi</span>
                                            @elseif ($item->status == 3)
                                                <span class="badge text-bg-success">Telah Dibayar</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <hr>
                </div>
                <div class="col-12 mb-3">
                    <h4>Riwayat Pembayaran</h4>
                    <div class="table-responsive">
                        <table class="display dataTables table w-100">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Tanggal Pembayaran</th>
                                    <th class="text-center">Tanggal Verifikasi</th>
                                    <th class="text-center">Bukti Pembayaran</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detail_pembayaran as $item)
                                    <tr>
                                        <td class="text-center align-middle">{{ $loop->iteration }}
                                        <td class="text-center align-middle">
                                            {{ $item->tanggalPembayaran() }}
                                        </td>
                                        <td class="text-center align-middle">
                                            @if (!is_null($item->tanggal_verifikasi))
                                                {{ $item->tanggalVerifikasi() }}
                                            @endif
                                        </td>
                                        <td class="text-center align-middle">
                                            <a href="{{ asset('storage/' . $item->foto) }}" target="_blank">Lihat</a>
                                        </td>
                                        <td class="text-center align-middle">
                                            @if ($item->status == 1)
                                                <span class="badge text-bg-warning">Menunggu Verifikasi</span>
                                            @elseif ($item->status == 2)
                                                <span class="badge text-bg-danger">Ditolak</span>
                                            @elseif ($item->status == 3)
                                                <span class="badge text-bg-success">Berhasil</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
