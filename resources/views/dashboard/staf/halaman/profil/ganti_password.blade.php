@extends('dashboard.staf.layouts.main')

@section('content')
    @include('templates.ganti_password', ['action' => '/staf/ganti-password'])
@endsection
