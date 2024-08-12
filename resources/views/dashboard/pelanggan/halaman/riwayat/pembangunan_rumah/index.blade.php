@extends('dashboard.pelanggan.layouts.main')

@section('content')
    <div class="container pt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Riwayat Pembangunan Rumah</h4>
            <button onclick="history.back()" class="btn btn-secondary w-100 mb-3">Kembali</button>
        </div>
        <hr>
        <main class="mb-3 row">
            <div class="col-12 col-md-6 mb-3">
                <h4>Rumah</h4>
                <table class="table w-100">
                    <tr>
                        <th class="align-middle text-nowrap">Blok Rumah</th>
                        <td class="colon align-middle">:</td>
                        <td class="align-middle">{{ $rumah->blokPerumahan->nama }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle text-nowrap">Nomor Rumah</th>
                        <td class="colon align-middle">:</td>
                        <td class="align-middle">{{ $rumah->nomor_rumah }}</td>
                    </tr>
                    <tr>
                        <th class="align-middle text-nowrap">Alamat</th>
                        <td class="colon align-middle">:</td>
                        <td class="align-middle">
                            <a target="_blank"
                                href="https://maps.google.com/?q={{ $rumah->latitude }},{{ $rumah->longitude }}">
                                {{ $rumah->alamat }}
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-12 col-md-6 mb-3">
                <h4>Riwayat Pembangunan</h4>
                <div class="table-responsive">
                    <table class="display table w-100">
                        <thead>
                            <tr>
                                <th class="text-center fit">No</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Keterangan</th>
                                <th class="text-center">Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($riwayatPembangunanRumah->count())
                                @foreach ($riwayatPembangunanRumah as $item)
                                    <tr>
                                        <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                        <td class="text-center align-middle">{{ $item->tanggal }}
                                        <td class="text-center align-middle">
                                            {{ $item->keterangan }}
                                        </td>
                                        <td class="text-center align-middle">
                                            <a href="{{ asset('storage/' . $item->foto) }}" target="_blank">Lihat</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="4">Data Kosong</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
@endsection
