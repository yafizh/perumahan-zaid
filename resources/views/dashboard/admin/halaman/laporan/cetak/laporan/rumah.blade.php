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
        <h4 class="text-center">Laporan Rumah</h4>
        <strong>
            <span style="width: 150px; display: inline-block;">Filter</span>
        </strong>
        <br>
        <span style="width: 150px; display: inline-block;">Blok Perumahan</span>
        <span>: {{ $filter['blok_perumahan'] }}</span>
        <br>
        <span style="width: 150px; display: inline-block;">Status Ketersediaan</span>
        <span>: {{ $filter['status_ketersediaan'] }}</span>
        <br>
        <span style="width: 150px; display: inline-block;">Status Pembangunan</span>
        <span>: {{ $filter['status_pembangunan'] }}</span>
    </section>
    <main>
        <table class="table table-striped table-bordered">
            <thead class="text-center">
                <th class="text-center align-middle">No</th>
                <th class="text-center align-middle">Nama Blok Perumahan</th>
                <th class="text-center align-middle">Nomor Rumah</th>
                <th class="text-center align-middle">Status Ketersediaan</th>
                <th class="text-center align-middle">Status Pembangunan</th>
            </thead>
            <tbody>
                @if ($rumah->count())
                    @foreach ($rumah as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->blokPerumahan->nama }}</td>
                            <td class="text-center">Rumah Nomor {{ $item->nomor_rumah }}</td>
                            <td class="text-center">{{ $item->status_ketersediaan }}</td>
                            <td class="text-center">{{ $item->status_pembangunan }}</td>
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
