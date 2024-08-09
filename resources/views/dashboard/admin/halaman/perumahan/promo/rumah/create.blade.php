@extends('dashboard.admin.layouts.main')

@section('content')
    <div class="container pt-5">
        <x-header-dashboard>
            <x-slot:title-page>
                Tambah Promo Rumah
            </x-slot:title-page>
            <x-slot:buttons>
                <a href="/admin/promo/{{ $promo->id }}/rumah" class="btn btn-secondary w-100 mb-3">Kembali</a>
            </x-slot:buttons>
        </x-header-dashboard>
        <hr>
        <main class="mb-3 row">
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label class="form-label">Nama Promo</label>
                    <input type="text" class="form-control" disabled value="{{ $promo->nama }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Mulai</label>
                    <input type="text" class="form-control" disabled value="{{ $promo->tanggal_mulai }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Selesai</label>
                    <input type="text" class="form-control" disabled value="{{ $promo->tanggal_selesai }}">
                </div>
                <div class="mb-3">
                    <label for="pengurangan_harga" class="form-label">Pengurangan Harga</label>
                    <input type="text" class="form-control" disabled
                        value="{{ number_format($promo->pengurangan_harga, 0, ',', '.') }}">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <form action="/admin/promo/{{ $promo->id }}/rumah" method="POST">
                    @csrf
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
                    <div class="mb-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </form>
            </div>
        </main>
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
    </script>
@endsection
