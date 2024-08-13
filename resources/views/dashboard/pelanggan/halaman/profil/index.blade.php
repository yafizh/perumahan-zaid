@extends('dashboard.pelanggan.layouts.main')

@section('content')
    <div class="container pt-3">
        <h4>Profil</h4>
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
                @if (session('berhasil'))
                    <div class="alert alert-success text-capitalize" role="alert">
                        {{ session('berhasil') }}
                    </div>
                @endif
                @if (session('pemesanan-rumah'))
                    <div class="alert alert-warning text-capitalize" role="alert">
                        {{ session('pemesanan-rumah') }}
                    </div>
                @endif
                <form action="/pelanggan/profil" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" required autocomplete="off"
                            value="{{ old('nik', auth()->user()->pelanggan->nik) }}">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required autocomplete="off"
                            value="{{ old('nama', auth()->user()->pelanggan->nama) }}">
                    </div>
                    <div class="mb-3">
                        <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" required
                            autocomplete="off" value="{{ old('nomor_telepon', auth()->user()->pelanggan->nomor_telepon) }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required autocomplete="off"
                            value="{{ old('email', auth()->user()->pelanggan->email) }}">
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                            <option value="Laki - Laki"
                                {{ old('jenis_kelamin', auth()->user()->pelanggan->jenis_kelamin) === 'Laki - Laki' ? 'selected' : '' }}>
                                Laki - Laki
                            </option>
                            <option value="Perempuan"
                                {{ old('jenis_kelamin', auth()->user()->pelanggan->jenis_kelamin) === 'Perempuan' ? 'selected' : '' }}>
                                Perempuan
                            </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required
                            autocomplete="off" value="{{ old('tempat_lahir', auth()->user()->pelanggan->tempat_lahir) }}">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required
                            autocomplete="off"
                            value="{{ old('tanggal_lahir', auth()->user()->pelanggan->tanggal_lahir) }}">
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control">
                    </div>
                    <div class="mb-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Perbaharui Profil</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
@endsection
