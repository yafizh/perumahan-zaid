@extends('dashboard.admin.layouts.main')

@section('content')
    <div class="container pt-5">
        <x-header-dashboard>
            <x-slot:title-page>
                Data Blok Perumahan
            </x-slot:title-page>
            <x-slot:buttons>
                {{-- <button class="btn btn-info w-100 mb-3">Cetak</button> --}}
                <a href="/admin/blok-perumahan/create" class="btn btn-primary w-100 mb-3">Tambah</a>
            </x-slot:buttons>
        </x-header-dashboard>
        <hr>
        <main class="mb-3">
            <div class="table-responsive">
                <table class="display dataTables table w-100">
                    <thead>
                        <tr>
                            <th class="text-center fit">No</th>
                            <th class="text-center">Nama Blok Perumahan</th>
                            <th class="text-center">Nomor Perumahan</th>
                            <th class="text-center">Urutan</th>
                            <th class="text-center fit">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blok_perumahan as $item)
                            <tr>
                                <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                <td class="text-center align-middle">{{ $item->nama }}</td>
                                <td class="text-center align-middle">{{ $item->nomor_awal_rumah }} -
                                    {{ $item->nomor_akhir_rumah }}</td>
                                <td class="text-center align-middle">{{ $item->urutan }}</td>
                                <td class="d-flex gap-2">
                                    <a href="/admin/blok-perumahan/{{ $item->id }}/edit"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="/admin/blok-perumahan/{{ $item->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
@endsection
