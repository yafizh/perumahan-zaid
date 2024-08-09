@extends('dashboard.admin.layouts.main')

@section('content')
    <div class="container pt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Edit Direktur</h4>
            <a href="/admin/direktur" class="btn btn-secondary">Kembali</a>
        </div>
        <hr>
        <main class="mb-3">
            <form action="/admin/direktur/{{ $direktur->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 mb-3">
                        <h4 class="text-center">Identitas Direktur</h4>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger text-capitalize" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik" required
                                autocomplete="off" value="{{ old('nik', $direktur->nik) }}">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required
                                autocomplete="off" value="{{ old('nama', $direktur->nama) }}">
                        </div>
                        <div class="mb-3">
                            <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" required
                                autocomplete="off" value="{{ old('nomor_telepon', $direktur->nomor_telepon) }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required
                                autocomplete="off" value="{{ old('email', $direktur->email) }}">
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                <option value="Laki - Laki"
                                    {{ old('jenis_kelamin', $direktur->jenis_kelamin) === 'Laki - Laki' ? 'selected' : '' }}>
                                    Laki - Laki
                                </option>
                                <option value="Perempuan"
                                    {{ old('jenis_kelamin', $direktur->jenis_kelamin) === 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required
                                autocomplete="off" value="{{ old('tempat_lahir', $direktur->tempat_lahir) }}">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required
                                autocomplete="off" value="{{ old('tanggal_lahir', $direktur->tanggal_lahir) }}">
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" name="foto" id="foto" class="form-control">
                        </div>
                        <div class="mb-3 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Perbaharui Data</button>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </div>
    <script>
        document.querySelector('#nik').addEventListener('input', function() {
            document.querySelector('#username').value = this.value;
        });
    </script>
@endsection
