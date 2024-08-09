@extends('dashboard.staf.layouts.main')

@section('content')
    <div class="container pt-5">
        <x-header-dashboard>
            <x-slot:title-page>
                Data Pelanggan
            </x-slot:title-page>
            <x-slot:buttons>
                <a href="/staf/pelanggan/create" class="btn btn-primary w-100 mb-3">Tambah</a>
            </x-slot:buttons>
        </x-header-dashboard>
        <hr>
        <main class="mb-3">
            <div class="table-responsive">
                <table class="display dataTables table w-100">
                    <thead>
                        <tr>
                            <th class="text-center fit">No</th>
                            <th class="text-center">NIK</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Nomor Telepon</th>
                            <th class="text-center fit">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelanggan as $item)
                            <tr>
                                <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                <td class="text-center align-middle">{{ $item->nik }}</td>
                                <td class="align-middle">{{ $item->nama }}</td>
                                <td class="align-middle">{{ $item->email }}</td>
                                <td class="text-center align-middle">{{ $item->nomor_telepon }}</td>
                                <td class="align-middle">
                                    <div class="d-flex gap-2">
                                        <a href="/staf/pelanggan/{{ $item->id }}/rumah" class="btn btn-primary btn-sm">
                                            Rumah
                                        </a>
                                        <a href="/staf/pelanggan/{{ $item->id }}" class="btn btn-info btn-sm">
                                            Detail
                                        </a>
                                        <a href="/staf/pelanggan/{{ $item->id }}/edit"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="/staf/pelanggan/{{ $item->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure?')">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
@endsection
