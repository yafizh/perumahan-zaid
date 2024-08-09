@extends('dashboard.admin.layouts.main')

@section('content')
    <div class="container pt-5">
        <x-header-dashboard>
            <x-slot:title-page>
                Data Perumahan
            </x-slot:title-page>
            <x-slot:buttons>
                {{-- <button class="btn btn-info w-100 mb-3">Cetak</button> --}}
                <a href="/admin/rumah/create" class="btn btn-primary w-100 mb-3">Tambah</a>
            </x-slot:buttons>
        </x-header-dashboard>
        <hr>
        <main class="mb-3">
            @isset($semua_blok_perumahan)
                <div class="d-flex align-items-start flex-column flex-md-row">
                    <div class="nav flex-md-column flex-row nav-pills me-3" style="min-width: 12rem;" id="v-pills-tab"
                        role="tablist" aria-orientation="vertical">
                        @foreach ($semua_blok_perumahan as $item)
                            <a href="/admin/rumah?blok={{ $item->urutan }}"
                                class="nav-link text-start {{ $blok == $item->urutan ? 'active' : '' }}">{{ $item->nama }}</a>
                        @endforeach
                    </div>
                    <div class="tab-content w-100" id="v-pills-tabContent">
                        <div class="tab-pane fade show active">
                            <div class="table-responsive">
                                <table class="dataTables-rumah display table w-100">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle fit">No</th>
                                            <th class="text-center align-middle">Foto</th>
                                            <th class="text-center align-middle">Nomor Rumah</th>
                                            <th class="text-center align-middle">Status Ketersediaan</th>
                                            <th class="text-center align-middle">Status Pembangunan</th>
                                            <th class="text-center align-middle fit">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blok_perumahan_terpilih->rumah as $rumah)
                                            <tr>
                                                <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                                <td class="text-center align-middle">
                                                    <img src="{{ asset('storage/' . $rumah->foto) }}"
                                                        style="width: 6rem;height: 6rem;object-fit: cover;">
                                                </td>
                                                <td class="text-center align-middle">{{ $rumah->nomor_rumah }}</td>
                                                <td class="text-center align-middle">
                                                    @if ($rumah->status_ketersediaan == 1)
                                                        <span class="badge text-bg-success">Tersedia</span>
                                                    @elseif ($rumah->status_ketersediaan == 2)
                                                        <span class="badge text-bg-warning">Dipesan</span>
                                                    @elseif ($rumah->status_ketersediaan == 3)
                                                        <span class="badge text-bg-danger">Terjual</span>
                                                    @endif
                                                </td>
                                                <td class="text-center align-middle">
                                                    @if ($rumah->status_pembangunan == 1)
                                                        <span class="badge text-bg-danger">Belum Dibangun</span>
                                                    @elseif ($rumah->status_pembangunan == 2)
                                                        <span class="badge text-bg-info">Dalam Tahap Pembangunan</span>
                                                    @elseif ($rumah->status_pembangunan == 3)
                                                        <span class="badge text-bg-success">Selesai Dibangun</span>
                                                    @endif
                                                </td>
                                                <td class="text-center align-middle">
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <a href="/admin/rumah/{{ $rumah->id }}"
                                                            class="btn btn-info btn-sm">Detail</a>
                                                        <a href="/admin/rumah/{{ $rumah->id }}/edit"
                                                            class="btn btn-warning btn-sm">Edit</a>
                                                        <form action="/admin/rumah/{{ $rumah->id }}" method="POST">
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
                        </div>
                    </div>
                </div>
            @else
                <h5 class="text-center pt-5">Blok Perumahan Belum Ditambahkan!</h5>
            @endisset
        </main>
    </div>
@endsection
