<div class="gow-navbar-wrapper">
    <nav class="navbar navbar-expand-lg gow-navbar">
        <div class="container-fluid">

            <a class="navbar-brand fw-bold d-flex align-items-center" href="<?= base_url() ?>">
                <img src="<?= base_url('assets/img/gow.webp') ?>" alt="GOW Logo"
                    style="height:36px; margin-right:10px;">
                <span class="brand-text">GOW Kota Tegal</span>
            </a>

            <button class="navbar-toggler border-0 ms-auto d-lg-none" id="openMenu" type="button"
                data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse mobile-menu" id="navMenu">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">

                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="<?= base_url() ?>">BERANDA</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="<?= base_url('about') ?>">TENTANG KAMI</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="<?= base_url('berita') ?>">BERITA</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="<?= base_url('agenda') ?>">KEGIATAN</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="<?= base_url('galeri') ?>">GALERI</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="<?= base_url('kontak') ?>">KONTAK</a>
                    </li>

                </ul>
            </div>

        </div>
    </nav>
</div>