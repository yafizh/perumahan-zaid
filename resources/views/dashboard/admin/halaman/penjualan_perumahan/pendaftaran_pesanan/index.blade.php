@extends('dashboard.admin.layouts.main')

@section('content')
    <div class="container pt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Data Pendaftaran Pemesanan</h4>
            <a href="/admin/pendaftaran-pemesanan/create" class="btn btn-primary">Tambah</a>
        </div>
        <hr>
        <main class="mb-3">
            <div class="table-responsive">
                <table class="display dataTables table w-100">
                    <thead>
                        <tr>
                            <th class="text-center align-middle fit">No</th>
                            <th class="text-center align-middle">Tanggal</th>
                            <th class="text-center align-middle">Nama Blok Perumahan</th>
                            <th class="text-center align-middle">Nomor Rumah</th>
                            <th class="text-center align-middle">Pembeli Rumah / Pelanggan</th>
                            <th class="text-center align-middle">Status</th>
                            <th class="text-center align-middle fit">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendaftaran_pemesanan as $item)
                            <tr>
                                <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                <td class="text-center align-middle">{{ $item->tanggal() }}
                                <td class="text-center align-middle">
                                    {{ $item->rumahPelanggan->rumah->blokPerumahan->nama }}
                                </td>
                                <td class="text-center align-middle">
                                    {{ $item->rumahPelanggan->rumah->nomor_rumah }}
                                </td>
                                <td class="text-center align-middle">
                                    {{ $item->rumahPelanggan->pelanggan->nik }}/{{ $item->rumahPelanggan->pelanggan->nama }}
                                </td>
                                <td class="text-center align-middle">
                                    @if ($item->status == 1)
                                        <span class="badge text-bg-info">Menunggu Pembelian</span>
                                    @elseif ($item->status == 2)
                                        <span class="badge text-bg-danger">Batal</span>
                                    @endif
                                </td>
                                <td class="td-fit align-middle">
                                    <div class="d-flex gap-2">
                                        <a href="{{ asset('storage/' . $item->foto) }}" target="_blank"
                                            class="btn btn-info btn-sm text-nowrap">
                                            Bukti Pembayaran
                                        </a>
                                        <a href="/admin/pendaftaran-pemesanan/{{ $item->id }}/edit"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="/admin/pendaftaran-pemesanan/{{ $item->id }}" method="POST">
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
