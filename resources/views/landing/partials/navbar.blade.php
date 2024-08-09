<nav class="navbar navbar-expand-lg navbar-dark {{ !request()->segment(1) ? 'fixed-top' : '' }}">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link mt-1 {{ !request()->segment(1) ? 'active' : '' }}" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mt-1 {{ request()->segment(1) === 'unit-perumahan' ? 'active' : '' }}" href="/unit-perumahan">Unit Perumahan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mt-1 {{ request()->segment(1) === 'tentang-kami' ? 'active' : '' }}" href="/tentang-kami">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login"><i style="font-size: 1.2rem;" class="bi bi-person-circle"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>