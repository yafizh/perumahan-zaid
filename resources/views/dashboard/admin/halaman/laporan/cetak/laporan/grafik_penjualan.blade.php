@extends('dashboard.admin.halaman.laporan.cetak.layouts.main')

@section('content')
    <style>
        @media print {
            @page {
                size: potrait
            }
        }
    </style>
    <section class="my-3">
        <h4 class="text-center">Laporan Grafik Penjualan</h4>
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
    <main class="d-flex mb-3">
        <div style="width: 40%; margin-left: 8rem;">
            {!! $chart->container() !!}
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {!! $chart->script() !!}
    <p class="px-3">
        Grafik penjualan menggambarkan jumlah penjualan selama bulan 
        <br>
        <strong>{{ implode(', ', $labels) }}</strong>.
        <br>
        Pada bulan {{ $labels[0] }}, tercatat terjadi {{ $dataset[0] }} transaksi penjualan.
        <br>
        Pada bulan {{ $labels[1] }}, tercatat terjadi {{ $dataset[1] }} transaksi penjualan.
        <br>
        Pada bulan {{ $labels[2] }}, tercatat terjadi {{ $dataset[2] }} transaksi penjualan.
    </p>
@endsection
