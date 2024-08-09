@extends('dashboard.admin.layouts.main')

@section('content')
    <div class="container pt-4">
        <h4>Laporan Keluhan Pelanggan</h4>
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
                    <div class="mb-3 d-flex justify-content-between align-items-strech gap-1">
                        <a href="/admin/laporan/keluhan-pelanggan" class="btn btn-secondary d-flex align-items-center">Reset Filter</a>
                        <div class="d-flex flex-column gap-1 w-100">
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
                                <th class="text-center align-middle">Pelapor</th>
                                <th class="text-center align-middle">Judul</th>
                                <th class="text-center align-middle">Keluhan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($keluhan_pelanggan as $item)
                                <tr>
                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                    <td class="text-center align-middle">{{ $item->tanggal }}</td>
                                    <td class="align-middle">{{ $item->pelanggan->nama }}</td>
                                    <td class="text-center align-middle">{{ $item->judul }}</td>
                                    <td class="align-middle">{{ $item->keterangan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
@endsection
