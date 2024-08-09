@extends('dashboard.admin.layouts.main')

@section('content')
    <div class="container pt-5">
        <x-header-dashboard>
            <x-slot:title-page>
                Detail Direktur
            </x-slot:title-page>
            <x-slot:buttons>
                <a href="/admin/direktur" class="btn btn-secondary w-100 mb-3">Kembali</a>
            </x-slot:buttons>
        </x-header-dashboard>
        <hr>
        <main class="mb-3 row justify-content-center gap-5">
            <div class="col-12 col-md-4 col-lg-3 mb-3">
                <img src="{{ asset('storage/' . $direktur->foto) }}" style="width: 100%; object-fit: cover; aspect-ratio: 3 / 4;">
            </div>
            <style>
                table {
                    table-layout: fixed;
                }

                th {
                    width: 12rem;
                }

                td.colon {
                    width: 2px;
                }

                td:not(td.colon) {
                    word-wrap: break-word;
                }
            </style>
            <div class="col-12 col-md-6 mb-3">
                <table class="table w-100">
                    <tr>
                        <th class="align-middle">NIK</th>
                        <td class="colon align-middle">:</td>
                        <td class="align-middle">{{ $direktur->nik }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle">Nama</th>
                        <td class="colon align-middle">:</td>
                        <td class="align-middle">{{ $direktur->nama }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle">Nomor Telepon</th>
                        <td class="colon align-middle">:</td>
                        <td class="align-middle">{{ $direktur->nomor_telepon }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle">Email</th>
                        <td class="colon align-middle">:</td>
                        <td class="align-middle">{{ $direktur->email }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle">Jenis Kelamin</th>
                        <td class="colon align-middle">:</td>
                        <td class="align-middle">{{ $direktur->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle">Tempat, Tanggal Lahir</th>
                        <td class="colon align-middle">:</td>
                        <td class="align-middle">{{ $direktur->tempat_lahir }}, {{ $direktur->tanggal_lahir }}</td>
                    </tr>
                </table>
                <div class="d-flex justify-content-end gap-2">
                    <a href="/admin/direktur/{{ $direktur->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <form action="/admin/direktur/{{ $direktur->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure?')">Hapus</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
@endsection
