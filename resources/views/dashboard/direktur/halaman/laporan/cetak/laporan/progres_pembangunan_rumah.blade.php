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
        <h4 class="text-center">Laporan Progres Pembangunan Rumah</h4>
        <strong>
            <span style="width: 150px; display: inline-block;">Filter</span>
        </strong>
        <br>
        <span style="width: 150px; display: inline-block;">Blok Perumahan</span>
        <span>: {{ $filter['blok_perumahan'] }}</span>
        <br>
        <span style="width: 150px; display: inline-block;">Tanggal</span>
        @if (empty($filter['dari_tanggal']) && empty($filter['dari_tanggal']))
            <span>: Seluruh Progres Pembangunan Rumah</span>
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
                <th class="text-center align-middle">Keterangan</th>
            </thead>
            <tbody>
                @if ($progres_pembangunan_rumah->count())
                    @foreach ($progres_pembangunan_rumah as $item)
                        <tr>
                            <td class="text-center align-middle">{{ $loop->iteration }}</td>
                            <td class="text-center align-middle">{{ $item->tanggal }}</td>
                            <td class="text-center align-middle">{{ $item->rumah->blokPerumahan->nama }}</td>
                            <td class="text-center align-middle">Rumah Nomor {{ $item->rumah->nomor_rumah }}</td>
                            <td class="align-middle">{{ $item->keterangan }}</td>
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
