@extends('dashboard.staf.layouts.main')

@section('content')
    <div class="container pt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Tambah Pendaftaran Pemesanan</h4>
            <button onclick="history.back()" class="btn btn-secondary">Kembali</button>
        </div>
        <hr>
        <form action="/staf/pendaftaran-pemesanan" method="POST" enctype="multipart/form-data">
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
                        <select name="id_blok_perumahan" id="id_blok_perumahan" class="form-control" required>
                            <option value="" disabled selected>Pilih Blok Perumahan</option>
                            @foreach ($blok_perumahan as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_rumah" class="form-label">Nomor Rumah</label>
                        <select name="id_rumah" id="id_rumah" class="form-control" required>
                            <option value="" disabled selected>Pilih Nomor Rumah</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" required
                            value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_beli" class="form-label">Tanggal Pembelian</label>
                        <input type="date" class="form-control" name="tanggal_beli" id="tanggal_beli" required>
                    </div>
                    <div class="mb-3">
                        <label for="nominal" class="form-label">Biaya Pendaftaran/Pemesanan</label>
                        <input type="text" class="form-control" name="nominal" id="nominal" required>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Bukti Pembayaran</label>
                        <input type="file" class="form-control" name="foto" id="foto" required accept="image/*">
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
        const rumah = {{ Js::from($rumah) }};
        document.getElementById('id_blok_perumahan').addEventListener('change', function() {
            document.getElementById('id_rumah').innerHTML =
                `<option value="" disabled selected>Pilih Nomor Rumah</option>`;
            if (rumah[this[this.selectedIndex].value].length) {
                rumah[this[this.selectedIndex].value].forEach(value => {
                    document.getElementById('id_rumah')
                        .insertAdjacentHTML(
                            'beforeend',
                            `<option value="${value.id}">Nomor Rumah ${value.nomor_rumah}</option>`
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
            console.log('1')
            document.getElementById('nik').dispatchEvent(new Event('change'));
        @endif

        document.querySelector('input[name=nominal]').addEventListener("keypress", function(evt) {
            if (evt.which < 48 || evt.which > 57) {
                evt.preventDefault();
                return;
            }

            this.addEventListener('input', function() {
                const nominal = Number(((this.value).split('.')).join(''));
                this.value = formatNumberWithDot.format(nominal);
            });
        });
    </script>
@endsection
