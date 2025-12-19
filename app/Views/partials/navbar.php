<nav class="navbar navbar-expand-lg bg-white shadow-sm py-3 gow-navbar">
    <div class="container">

        <!-- BRAND -->
        <a class="navbar-brand fw-bold" href="<?= base_url() ?>">
            GOW Kota Tegal
        </a>

        <!-- TOGGLER -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu"
            aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('profil') ?>">Profil</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('visimisi') ?>">Visi &amp; Misi</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('struktur') ?>">Struktur</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('berita') ?>">Berita</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('galeri') ?>">Galeri</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('kontak') ?>">Kontak</a>
                </li>
            </ul>
        </div>
    </div>
</nav>