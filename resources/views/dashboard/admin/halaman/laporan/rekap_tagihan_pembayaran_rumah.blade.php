@extends('dashboard.admin.layouts.main')

@section('content')
    <div class="container pt-4">
        <h4>Laporan Rekap Tagihan Pembayaran Rumah</h4>
        <hr>
        <main class="mb-3 row">
            <div class="col-12 col-md-3">
                <h5>Filter</h5>
                <form action="">
                    <div class="mb-3">
                        <label for="id_rumah" class="form-label">Nomor Rumah</label>
                        <select name="id_rumah" id="id_rumah" class="form-control" required>
                            <option value="" disabled selected>Pilih Nomor Rumah</option>
                            @foreach ($rumah as $item)
                                <option value="{{ $item->id }}"
                                    {{ request('id_rumah') == $item->id ? 'selected' : '' }}>
                                    Rumah Nomor {{ $item->nomor_rumah }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <hr>
                    <div class="mb-3 d-flex justify-content-between align-items-strech gap-1">
                        <a href="/admin/laporan/rekap-tagihan-pembayaran-rumah" class="btn btn-secondary d-flex align-items-center">Reset Filter</a>
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
                                <th class="text-center align-middle">Tanggal</th>
                                <th class="text-center align-middle">Nominal</th>
                                <th class="text-center align-middle">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembayaran as $item)
                                <tr>
                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                    <td class="text-center align-middle">{{ $item['tanggal'] }}</td>
                                    <td class="text-center align-middle">
                                        {{ number_format($item['nominal'], 0, ',', '.') }}
                                    </td>
                                    <td class="text-center align-middle">
                                        @if ($item['status'] == 1)
                                            @if ($item['tanggal_date_string'] < $hari_ini)
                                                <span class="badge text-bg-danger">Belum Dibayar</span>
                                            @else
                                                <span class="badge text-bg-info">Menunggu Tanggal Pembayaran</span>
                                            @endif
                                        @elseif ($item['status'] == 2)
                                            <span class="badge text-bg-warning">Menunggu Verifikasi</span>
                                        @elseif ($item['status'] == 3)
                                            <span class="badge text-bg-success">Telah Dibayar</span>
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
