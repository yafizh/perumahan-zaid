@extends('dashboard.pelanggan.layouts.main')

@section('content')
    <div class="container pt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Data Laporan Keluhan</h4>
            <a href="/pelanggan/keluhan-pelanggan/create" class="btn btn-primary">Tambah</a>
        </div>
        <hr>
        <main class="mb-3">
            <div class="table-responsive">
                <table class="display dataTables table w-100">
                    <thead>
                        <tr>
                            <th class="text-center fit">No</th>
                            <th class="text-center fit">Tanggal</th>
                            <th class="text-center">Judul</th>
                            <th class="text-center">Keluhan</th>
                            <th class="text-center fit">Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($keluhan_pelanggan as $item)
                            <tr>
                                <td class="text-center align-middle fit">{{ $loop->iteration }}</td>
                                <td class="text-center align-middle fit">{{ $item->tanggal_terformat }}
                                <td class="text-center align-middle">{{ $item->judul }} </td>
                                <td class="align-middle">{{ $item->keterangan }}</td>
                                <td class="text-center align-middle fit">
                                    <a href="{{ asset('storage/' . $item->foto) }}" target="_blank">Lihat Gambar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
@endsection
