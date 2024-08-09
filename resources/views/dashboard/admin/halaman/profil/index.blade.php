@extends('dashboard.admin.layouts.main')

@section('content')
    <div class="container pt-5">
        <x-header-dashboard>
            <x-slot:title-page>
                Profil
            </x-slot:title-page>
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
                @if (session('berhasil'))
                    <div class="alert alert-success text-capitalize" role="alert">
                        {{ session('berhasil') }}
                    </div>
                @endif
                <form action="/admin/profil" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required
                            autocomplete="off" value="{{ old('username', auth()->user()->username) }}">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required autocomplete="off"
                            value="{{ old('nama', auth()->user()->admin->nama) }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required autocomplete="off"
                            value="{{ old('email', auth()->user()->email) }}">
                    </div>
                    <div class="mb-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Perbaharui Profil</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
@endsection
