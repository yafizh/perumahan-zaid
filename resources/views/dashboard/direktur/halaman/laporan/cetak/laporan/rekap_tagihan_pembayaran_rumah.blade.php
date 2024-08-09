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
        <h4 class="text-center">Laporan Rekap Tagihan Pembayaran Rumah</h4>
        <strong>
            <span style="width: 150px; display: inline-block;">Filter</span>
        </strong>
        <br>
        <span style="width: 150px; display: inline-block;">Blok Perumahan</span>
        <span>: {{ $filter['blok_perumahan'] }}</span>
        <br>
        <span style="width: 150px; display: inline-block;">Nomor Rumah</span>
        <span>: {{ $filter['nomor_rumah'] }}</span>
    </section>
    <main>
        <table class="table table-striped table-bordered">
            <thead class="text-center">
                <th class="text-center align-middle fit">No</th>
                <th class="text-center align-middle">Tanggal</th>
                <th class="text-center align-middle">Nominal</th>
                <th class="text-center align-middle">Status</th>
            </thead>
            <tbody>
                @if (count($pembayaran))
                    @foreach ($pembayaran as $item)
                        <tr>
                            <td class="text-center align-middle">{{ $loop->iteration }}</td>
                            <td class="text-center align-middle">{{ $item['tanggal'] }}</td>
                            <td class="text-center align-middle">
                                {{ number_format($item['nominal'], 0, ',', '.') }}
                            </td>
                            <td class="text-center align-middle">
                                @if ($item['status'] == 1)
                                    @if ($item['tanggal_date_string'] < $hari_ini)
                                        Belum Dibayar
                                    @else
                                        Menunggu Tanggal Pembayaran
                                    @endif
                                @elseif ($item['status'] == 2)
                                    Menunggu Verifikasi
                                @elseif ($item['status'] == 3)
                                    Telah Dibayar
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="text-center">Data Kosong</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </main>
@endsection
