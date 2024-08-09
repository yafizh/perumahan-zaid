@extends('dashboard.admin.halaman.laporan.cetak.layouts.main')

@section('content')
    <style>
        @media print {
            @page {
                size: landscape
            }
        }
    </style>
    <section class="my-3">
        <h4 class="text-center">Laporan Keuangan Penjualan Rumah</h4>
        <strong>
            <span style="width: 150px; display: inline-block;">Filter</span>
        </strong>
        <br>
        <span style="width: 150px; display: inline-block;">Tanggal Pembayaran</span>
        @if (empty($filter['dari_tanggal']) && empty($filter['dari_tanggal']))
            <span>: Seluruh Pembayaran</span>
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
                <th class="text-center align-middle">Jenis Pembayaran</th>
                <th class="text-center align-middle">Nominal Pembayaran</th>
            </thead>
            <tbody>
                @if (count($keuanganPembayaranRumah))
                    @foreach ($keuanganPembayaranRumah as $item)
                        <tr>
                            <td class="text-center align-middle">{{ $loop->iteration }}</td>
                            <td class="text-center align-middle">{{ $item['tanggal'] }}</td>
                            <td class="text-center align-middle">{{ $item['nama_blok'] }}</td>
                            <td class="text-center align-middle">
                                Rumah Nomor {{ $item['nomor_rumah'] }}
                            </td>
                            <td class="text-center align-middle">{{ $item['jenis_pembayaran'] }}</td>
                            <td class="text-center align-middle">
                                {{ number_format($item['nominal'], 0, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="text-center">Data Kosong</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </main>
@endsection
