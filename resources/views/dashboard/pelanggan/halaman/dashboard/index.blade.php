@extends('dashboard.pelanggan.layouts.main')

@section('content')
    <div class="container pt-4">
        <h4>Dashboard</h4>
        <hr>
        <main class="mb-3">
            <h4>Kelengkapan data calon nasabah</h4>
            <ul>
                <li>FC KTP suami istri</li>
                <li>FC KK</li>
                <li>FC NPWP</li>
                <li>FC Buku nikah kalo sdh menikah</li>
                <li>FC Surat keterangan belum memiliki rumah</li>
                <li>FC Surat keterangan belum menikah (kalo blm pernah menikah/akta cerai)</li>
                <li>SK kerja kalo karyawan / Surat keterangan usaha</li>
                <li>Slip gaji 3bln terakhir / Surat keterangan penghasilan</li>
                <li>Rekening koran 3 bln terakhir (untuk gajih tunai wajib melampirkan RK juga)</li>
                <li>Legalitas (STF & PBG) developer yang melengkapi, serta mengisi form aplikasi dari bank</li>
            </ul>
        </main>
    </div>
@endsection
