@extends('dashboard.admin.layouts.main')

@section('content')
    <div class="container pt-5">
        <x-header-dashboard>
            <x-slot:title-page>
                Detail Pelanggan
            </x-slot:title-page>
            <x-slot:buttons>
                <a href="/admin/pelanggan" class="btn btn-secondary w-100 mb-3">Kembali</a>
            </x-slot:buttons>
        </x-header-dashboard>
        <hr>
        <main class="mb-3 row justify-content-center gap-5">
            <div class="col-12 col-md-4 col-lg-3 mb-3">
                <img src="{{ asset('storage/' . $pelanggan->foto) }}"
                    style="width: 100%; object-fit: cover; aspect-ratio: 3 / 4;">
            </div>
            <style>
                .detail-table table {
                    table-layout: fixed;
                }

                .detail-table th {
                    width: 12rem;
                }

                .detail-table td.colon {
                    width: 2px;
                }

                .detail-table td:not(td.colon) {
                    word-wrap: break-word;
                }
            </style>
            <div class="col-12 col-md-6 mb-3">
                <h5>Identitas Pelanggan</h5>
                <table class="table w-100 detail-table">
                    <tr>
                        <th class="align-middle">NIK</th>
                        <td class="colon align-middle">:</td>
                        <td class="align-middle">{{ $pelanggan->nik }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle">Nama</th>
                        <td class="colon align-middle">:</td>
                        <td class="align-middle">{{ $pelanggan->nama }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle">Nomor Telepon</th>
                        <td class="colon align-middle">:</td>
                        <td class="align-middle">{{ $pelanggan->nomor_telepon }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle">Email</th>
                        <td class="colon align-middle">:</td>
                        <td class="align-middle">{{ $pelanggan->email }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle">Jenis Kelamin</th>
                        <td class="colon align-middle">:</td>
                        <td class="align-middle">{{ $pelanggan->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle">Tempat, Tanggal Lahir</th>
                        <td class="colon align-middle">:</td>
                        <td class="align-middle">{{ $pelanggan->tempat_lahir }}, {{ $pelanggan->tanggal_lahir }}</td>
                    </tr>
                </table>
                <div class="d-flex justify-content-end gap-2">
                    <a href="/admin/pelanggan/{{ $pelanggan->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <form action="/admin/pelanggan/{{ $pelanggan->id }}" method="POST">
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
