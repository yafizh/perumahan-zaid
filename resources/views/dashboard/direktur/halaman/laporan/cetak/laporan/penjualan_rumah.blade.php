@extends('dashboard.direktur.halaman.laporan.cetak.layouts.main')

@section('content')
    <style>
        @media print {
            @page {
                size: landscape
            }
        }
    </style>
    <section class="my-3">
        <h4 class="text-center">Laporan Penjualan Rumah</h4>
        <strong>
            <span style="width: 150px; display: inline-block;">Filter</span>
        </strong>
        <br>
        <span style="width: 150px; display: inline-block;">Blok Perumahan</span>
        <span>: {{ $filter['blok_perumahan'] }}</span>
        <br>
        <span style="width: 150px; display: inline-block;">Tanggal Penjualan</span>
        @if (empty($filter['dari_tanggal']) && empty($filter['dari_tanggal']))
            <span>: Seluruh Penjualan</span>
        @else
            <span>: {{ $filter['dari_tanggal'] }} - {{ $filter['sampai_tanggal'] }}</span>
        @endif
    </section>
    <main>
        <table class="table table-striped table-bordered">
            <thead class="text-center">
                <th class="text-center align-middle">No</th>
                <th class="text-center align-middle">Tanggal</th>
                <th class="text-center align-middle">Nama Blok Perumahan</th>
                <th class="text-center align-middle">Nomor Rumah</th>
                <th class="text-center align-middle">Pembeli Rumah / Pelanggan</th>
            </thead>
            <tbody>
                @if ($penjualan_rumah->count())
                    @foreach ($penjualan_rumah as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->tanggal }}</td>
                            <td class="text-center align-middle">
                                {{ $item->rumahPelanggan->rumah->blokPerumahan->nama }}
                            </td>
                            <td class="text-center align-middle">
                                Rumah Nomor {{ $item->rumahPelanggan->rumah->nomor_rumah }}
                            </td>
                            <td class="text-center align-middle">
                                {{ $item->rumahPelanggan->pelanggan->nik }}/{{ $item->rumahPelanggan->pelanggan->nama }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">Data Kosong</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </main>
@endsection
