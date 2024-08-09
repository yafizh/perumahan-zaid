@extends('dashboard.admin.layouts.main')

@section('content')
    <div class="container pt-5">
        <x-header-dashboard>
            <x-slot:title-page>
                Tambah Rumah
            </x-slot:title-page>
            <x-slot:buttons>
                <a href="/admin/rumah" class="btn btn-secondary w-100 mb-3">Kembali</a>
            </x-slot:buttons>
        </x-header-dashboard>
        <hr>
        <main class="mb-3 row justify-content-center">
            <div class="col-12 col-md-6">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger text-capitalize" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
                <form action="/admin/rumah" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="id_blok_perumahan" class="form-label">Blok Rumah</label>
                        <select class="form-control" name="id_blok_perumahan" id="id_blok_perumahan" required>
                            <option value="" selected disabled>Pilih Blok Rumah</option>
                            @foreach ($blok_perumahan as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('id_blok_perumahan') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status_pembangunan" class="form-label">Status Pembangunan</label>
                        <select class="form-control" name="status_pembangunan" id="status_pembangunan" required>
                            <option value="" selected disabled>Pilih Status Pembangunan</option>
                            <option value="1" {{ old('status_pembangunan') == 1 ? 'selected' : '' }}>
                                Belum Dibangun
                            </option>
                            <option value="2" {{ old('status_pembangunan') == 2 ? 'selected' : '' }}>
                                Dalam Tahap
                                Pembangunan</option>
                            <option value="3" {{ old('status_pembangunan') == 3 ? 'selected' : '' }}>
                                Selesai Dibangun
                            </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nomor_rumah" class="form-label">Nomor Rumah</label>
                        <input type="number" class="form-control" id="nomor_rumah" name="nomor_rumah" min="1"
                            required autocomplete="off" value="{{ old('nomor_rumah') }}">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" required autocomplete="off"
                            value="{{ old('harga'), 0, ',', '.' }}">
                    </div>
                    <div class="mb-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="text" class="form-control" id="latitude" name="latitude" required
                            autocomplete="off" value="{{ old('latitude') }}">
                    </div>
                    <div class="mb-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="text" class="form-control" id="longitude" name="longitude" required
                            autocomplete="off" value="{{ old('longitude') }}">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" required>{{ old('alamat') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control" required>
                    </div>
                    <div class="mb-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
    <script>
        document.querySelector('input[name=harga]').addEventListener("keypress", function(evt) {
            if (evt.which < 48 || evt.which > 57) {
                evt.preventDefault();
                return;
            }

            this.addEventListener('input', function() {
                const harga = Number(((this.value).split('.')).join(''));
                this.value = formatNumberWithDot.format(harga);
            });
        });
    </script>
@endsection
