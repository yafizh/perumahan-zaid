@extends('dashboard.admin.layouts.main')

@section('content')
    <div class="container pt-4">
        <h4>Data Pembayaran Rumah</h4>
        <hr>
        <main class="mb-3">
            <div class="table-responsive">
                <table class="display dataTables table w-100">
                    <thead>
                        <tr>
                            <th class="text-center fit">No</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Blok Rumah</th>
                            <th class="text-center">Nomor Rumah</th>
                            <th class="text-center">Status</th>
                            <th class="text-center fit">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembayaran as $item)
                            <tr>
                                <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                <td class="text-center align-middle">{{ $item->tanggalPembayaran() }}</td>
                                <td class="text-center align-middle">
                                    {{ $item->pembayaran->rumahPelanggan->rumah->blokPerumahan->nama }}</td>
                                <td class="text-center align-middle">Rumah Nomor
                                    {{ $item->pembayaran->rumahPelanggan->rumah->nomor_rumah }}</td>
                                <td class="text-center align-middle">
                                    @if ($item->status == 1)
                                        <span class="badge text-bg-warning">Menunggu Verifikasi</span>
                                    @elseif ($item->status == 2)
                                        <span class="badge text-bg-danger">Ditolak</span>
                                    @elseif ($item->status == 3)
                                        <span class="badge text-bg-success">Diterima</span>
                                    @endif
                                </td>
                                <td class="text-center align-middle">
                                    <a href="/admin/pembayaran-rumah/{{ $item->id }}"
                                        class="btn btn-info btn-sm">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
@endsection
