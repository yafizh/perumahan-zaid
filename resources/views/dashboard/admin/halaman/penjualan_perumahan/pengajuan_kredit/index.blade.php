@extends('dashboard.admin.layouts.main')

@section('content')
    <div class="container pt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Data Pengajuan Kredit</h4>
            <a href="/admin/pengajuan-kredit/create" class="btn btn-primary">Tambah</a>
        </div>
        <hr>
        <main class="mb-3">
            <div class="table-responsive">
                <table class="display dataTables table w-100">
                    <thead>
                        <tr>
                            <th class="text-center fit">No</th>
                            <th class="text-center">Tanggal Pengajuan</th>
                            <th class="text-center">Blok Perumahan</th>
                            <th class="text-center">Nomor Rumah</th>
                            <th class="text-center">Pelanggan</th>
                            <th class="text-center">Status</th>
                            <th class="text-center fit">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengajuan_kredit as $item)
                            <tr>
                                <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                <td class="text-center align-middle">{{ $item->tanggalPengajuan() }}
                                <td class="text-center align-middle">
                                    {{ $item->rumah->blokPerumahan->nama }}
                                </td>
                                <td class="text-center align-middle">
                                    {{ $item->rumah->nomor_rumah }}
                                </td>
                                <td class="text-center align-middle">
                                    {{ $item->pelanggan->nik }}/{{ $item->pelanggan->nama }}
                                </td>
                                <td class="text-center align-middle">
                                    @if ($item->status == 1)
                                        <span class="badge text-bg-info">Menunggu Verifikasi</span>
                                    @elseif ($item->status == 2)
                                        <span class="badge text-bg-danger">Ditolak</span>
                                    @elseif ($item->status == 3)
                                        <span class="badge text-bg-success">Diterima</span>
                                    @endif
                                </td>
                                <td class="d-flex gap-2">
                                    <a href="/admin/pengajuan-kredit/{{ $item->id }}"
                                        class="btn btn-info btn-sm">Lihat</a>
                                    <form action="/admin/pengajuan-kredit/{{ $item->id }}" method="POST">
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
