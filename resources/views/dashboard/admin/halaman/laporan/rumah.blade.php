@extends('dashboard.admin.layouts.main')

@section('content')
    <div class="container pt-4  ">
        <h4>Laporan Perumahan</h4>
        <hr>
        <main class="mb-3 row">
            <div class="col-12 col-md-3">
                <h5>Filter</h5>
                <form action="">
                    <div class="mb-3">
                        <label for="id_blok_perumahan" class="form-label">Nama Blok</label>
                        <select name="id_blok_perumahan" id="id_blok_perumahan" class="form-control">
                            <option value="" disabled selected>Semua Blok Perumahan</option>
                            @foreach ($blok as $item)
                                <option value="{{ $item->id }}"
                                    {{ request('id_blok_perumahan') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status_ketersediaan" class="form-label">Status Ketersediaan</label>
                        <select name="status_ketersediaan" id="status_ketersediaan" class="form-control">
                            <option value="" disabled selected>Semua Status Ketersediaan</option>
                            <option value="1" {{ request('status_ketersediaan') == 1 ? 'selected' : '' }}>
                                Tersedia
                            </option>
                            <option value="2" {{ request('status_ketersediaan') == 2 ? 'selected' : '' }}>
                                Dipesan
                            </option>
                            <option value="3" {{ request('status_ketersediaan') == 3 ? 'selected' : '' }}>
                                Terjual
                            </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status_pembangunan" class="form-label">Status Pembangunan</label>
                        <select name="status_pembangunan" id="status_pembangunan" class="form-control">
                            <option value="" disabled selected>Semua Status Pembangunan</option>
                            <option value="1" {{ request('status_pembangunan') == 1 ? 'selected' : '' }}>
                                Belum Dibangun
                            </option>
                            <option value="2" {{ request('status_pembangunan') == 2 ? 'selected' : '' }}>
                                Dalam Tahap Pembangunan
                            </option>
                            <option value="3" {{ request('status_pembangunan') == 3 ? 'selected' : '' }}>
                                Selesai Dibangun
                            </option>
                        </select>
                    </div>
                    <hr>
                    <div class="mb-3 d-flex justify-content-between align-items-strech gap-1">
                        <a href="/admin/laporan/rumah" class="btn btn-secondary d-flex align-items-center">Reset Filter</a>
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
                                <th class="text-center align-middle">Nama Blok Perumahan</th>
                                <th class="text-center align-middle">Nomor Rumah</th>
                                <th class="text-center align-middle">Status Ketersediaan</th>
                                <th class="text-center align-middle">Status Pembangunan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rumah as $item)
                                <tr>
                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                    <td class="text-center align-middle">{{ $item->blokPerumahan->nama }}</td>
                                    <td class="text-center align-middle">Rumah Nomor {{ $item->nomor_rumah }}</td>
                                    <td class="text-center align-middle">
                                        @if ($item->status_ketersediaan == 1)
                                            Tersedia
                                        @elseif ($item->status_ketersediaan == 2)
                                            Dipesan
                                        @elseif ($item->status_ketersediaan == 3)
                                            Terjual
                                        @endif
                                    </td>
                                    <td class="text-center align-middle">
                                        @if ($item->status_pembangunan == 1)
                                            Belum Dibangun
                                        @elseif ($item->status_pembangunan == 2)
                                            Dalam Tahap Pembangunan
                                        @elseif ($item->status_pembangunan == 3)
                                            Selesai Dibangun
                                        @endif
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
