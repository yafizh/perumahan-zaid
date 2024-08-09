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
        <h4 class="text-center">Laporan Keluhan Pelanggan</h4>
        <strong>
            <span style="width: 150px; display: inline-block;">Filter</span>
        </strong>
        <br>
        <span style="width: 150px; display: inline-block;">Tanggal</span>
        @if (empty($filter['dari_tanggal']) && empty($filter['dari_tanggal']))
            <span>: Seluruh Keluhan</span>
        @else
            <span>: {{ $filter['dari_tanggal'] }} - {{ $filter['sampai_tanggal'] }}</span>
        @endif
    </section>
    <main>
        <table class="table table-striped table-bordered">
            <thead class="text-center">
                <th class="text-center align-middle">No</th>
                <th class="text-center align-middle">Tanggal</th>
                <th class="text-center align-middle">Pelapor</th>
                <th class="text-center align-middle">Judul</th>
                <th class="text-center align-middle">Keluhan</th>
            </thead>
            <tbody>
                @if ($keluhan_pelanggan->count())
                    @foreach ($keluhan_pelanggan as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->tanggal }}</td>
                            <td class="text-center">{{ $item->pelanggan->nama }}</td>
                            <td class="text-center">{{ $item->judul }}</td>
                            <td>{{ $item->keterangan }}</td>
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
