@extends('dashboard.pelanggan.layouts.main')

@section('content')
    @include('templates.ganti_password', ['action' => '/pelanggan/ganti-password'])
@endsection
