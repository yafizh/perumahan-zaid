@extends('dashboard.staf.layouts.main')

@section('content')
    <div class="container pt-4">
        <h4>Data Pendaftaran Pemesanan Online</h4>
        <hr>
        <main class="mb-3">
            <div class="table-responsive">
                <table class="display dataTables table w-100">
                    <thead>
                        <tr>
                            <th class="text-center fit">No</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Nama Blok Perumahan</th>
                            <th class="text-center">Nomor Rumah</th>
                            <th class="text-center">Pembeli Rumah / Pelanggan</th>
                            <th class="text-center">Status</th>
                            <th class="text-center fit">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendaftaran_pemesanan as $item)
                            <tr>
                                <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                <td class="text-center align-middle">{{ $item->tanggalPemesanan() }}
                                <td class="text-center align-middle">
                                    {{ $item->rumah->blokPerumahan->nama }}
                                </td>
                                <td class="text-center align-middle">
                                    {{ $item->rumah->nomor_rumah }}
                                </td>
                                <td class="text-center align-middle">
                                    {{ $item->pengguna->pelanggan->nik }}/{{ $item->pengguna->pelanggan->nama }}
                                </td>
                                <td class="text-center align-middle">
                                    @if ($item->status == 1)
                                        <span class="badge text-bg-info">Menunggu Verifikasi</span>
                                    @elseif ($item->status == 2)
                                        <span class="badge text-bg-danger">Ditolak</span>
                                    @elseif ($item->status == 3)
                                        <span class="badge text-bg-primary">Diterima</span>
                                    @endif
                                </td>
                                <td class="d-flex gap-2">
                                    <a href="/staf/pengajuan-pemesanan/{{ $item->id }}" class="btn btn-info btn-sm">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
@endsection
