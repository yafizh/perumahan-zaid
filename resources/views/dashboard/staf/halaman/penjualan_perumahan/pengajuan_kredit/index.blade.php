@extends('dashboard.staf.layouts.main')

@section('content')
    <div class="container pt-5">
        <x-header-dashboard>
            <x-slot:title-page>
                Data Pengajuan Kredit
            </x-slot:title-page>
            <x-slot:buttons>
                <a href="/staf/pengajuan-kredit/create" class="btn btn-primary w-100 mb-3">Tambah</a>
            </x-slot:buttons>
        </x-header-dashboard>
        <hr>
        <main class="mb-3">
            <div class="table-responsive">
                <table class="display dataTables table w-100">
                    <thead>
                        <tr>
                            <th class="text-center fit">No</th>
                            <th class="text-center">Tanggal Pengajuan</th>
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
                                <td class="td-fit">
                                    <div class="d-flex gap-2">
                                        <a href="/staf/pengajuan-kredit/{{ $item->id }}"
                                            class="btn btn-info btn-sm">Lihat</a>
                                        <form action="/staf/pengajuan-kredit/{{ $item->id }}" method="POST">
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
        </main>
    </div>
@endsection
