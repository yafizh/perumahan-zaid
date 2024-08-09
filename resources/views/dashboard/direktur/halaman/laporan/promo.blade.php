@extends('dashboard.direktur.layouts.main')

@section('content')
    <div class="container pt-5">
        <x-header-dashboard>
            <x-slot:title-page>
                Laporan Promo
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
                        <a href="/direktur/laporan/promo" class="btn btn-secondary">Reset Filter</a>
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
                                <th class="text-center align-middle">Nama Promo</th>
                                <th class="text-center align-middle">Tanggal Mulai</th>
                                <th class="text-center align-middle">Tanggal Selesai</th>
                                <th class="text-center align-middle">Pengurangan Harga</th>
                            </tr>
                        </thead>
                        <tbody>
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
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
@endsection
