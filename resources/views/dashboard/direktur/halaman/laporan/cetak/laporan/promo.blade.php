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
        <h4 class="text-center">Laporan Promo</h4>
        <strong>
            <span style="width: 150px; display: inline-block;">Filter</span>
        </strong>
        <br>
        <span style="width: 150px; display: inline-block;">Tanggal</span>
        @if (empty($filter['dari_tanggal']) && empty($filter['dari_tanggal']))
            <span>: Seluruh Promo</span>
        @else
            <span>: {{ $filter['dari_tanggal'] }} - {{ $filter['sampai_tanggal'] }}</span>
        @endif
    </section>
    <main>
        <table class="table table-striped table-bordered">
            <thead class="text-center">
                <th class="text-center align-middle">No</th>
                <th class="text-center align-middle">Nama Promo</th>
                <th class="text-center align-middle">Tanggal Mulai</th>
                <th class="text-center align-middle">Tanggal Selesai</th>
                <th class="text-center align-middle">Pengurangan Harga</th>
            </thead>
            <tbody>
                @if ($promo->count())
                    @foreach ($promo as $item)
                        <tr>
                            <td class="text-center align-middle">{{ $loop->iteration }}</td>
                            <td class="text-center align-middle">{{ $item->nama }}</td>
                            <td class="text-center align-middle">{{ $item->tanggal_mulai }}</td>
                            <td class="text-center align-middle">{{ $item->tanggal_selesai }}</td>
                            <td class="text-center align-middle">
                                {{ number_format($item->pengurangan_harga, 0, ',', '.') }}
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
