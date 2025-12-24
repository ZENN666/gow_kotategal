<div class="gow-navbar-wrapper">
    <nav class="navbar navbar-expand-lg gow-navbar">
        <div class="container-fluid">

            <!-- BRAND -->
            <a class="navbar-brand fw-bold d-flex align-items-center" href="<?= base_url() ?>">
                <img src="<?= base_url('assets/img/gow_tgl.webp') ?>" alt="GOW Logo"
                    style="height:36px; margin-right:10px;">
                GOW Kota Tegal
            </a>

            <!-- TOGGLER -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu"
                aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- MENU -->
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">

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
</div>