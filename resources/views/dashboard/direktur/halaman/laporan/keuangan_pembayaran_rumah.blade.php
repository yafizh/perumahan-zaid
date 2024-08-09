@extends('dashboard.direktur.layouts.main')

@section('content')
    <div class="container pt-5">
        <x-header-dashboard>
            <x-slot:title-page>
                Laporan Keuangan Penjualan Rumah
            </x-slot:title-page>
        </x-header-dashboard>
        <hr>
        <main class="mb-3 row">
            <div class="col-12 col-md-3">
                <h5>Filter</h5>
                <form action="">
                    <div class="mb-3">
                        <label for="dari_tanggal" class="form-label">Dari Tanggal</label>
                        <input type="date" name="dari_tanggal" id="dari_tanggal" class="form-control"
                            value="{{ request()->get('dari_tanggal') }}">
                    </div>
                    <div class="mb-3">
                        <label for="sampai_tanggal" class="form-label">Sampai Tanggal</label>
                        <input type="date" name="sampai_tanggal" id="sampai_tanggal" class="form-control"
                            value="{{ request()->get('sampai_tanggal') }}">
                    </div>
                    <hr>
                    <div class="mb-3 d-flex justify-content-between">
                        <a href="/direktur/laporan/keuangan-pembayaran-rumah" class="btn btn-secondary">Reset Filter</a>
                        <div>
                            <button type="submit" class="btn btn-info">Filter</button>
                            <a href="{{ $href }}" class="btn btn-primary" target="_blank">Cetak</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-9">
                <div class="table-responsive">
                    <table class="display dataTables-laporan table w-100">
                        <thead>
                            <tr>
                                <th class="text-center align-middle fit">No</th>
                                <th class="text-center align-middle">Tanggal</th>
                                <th class="text-center align-middle">Nama Blok Perumahan</th>
                                <th class="text-center align-middle">Nomor Rumah</th>
                                <th class="text-center align-middle">Jenis Pembayaran</th>
                                <th class="text-center align-middle">Nominal Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
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
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
@endsection
