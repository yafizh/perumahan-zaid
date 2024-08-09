@extends('dashboard.staf.layouts.main')

@section('content')
    <div class="container pt-5">
        <x-header-dashboard>
            <x-slot:title-page>
                Tambah Pengajuan Kredit
            </x-slot:title-page>
            <x-slot:buttons>
                <button onclick="history.back()" class="btn btn-secondary w-100 mb-3">Kembali</button>
            </x-slot:buttons>
        </x-header-dashboard>
        <hr>
        <form action="/staf/pengajuan-kredit" method="POST">
            @csrf
            <main class="mb-3 row justify-content-center">
                <div class="col-12">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger text-capitalize" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label for="id_blok_perumahan" class="form-label">Blok Perumahan</label>
                        <select name="id_blok_perumahan" id="id_blok_perumahan" class="form-control" required
                            @disabled($id_blok_rumah_pelanggan)>
                            <option value="" disabled selected>Pilih Blok Perumahan</option>
                            @foreach ($blok_perumahan as $item)
                                <option value="{{ $item->id }}"
                                    {{ $id_blok_rumah_pelanggan == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_rumah" class="form-label">Nomor Rumah</label>
                        <select name="id_rumah" id="id_rumah" class="form-control" required @disabled($id_rumah_pelanggan)>
                            <option value="" disabled selected>Pilih Nomor Rumah</option>
                        </select>
                        @if ($id_rumah_pelanggan)
                            <input type="text" hidden value="{{ $id_rumah_pelanggan }}" name="id_rumah">
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_pengajuan" class="form-label">Tanggal Pengajuan</label>
                        <input type="date" class="form-control" name="tanggal_pengajuan" id="tanggal_pengajuan" required
                            value="{{ date('Y-m-d') }}">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <input type="text" hidden name="id_pelanggan" id="id_pelanggan">
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK Pelanggan</label>
                        <select name="nik" id="nik" class="form-control" required @disabled(request()->get('id_pelanggan'))>
                            <option value="" disabled selected>Pilih NIK Pelanggan</option>
                            @foreach ($pelanggan as $item)
                                <option value="{{ $item->nik }}"
                                    {{ request()->get('id_pelanggan') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nik }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Pelanggan</label>
                        <select name="nama" id="nama" class="form-control" required @disabled(request()->get('id_pelanggan'))>
                            <option value="" disabled selected>Pilih Nama Pelanggan</option>
                            @foreach ($pelanggan as $item)
                                <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nomor Telepon</label>
                        <input type="text" disabled id="nomor_telepon" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" disabled id="email" class="form-control">
                    </div>
                    <div class="mb-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </div>
            </main>
        </form>
    </div>
    <script>
        const id_rumah_pelanggan = {{ Js::from($id_rumah_pelanggan) }};
        const rumah = {{ Js::from($rumah) }};
        document.getElementById('id_blok_perumahan').addEventListener('change', function() {
            document.getElementById('id_rumah').innerHTML =
                `<option value="" disabled selected>Pilih Nomor Rumah</option>`;
            if (rumah[this[this.selectedIndex].value].length) {
                rumah[this[this.selectedIndex].value].forEach(value => {
                    document.getElementById('id_rumah')
                        .insertAdjacentHTML(
                            'beforeend',
                            `<option value="${value.id}" ${id_rumah_pelanggan == value.id ? 'selected' : ''}>Nomor Rumah ${value.nomor_rumah}</option>`
                        );
                });
            } else {
                document.getElementById('id_rumah').innerHTML =
                    `<option value="" disabled selected>Tidak Ada Rumah Yang Tersedia</option>`;
            }
        });

        const pelanggan = {{ Js::from($pelanggan) }};
        const setPelanggan = (pelanggan) => {
            document.getElementById('id_pelanggan').value = pelanggan.id;
            document.getElementById('nik').value = pelanggan.nik;
            document.getElementById('nama').value = pelanggan.nama;
            document.getElementById('nomor_telepon').value = pelanggan.nomor_telepon;
            document.getElementById('email').value = pelanggan.email;
        }

        document.getElementById('nik').addEventListener('change', function() {
            setPelanggan(pelanggan[this.selectedIndex - 1]);
        });
        document.getElementById('nama').addEventListener('change', function() {
            setPelanggan(pelanggan[this.selectedIndex - 1]);
        });

        @if (request()->get('id_pelanggan'))
            document.getElementById('nik').dispatchEvent(new Event('change'));
            document.getElementById('id_blok_perumahan').dispatchEvent(new Event('change'));
        @endif
    </script>
@endsection
