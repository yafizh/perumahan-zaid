@extends('dashboard.admin.layouts.main')

@section('content')
    <div class="container pt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Data Direktur</h4>
            <a href="/admin/direktur/create" class="btn btn-primary">Tambah</a>
        </div>
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
                            <th class="text-center">Jenis Kelamin</th>
                            <th class="text-center fit">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($direktur as $item)
                            <tr>
                                <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                <td class="text-center align-middle">{{ $item->nik }}</td>
                                <td class="align-middle">{{ $item->nama }}</td>
                                <td class="align-middle">{{ $item->email }}</td>
                                <td class="text-center align-middle">{{ $item->nomor_telepon }}</td>
                                <td class="text-center align-middle">{{ $item->jenis_kelamin }}</td>
                                <td class="align-middle">
                                    <div class="d-flex gap-2">
                                        <a href="/admin/direktur/{{ $item->id }}" class="btn btn-info btn-sm">Detail</a>
                                        <a href="/admin/direktur/{{ $item->id }}/edit"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="/admin/direktur/{{ $item->id }}" method="POST">
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
