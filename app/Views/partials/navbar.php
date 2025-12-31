<div class="gow-navbar-wrapper">

    <style>
        /* Bikin dropdown jadi 'kaca' (Glassmorphism) */
        .gow-navbar .dropdown-menu {
            background: rgba(255, 255, 255, 0.85);
            /* Putih transparan */
            backdrop-filter: blur(10px);
            /* Efek blur di belakangnya */
            -webkit-backdrop-filter: blur(10px);
            /* Support Safari */
            border: 1px solid rgba(255, 255, 255, 0.5);
            /* Border halus */
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            /* Bayangan lembut */
            border-radius: 12px;
            /* Sudut membulat */
            margin-top: 10px;
            /* Jarak dari navbar */
            padding: 8px;
        }

        /* Style Item Dropdown */
        .gow-navbar .dropdown-item {
            color: #333;
            font-weight: 500;
            padding: 10px 15px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        /* Hover Effect: Geser kanan dikit + warna oranye */
        .gow-navbar .dropdown-item:hover,
        .gow-navbar .dropdown-item:focus {
            background-color: rgba(255, 127, 0, 0.1);
            /* Orange transparan */
            color: #ff7f00;
            /* Teks Orange */
            transform: translateX(5px);
        }
    </style>

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

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-medium" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            TENTANG KAMI
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end fade-down">
                            <li>
                                <a class="dropdown-item" href="<?= base_url('about#visi-misi') ?>">VISI & MISI</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?= base_url('about#struktur') ?>">STRUKTUR
                                    ORGANISASI</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="<?= base_url('berita') ?>">BERITA</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="<?= base_url('agenda') ?>">KEGIATAN</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="<?= base_url('kontak') ?>">KONTAK</a>
                    </li>

                </ul>
            </div>

        </div>
    </nav>
</div>