@extends('dashboard.direktur.halaman.laporan.cetak.layouts.main')

@section('content')
    <style>
        @media print {
            @page {
                size: potrait
            }
        }
    </style>
    <section class="my-3">
        <h4 class="text-center">Laporan Grafik Pemesanan</h4>
        <strong>
            <span style="width: 150px; display: inline-block;">Filter</span>
        </strong>
        <br>
        <span style="width: 150px; display: inline-block;">Kuartal</span>
        <span>: {{ $filter['kuartal'] }}</span>
        <br>
        <span style="width: 150px; display: inline-block;">Tahun</span>
        <span>: {{ $filter['tahun'] }}</span>
    </section>
    <main class="d-flex py-5">
        <div style="width: 50%;">
            {!! $chart->container() !!}
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {!! $chart->script() !!}
@endsection
