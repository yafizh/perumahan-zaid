<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="/admin">PT. Karya Putra Bersaudara</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <style>
            .nav-item {
                font-size: 1rem;
                margin-inline: .4rem;
            }
        </style>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link mt-1 {{ is_null(request()->segment(2)) ? 'active' : '' }}" aria-current="page"
                        href="/admin">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a @class([
                        'mt-1',
                        'nav-link',
                        'dropdown-toggle',
                        'active' => in_array(request()->segment(2), [
                            'pendaftaran-pemesanan',
                            'pembayaran-uang-muka',
                            'pengajuan-pemesanan',
                            'pembayaran-rumah',
                            'pengajuan-kredit'
                        ]),
                    ]) href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Penjualan Perumahan
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item {{ request()->segment(2) === 'pendaftaran-pemesanan' ? 'active' : '' }}"
                                href="/admin/pendaftaran-pemesanan">
                                Pendaftaran Pemesanan
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->segment(2) === 'pengajuan-kredit' ? 'active' : '' }}"
                                href="/admin/pengajuan-kredit">
                                Pengajuan Kredit
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->segment(2) === 'pembayaran-uang-muka' ? 'active' : '' }}"
                                href="/admin/pembayaran-uang-muka">
                                Penjualan Rumah
                            </a>
                        </li>
                        <hr>
                        <li>
                            <a class="dropdown-item {{ request()->segment(2) === 'pengajuan-pemesanan' ? 'active' : '' }}"
                                href="/admin/pengajuan-pemesanan">
                                Pengajuan Pemesanan
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->segment(2) === 'pembayaran-rumah' ? 'active' : '' }}"
                                href="/admin/pembayaran-rumah">
                                Pembayaran Rumah
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a @class([
                        'mt-1',
                        'nav-link',
                        'dropdown-toggle',
                        'active' => in_array(request()->segment(2), [
                            'blok-perumahan',
                            'rumah',
                            'promo',
                        ]),
                    ]) href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Menu Perumahan
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item {{ request()->segment(2) === 'blok-perumahan' ? 'active' : '' }}"
                                href="/admin/blok-perumahan">
                                Blok Perumahan
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->segment(2) === 'rumah' ? 'active' : '' }}"
                                href="/admin/rumah">
                                Data Perumahan
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->segment(2) === 'promo' ? 'active' : '' }}"
                                href="/admin/promo">
                                Promo Perumahan
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown align-middle">
                    <a @class([
                        'mt-1',
                        'nav-link',
                        'dropdown-toggle',
                        'active' => in_array(request()->segment(2), [
                            'admin',
                            'staf',
                            'pelanggan',
                            'direktur',
                        ]),
                    ]) href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Menu Pengguna
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item {{ request()->segment(2) === 'admin' ? 'active' : '' }}"
                                href="/admin/admin">
                                Admin
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->segment(2) === 'staf' ? 'active' : '' }}"
                                href="/admin/staf">
                                Staf
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->segment(2) === 'direktur' ? 'active' : '' }}"
                                href="/admin/direktur">
                                Direktur
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->segment(2) === 'pelanggan' ? 'active' : '' }}"
                                href="/admin/pelanggan">
                                Pelanggan
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown align-middle">
                    <a @class([
                        'mt-1',
                        'nav-link',
                        'dropdown-toggle',
                        'active' => request()->segment(2) === 'laporan',
                    ]) href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Laporan
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item {{ request()->segment(3) === 'rumah' ? 'active' : '' }}"
                                href="/admin/laporan/rumah">
                                Laporan Rumah
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->segment(3) === 'penjualan-rumah' ? 'active' : '' }}"
                                href="/admin/laporan/penjualan-rumah">
                                Laporan Penjualan Rumah
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->segment(3) === 'pemesanan-rumah' ? 'active' : '' }}"
                                href="/admin/laporan/pemesanan-rumah">
                                Laporan Pemesanan Rumah
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->segment(3) === 'keluhan-pelanggan' ? 'active' : '' }}"
                                href="/admin/laporan/keluhan-pelanggan">
                                Laporan Keluhan Pelanggan
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->segment(3) === 'progres-pembangunan-rumah' ? 'active' : '' }}"
                                href="/admin/laporan/progres-pembangunan-rumah">
                                Laporan Progres Pembangunan Rumah
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->segment(3) === 'promo' ? 'active' : '' }}"
                                href="/admin/laporan/promo">
                                Laporan Promo
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->segment(3) === 'grafik-penjualan' ? 'active' : '' }}"
                                href="/admin/laporan/grafik-penjualan">
                                Laporan Grafik Penjualan
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->segment(3) === 'grafik-pemesanan' ? 'active' : '' }}"
                                href="/admin/laporan/grafik-pemesanan">
                                Laporan Grafik Pemesanan
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->segment(3) === 'keuangan-pembayaran-rumah' ? 'active' : '' }}"
                                href="/admin/laporan/keuangan-pembayaran-rumah">
                                Laporan Keuangan Pembayaran Rumah
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->segment(3) === 'rekap-tagihan-pembayaran-rumah' ? 'active' : '' }}"
                                href="/admin/laporan/rekap-tagihan-pembayaran-rumah">
                                Laporan Rekap Tagihan Pembayaran Rumah
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a @class([
                        'nav-link',
                        'active' => in_array(request()->segment(2), ['profil', 'ganti-password']),
                    ]) href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i style="font-size: 1.2rem;" class="bi bi-person-circle"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item {{ request()->segment(2) === 'profil' ? 'active' : '' }}"
                                href="/admin/profil">
                                Edit Profil
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->segment(2) === 'ganti-password' ? 'active' : '' }}"
                                href="/admin/ganti-password">
                                Ganti Password
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/logout">
                                Keluar
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
