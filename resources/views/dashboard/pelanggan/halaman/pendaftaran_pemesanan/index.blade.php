@extends('dashboard.pelanggan.layouts.main')

@section('content')
    <div class="container pt-5">
        <x-header-dashboard>
            <x-slot:title-page>
                Pendaftaran Pemesanan
            </x-slot:title-page>
            <x-slot:buttons>
                <a href="/pelanggan/pemesanan-rumah/create" class="btn btn-primary w-100 mb-3">Lakukan Pemesanan</a>
            </x-slot:buttons>
        </x-header-dashboard>
        <hr>
        <main class="mb-3">
            <div class="table-responsive">
                <table class="display dataTables table w-100">
                    <thead>
                        <tr>
                            <th class="text-center align-middle fit">No</th>
                            <th class="text-center align-middle">Tanggal Pengajuan</th>
                            <th class="text-center align-middle">Tanggal Pembelian</th>
                            <th class="text-center align-middle">Nama Blok Perumahan</th>
                            <th class="text-center align-middle">Nomor Rumah</th>
                            <th class="text-center align-middle">Status</th>
                            <th class="text-center align-middle fit">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendaftaranPemesanan as $item)
                            <tr>
                                <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                <td class="text-center align-middle">{{ $item->tanggalPemesanan() }}
                                <td class="text-center align-middle">{{ $item->tanggalPembelian() }}
                                <td class="text-center align-middle">
                                    {{ $item->rumah->blokPerumahan->nama }}
                                </td>
                                <td class="text-center align-middle">
                                    Rumah Nomor {{ $item->rumah->nomor_rumah }}
                                </td>
                                <td class="text-center align-middle">
                                    @if ($item->status == 1)
                                        <span class="badge text-bg-info">Mengguna Verifikasi</span>
                                    @elseif ($item->status == 2)
                                        <span class="badge text-bg-danger">Ditolak</span>
                                    @elseif ($item->status == 3)
                                        <span class="badge text-bg-success">Diterima</span>
                                    @elseif ($item->status == 4)
                                        <span class="badge text-bg-danger">Dibatalkan</span>
                                    @endif
                                </td>
                                <td class="td-fit">
                                    <div class="d-flex gap-2">
                                        <a href="{{ asset('storage/' . $item->foto) }}" target="_blank"
                                            class="btn btn-info btn-sm text-nowrap">
                                            Bukti Pembayaran
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
@endsection
