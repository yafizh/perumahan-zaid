<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="/pelanggan/rumah">PT. Karya Putra Bersaudara</a>
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
                    <a @class([
                        'nav-link',
                        'mt-1',
                        'active' => is_null(request()->segment(2)),
                    ]) href="/pelanggan">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a @class([
                        'nav-link',
                        'mt-1',
                        'active' =>
                            request()->segment(2) === 'rumah' ||
                            request()->segment(3) === 'riwayat-pembangunan-rumah' ||
                            request()->segment(3) === 'riwayat-pembayaran-rumah',
                    ]) href="/pelanggan/rumah">Kepemilikan Rumah</a>
                </li>
                <li class="nav-item">
                    <a @class([
                        'nav-link',
                        'mt-1',
                        'active' => request()->segment(2) === 'pemesanan-rumah',
                    ]) href="/pelanggan/pemesanan-rumah">Pemesanan Rumah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mt-1 {{ request()->segment(2) === 'keluhan-pelanggan' ? 'active' : '' }}"
                        href="/pelanggan/keluhan-pelanggan">Laporan Keluhan</a>
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
                                href="/pelanggan/profil">
                                Edit Profil
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->segment(2) === 'ganti-password' ? 'active' : '' }}"
                                href="/pelanggan/ganti-password">
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
