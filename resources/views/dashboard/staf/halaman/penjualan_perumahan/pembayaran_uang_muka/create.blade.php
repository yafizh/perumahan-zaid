@extends('dashboard.staf.layouts.main')

@section('content')
    <div class="container pt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Tambah Penjualan</h4>
            <button onclick="history.back()" class="btn btn-secondary">Kembali</button>
        </div>
        <hr>
        <form action="/staf/pembayaran-uang-muka" method="POST" enctype="multipart/form-data">
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
                <div class="col-12 col-md-4">
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
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" required
                            value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="mb-3">
                        <label for="nominal" class="form-label">Biaya Uang Muka</label>
                        <input type="text" class="form-control" name="nominal" id="nominal" required>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Bukti Pembayaran</label>
                        <input type="file" class="form-control" name="foto" id="foto" accept="image/*">
                    </div>
                </div>
                <div class="col-12 col-md-4">
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
                </div>
                <div class="col-12 col-md-4">
                    <div class="mb-3">
                        <label for="jenis_pembayaran" class="form-label">Jenis Pembayaran Rumah</label>
                        <select class="form-control" name="jenis_pembayaran" id="jenis_pembayaran" required>
                            <option value="" disabled selected>Pilih Jenis Pembayaran</option>
                            <option value="1">Tunai</option>
                            <option value="2">Tunai Berkala</option>
                            <option value="3">Kredit</option>
                        </select>
                    </div>
                    <div class="mb-3 invisible">
                        <label for="jumlah_cicilan">Jumlah Cicilan</label>
                        <select name="jumlah_cicilan" class="form-control" id="jumlah_cicilan">
                            <option value="1">1 Bulan</option>
                            <option value="2">2 Bulan</option>
                            <option value="3">3 Bulan</option>
                            <option value="4">4 Bulan</option>
                            <option value="5">5 Bulan</option>
                            <option value="6">6 Bulan</option>
                        </select>
                    </div>
                    <div class="mb-3 invisible">
                        <label for="tanggal_mulai_pembayaran">Tanggal Mulai Pembayaran</label>
                        <input type="date" class="form-control" name="tanggal_mulai_pembayaran"
                            id="tanggal_mulai_pembayaran" required value="{{ Date('Y-m-d') }}">
                    </div>
                    <div class="mb-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </div>
            </main>
        </form>
    </div>
    <script>
        const inputJumlahCicilan = document.getElementById('jumlah_cicilan');
        const inputTanggalMulaiPembayaran = document.getElementById('tanggal_mulai_pembayaran');
        const biayaUangMuka = document.getElementById('nominal');
        const foto = document.getElementById('foto');

        document.getElementById('jenis_pembayaran').addEventListener('change', function() {
            biayaUangMuka.value = "";
            biayaUangMuka.parentElement.classList.remove('d-none');
            inputJumlahCicilan.parentElement.classList.add('invisible');
            inputTanggalMulaiPembayaran.parentElement.classList.add('invisible');
            if (this[this.selectedIndex].value == 1) {
                biayaUangMuka.parentElement.classList.add('d-none');
                biayaUangMuka.value = 0;
            }
            if (this[this.selectedIndex].value == 2) {
                inputJumlahCicilan.parentElement.classList.remove('invisible');
                inputTanggalMulaiPembayaran.parentElement.classList.remove('invisible');
                biayaUangMuka.value = "88.500.000";
            }
            if (this[this.selectedIndex].value == 3) {
                biayaUangMuka.parentElement.classList.add('d-none');
                foto.parentElement.classList.add('d-none');
                biayaUangMuka.value = 0;
            }
        });
    </script>
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
