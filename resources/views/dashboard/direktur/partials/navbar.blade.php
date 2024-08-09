<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="/direktur">PT. Karya Putra Bersaudara</a>
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
                                href="/direktur/laporan/rumah">
                                Laporan Rumah
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->segment(3) === 'penjualan-rumah' ? 'active' : '' }}"
                                href="/direktur/laporan/penjualan-rumah">
                                Laporan Penjualan Rumah
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->segment(3) === 'pemesanan-rumah' ? 'active' : '' }}"
                                href="/direktur/laporan/pemesanan-rumah">
                                Laporan Pemesanan Rumah
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->segment(3) === 'keluhan-pelanggan' ? 'active' : '' }}"
                                href="/direktur/laporan/keluhan-pelanggan">
                                Laporan Keluhan Pelanggan
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->segment(3) === 'progres-pembangunan-rumah' ? 'active' : '' }}"
                                href="/direktur/laporan/progres-pembangunan-rumah">
                                Laporan Progres Pembangunan Rumah
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->segment(3) === 'promo' ? 'active' : '' }}"
                                href="/direktur/laporan/promo">
                                Laporan Promo
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->segment(3) === 'grafik-penjualan' ? 'active' : '' }}"
                                href="/direktur/laporan/grafik-penjualan">
                                Laporan Grafik Penjualan
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->segment(3) === 'grafik-pemesanan' ? 'active' : '' }}"
                                href="/direktur/laporan/grafik-pemesanan">
                                Laporan Grafik Pemesanan
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->segment(3) === 'keuangan-pembayaran-rumah' ? 'active' : '' }}"
                                href="/direktur/laporan/keuangan-pembayaran-rumah">
                                Laporan Keuangan Pembayaran Rumah
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->segment(3) === 'rekap-tagihan-pembayaran-rumah' ? 'active' : '' }}"
                                href="/direktur/laporan/rekap-tagihan-pembayaran-rumah">
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
                                href="/direktur/profil">
                                Edit Profil
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->segment(2) === 'ganti-password' ? 'active' : '' }}"
                                href="/direktur/ganti-password">
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
