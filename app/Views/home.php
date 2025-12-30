<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GOW Kota Tegal | Website Resmi</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/home.css') ?>">
</head>

<body>

    <?php include __DIR__ . '/partials/navbar.php'; ?>

    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 hero-content">
                    <small>Gabungan Organisasi Wanita</small>
                    <h1 class="my-3">Generasi Emas<br><span>Kota Tegal</span></h1>
                    <p>Wadah koordinasi organisasi wanita dalam mendukung pembangunan dan pemberdayaan perempuan di Kota
                        Tegal.</p>
                    <a href="<?= base_url('profil') ?>" class="btn btn-hero mt-3">Selengkapnya →</a>
                </div>
                <div class="col-md-6 hero-image text-md-end text-center position-relative">
                    <div class="hero-shape-bg"></div>
                    <img src="<?= base_url('assets/img/banner2.png') ?>" class="img-fluid hero-animate-img"
                        loading="lazy" alt="Hero GOW" style="position: relative; z-index: 2;">
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid px-0">
        <div class="container">
            <div class="stats row">
                <div class="col-md col-6 stat-item">
                    <h2 class="count-up" data-count="29">0+</h2><span>ORGANISASI</span>
                </div>
                <div class="col-md col-6 stat-item">
                    <h2 class="count-up" data-count="500">0+</h2><span>CABANG</span>
                </div>
                <div class="col-md col-6 stat-item">
                    <h2 class="count-up" data-count="100">0+</h2><span>ANGGOTA</span>
                </div>
            </div>
        </div>
    </section>

    <section class="sambutan-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 text-start text-md-center mb-4 mb-md-0">
                    <div class="sambutan-img-wrapper">
                        <img src="<?= base_url('assets/img/ketua-umum.webp') ?>" class="sambutan-img"
                            alt="Ketua Umum GOW">
                    </div>
                </div>
                <div class="col-md-7 sambutan-content ps-md-5">
                    <h2>Sambutan Ketua Umum</h2>
                    <h3>GOW Kota Tegal</h3>
                    <div class="sambutan-text">
                        <p>Alhamdulillah segala puji bagi Allah SWT atas rahmat-Nya Gabungan Organisasi Wanita (GOW)
                            Kota Tegal dapat terus hadir membawa semangat untuk kemajuan pembangunan dan pemberdayaan
                            perempuan di Kota Tegal.</p>
                        <p>Melalui peluncuran pembaharuan website ini, kami berharap sinergitas antar organisasi wanita
                            semakin kuat, mandiri, dan akuntabel. Semoga media ini dapat menjadi sarana informasi dan
                            edukasi yang bermanfaat bagi seluruh anggota maupun masyarakat luas.</p>
                    </div>
                    <div class="mt-4">
                        <div class="sambutan-name">Ny. Debby Firoeza Indiany</div>
                        <div class="sambutan-jabatan">Ketua Umum GOW Kota Tegal Periode 2025-2030</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="partner-section">
        <div class="container">
            <div class="partner-title">
                <h3>Organisasi Anggota & Mitra</h3>
                <p class="text-muted">Bersinergi membangun Kota Tegal</p>
            </div>
            <div class="swiper logo-swiper">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide">
                        <div class="logo-item"><img src="<?= base_url('assets/img/hwk.webp') ?>" alt="HWK"></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="logo-item"><img src="<?= base_url('assets/img/iwapi.webp') ?>" alt="IWAPI"></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="logo-item"><img src="<?= base_url('assets/img/muslimat.webp') ?>" alt="Muslimat NU">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="logo-item"><img src="<?= base_url('assets/img/wis.png') ?>" alt="WIS"></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="logo-item"><img src="<?= base_url('assets/img/ibi.png') ?>" alt="IBI"></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="logo-item"><img src="<?= base_url('assets/img/bnn.webp') ?>" alt="BNN"></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="logo-item"><img src="<?= base_url('assets/img/pemkot.webp') ?>" alt="PEMKOT"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 mt-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold">Berita & Informasi Terkini</h3>
                <a href="<?= base_url('berita') ?>" class="btn btn-sm btn-outline-warning">Lihat Semua</a>
            </div>

            <div class="row g-4">
                <?php foreach ($latestPosts as $post): ?>
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0">

                            <div class="overflow-hidden rounded-top">
                                <img src="<?= base_url('uploads/' . $post['thumbnail']) ?>" class="card-img-top"
                                    style="height:220px; object-fit:cover;">
                            </div>

                            <div class="card-body p-4">

                                <div class="mb-2 text-muted small d-flex align-items-center">
                                    <i class="bi bi-calendar-event me-2 text-warning"></i>
                                    <span><?= tanggal_indonesia($post['created_at']) ?></span>
                                </div>

                                <h5 class="fw-bold mb-3">
                                    <a href="<?= base_url('berita/' . $post['slug']) ?>"
                                        class="text-decoration-none text-dark">
                                        <?= htmlspecialchars($post['title']) ?>
                                    </a>
                                </h5>

                                <p class="text-muted small">
                                    <?= htmlspecialchars(mb_substr(strip_tags($post['content']), 0, 100)) ?>...
                                </p>

                                <a href="<?= base_url('berita/' . $post['slug']) ?>"
                                    class="btn btn-sm btn-outline-warning mt-auto">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="agenda-section py-5" style="background-color: #fff8f0;">
        <div class="container">
            <div class="row align-items-center mb-4">
                <div class="col">
                    <h3 class="fw-bold text-dark">Agenda Kegiatan</h3>
                    <p class="text-muted">Jangan lewatkan kegiatan GOW mendatang</p>
                </div>
                <div class="col-auto">
                    <a href="<?= base_url('agenda') ?>" class="btn btn-outline-warning">Lihat Semua</a>
                </div>
            </div>

            <div class="row g-4">
                <?php if (empty($upcomingAgendas)): ?>
                    <div class="col-12 text-center text-muted">Belum ada agenda terdekat.</div>
                <?php else: ?>
                    <?php foreach ($upcomingAgendas as $agn): ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="d-flex bg-white rounded shadow-sm overflow-hidden h-100 position-relative hover-effect">

                                <?php $imgSrc = $agn['gambar'] ? base_url('uploads/' . $agn['gambar']) : base_url('assets/img/gow.webp'); ?>
                                <div class="position-relative" style="min-width: 110px; width: 110px;">
                                    <img src="<?= $imgSrc ?>" alt="Thumb" class="w-100 h-100 transition-zoom"
                                        style="object-fit: cover;">

                                    <div class="position-absolute top-0 start-0 bg-warning text-white text-center p-1 m-1 rounded shadow-sm"
                                        style="min-width: 40px; line-height: 1;">
                                        <span
                                            class="d-block fw-bold fs-6"><?= date('d', strtotime($agn['tanggal_mulai'])) ?></span>
                                        <small style="font-size: 0.6rem;"
                                            class="text-uppercase"><?= date('M', strtotime($agn['tanggal_mulai'])) ?></small>
                                    </div>
                                </div>

                                <div class="p-3 flex-grow-1 d-flex flex-column justify-content-center">
                                    <h6 class="fw-bold mb-1 lh-sm">
                                        <a href="<?= base_url('agenda/' . $agn['slug']) ?>"
                                            class="text-dark text-decoration-none stretched-link">
                                            <?= htmlspecialchars($agn['judul']) ?>
                                        </a>
                                    </h6>

                                    <div class="text-muted small mb-1 text-truncate">
                                        <i class="bi bi-clock text-warning me-1"></i>
                                        <?= date('H:i', strtotime($agn['waktu_mulai'])) ?> WIB
                                    </div>

                                    <div class="text-muted small text-truncate" style="max-width: 200px;">
                                        <i class="bi bi-geo-alt text-danger me-1"></i> <?= htmlspecialchars($agn['lokasi']) ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <style>
        /* Efek Zoom halus pas di hover */
        .hover-effect:hover .transition-zoom {
            transform: scale(1.1);
        }

        .transition-zoom {
            transition: transform 0.4s ease;
        }
    </style>

    <section class="py-5 bg-white overflow-hidden">
        <div class="container py-lg-4">
            <div class="row align-items-center g-5">

                <div class="col-lg-6 order-2 order-lg-1">
                    <h6 class="text-warning fw-bold text-uppercase mb-2" style="letter-spacing: 2px;">Tentang Kami</h6>
                    <h2 class="display-6 fw-bold text-dark mb-4">
                        LEBIH DEKAT DENGAN <br>
                        <span style="color: #ff7f00;">GOW Kota Tegal</span>
                    </h2>

                    <p class="text-secondary lead mb-4" style="line-height: 1.8;">
                        Sejak didirikan, Gabungan Organisasi Wanita (GOW) Kota Tegal berkomitmen menjadi wadah pemersatu
                        bagi seluruh organisasi wanita untuk berkarya, berdaya, dan berkontribusi bagi kemajuan kota.
                    </p>

                    <p class="text-muted mb-4">
                        Dengan semangat kebersamaan dan profesionalisme, kami bersinergi dengan pemerintah dan
                        masyarakat untuk memastikan hak-hak perempuan terpenuhi, serta menciptakan generasi emas yang
                        sehat dan cerdas di Kota Tegal.
                    </p>

                    <div class="p-4 rounded-3 mb-5 position-relative"
                        style="background: linear-gradient(to right, #fff8e1 10%, rgba(255, 255, 255, 0) 100%); border-left: 5px solid #ff7f00;">
                        <figure class="mb-0">
                            <blockquote class="blockquote">
                                <p class="mb-0 fw-bold fst-italic text-dark fs-6">
                                    "Perempuan Berdaya, Keluarga Sejahtera.<br>
                                    Bersama Kita Membangun Tegal yang Lebih Bermartabat."
                                </p>
                            </blockquote>
                        </figure>
                    </div>

                    <div class="d-flex align-items-center gap-3">
                        <span class="fw-bold text-uppercase text-muted small">Selengkapnya tentang Kami</span>
                        <a href="<?= base_url('about') ?>"
                            class="btn btn-warning rounded-circle text-white d-flex align-items-center justify-content-center shadow-sm hover-scale"
                            style="width: 50px; height: 50px;">
                            <i class="bi bi-arrow-right fs-4"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="row g-3">
                        <div class="col-12">
                            <img src="<?= base_url('assets/img/bersama.webp') ?>" alt="Kegiatan GOW Utama"
                                class="img-fluid rounded-4 shadow-sm w-100 object-fit-cover" style="height: 300px;">
                        </div>

                        <div class="col-6">
                            <img src="<?= base_url('assets/img/ttd.webp') ?>" alt="Kegiatan GOW 2"
                                class="img-fluid rounded-4 shadow-sm w-100 object-fit-cover" style="height: 200px;">
                        </div>
                        <div class="col-6">
                            <img src="<?= base_url('assets/img/pendopo.webp') ?>" alt="Kegiatan GOW 3"
                                class="img-fluid rounded-4 shadow-sm w-100 object-fit-cover" style="height: 200px;">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <style>
        .hover-scale {
            transition: transform 0.3s ease;
        }

        .hover-scale:hover {
            transform: scale(1.1);
            background-color: #e67300 !important;
            /* Warna oranye agak gelap pas hover */
        }

        .object-fit-cover {
            object-fit: cover;
        }
    </style>
    <?php include __DIR__ . '/partials/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="<?= base_url('assets/js/home.js') ?>"></script>
</body>

</html>