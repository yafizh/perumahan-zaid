@extends('dashboard.admin.layouts.main')

@section('content')
    <div class="container pt-5">
        <x-header-dashboard>
            <x-slot:title-page>
                Data Promo
            </x-slot:title-page>
            <x-slot:buttons>
                <a href="/admin/promo/create" class="btn btn-primary w-100 mb-3">Tambah</a>
            </x-slot:buttons>
        </x-header-dashboard>
        <hr>
        <main class="mb-3">
            <div class="table-responsive">
                <table class="display dataTables table w-100">
                    <thead>
                        <tr>
                            <th class="text-center fit">No</th>
                            <th class="text-center">Nama Promo</th>
                            <th class="text-center">Tanggal Mulai</th>
                            <th class="text-center">Tanggal Selesai</th>
                            <th class="text-center">Pengurangan Harga</th>
                            <th class="text-center fit">Aksi</th>
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
                                <td class="d-flex gap-2">
                                    <a href="/admin/promo/{{ $item->id }}/rumah"
                                        class="btn btn-primary btn-sm">Rumah</a>
                                    <a href="/admin/promo/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="/admin/promo/{{ $item->id }}" method="POST">
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
