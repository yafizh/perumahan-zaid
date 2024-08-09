<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="/staf">PT. Karya Putra Bersaudara</a>
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
                        href="/staf">Dashboard</a>
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
                                href="/staf/pendaftaran-pemesanan">
                                Pendaftaran Pemesanan
                            </a>
                        </li>
                           <li>
                            <a class="dropdown-item {{ request()->segment(2) === 'pengajuan-kredit' ? 'active' : '' }}"
                                href="/staf/pengajuan-kredit">
                                Pengajuan Kredit
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->segment(2) === 'pembayaran-uang-muka' ? 'active' : '' }}"
                                href="/staf/pembayaran-uang-muka">
                                Penjualan Rumah
                            </a>
                        </li>
                        <hr>
                        <li>
                            <a class="dropdown-item {{ request()->segment(2) === 'pengajuan-pemesanan' ? 'active' : '' }}"
                                href="/staf/pengajuan-pemesanan">
                                Pengajuan Pemesanan
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->segment(2) === 'pembayaran-rumah' ? 'active' : '' }}"
                                href="/staf/pembayaran-rumah">
                                Pembayaran Rumah
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link mt-1 {{ request()->segment(2) === 'pelanggan' ? 'active' : '' }}"
                        aria-current="page" href="/staf/pelanggan">Pelanggan</a>
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
                                href="/staf/profil">
                                Edit Profil
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->segment(2) === 'ganti-password' ? 'active' : '' }}"
                                href="/staf/ganti-password">
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
