@extends('dashboard.admin.layouts.main')

@section('content')
    @include('templates.ganti_password', ['action' => '/admin/ganti-password'])
@endsection
