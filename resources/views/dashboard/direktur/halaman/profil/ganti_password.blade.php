@extends('dashboard.direktur.layouts.main')

@section('content')
    @include('templates.ganti_password', ['action' => '/direktur/ganti-password'])
@endsection
