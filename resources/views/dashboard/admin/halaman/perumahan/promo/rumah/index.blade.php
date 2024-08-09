@extends('dashboard.admin.layouts.main')

@section('content')
    <div class="container pt-5">
        <x-header-dashboard>
            <x-slot:title-page>
                Data Promo Rumah
            </x-slot:title-page>
            <x-slot:buttons>
                <a href="/admin/promo" class="btn btn-secondary w-100 mb-3">Kembali</a>
                <a href="/admin/promo/{{ $promo->id }}/rumah/create" class="btn btn-primary w-100 mb-3">Tambah</a>
            </x-slot:buttons>
        </x-header-dashboard>
        <hr>
        <main class="mb-3 row">
            <div class="col-12 col-md-4">
                <div class="mb-3">
                    <label class="form-label">Nama Promo</label>
                    <input type="text" class="form-control" disabled value="{{ $promo->nama }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Mulai</label>
                    <input type="text" class="form-control" disabled value="{{ $promo->tanggal_mulai }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Selesai</label>
                    <input type="text" class="form-control" disabled value="{{ $promo->tanggal_selesai }}">
                </div>
                <div class="mb-3">
                    <label for="pengurangan_harga" class="form-label">Pengurangan Harga</label>
                    <input type="text" class="form-control" disabled
                        value="{{ number_format($promo->pengurangan_harga, 0, ',', '.') }}">
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="table-responsive">
                    <table class="display dataTables-rumah table w-100">
                        <thead>
                            <tr>
                                <th class="text-center fit">No</th>
                                <th class="text-center">Nama Blok</th>
                                <th class="text-center">Nomor Rumah</th>
                                <th class="text-center fit">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rumah as $item)
                                <tr>
                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                    <td class="text-center align-middle">{{ $item->blokPerumahan->nama }}</td>
                                    <td class="text-center align-middle">Rumah Nomor {{ $item->nomor_rumah }}</td>
                                    <td>
                                        <form action="/admin/promo/{{ $promo->id }}/rumah/{{ $item->id }}"
                                            method="POST">
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
            </div>
        </main>
    </div>
@endsection
