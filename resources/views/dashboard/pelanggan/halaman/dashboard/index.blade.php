@extends('dashboard.pelanggan.layouts.main')

@section('content')
    <div class="container pt-5">
        <x-header-dashboard>
            <x-slot:title-page>
                Dashboard
            </x-slot:title-page>
        </x-header-dashboard>
        <hr>
        <main class="mb-3">
            <img src="/persyaratan.png" class="w-100">
        </main>
    </div>
@endsection
