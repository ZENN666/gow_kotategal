<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GOW Kota Tegal | Website Resmi</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: #fff;
        }

        /* ================= NAVBAR (DYNAMIC ISLAND STYLE) ================= */
        .gow-navbar-wrapper {
            position: fixed;
            top: 16px;
            left: 0;
            width: 100%;
            z-index: 999;
            pointer-events: none;
        }

        .gow-navbar {
            pointer-events: auto;
            max-width: 1100px;
            margin: auto;
            background: rgba(255, 255, 255, 0.45);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border-radius: 999px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            padding: 10px 24px;
        }

        .gow-navbar .nav-link {
            font-weight: 500;
            color: #222;
            margin: 0 6px;
        }

        .gow-navbar .nav-link:hover {
            color: #ff7f00;
        }

        /* ================= HERO ================= */
        .hero {
            position: relative;
            min-height: 100vh;
            background: linear-gradient(120deg,
                    rgba(255, 127, 0, 0.98),
                    rgba(255, 167, 38, 0.95));
            overflow: hidden;
            display: flex;
            align-items: center;
            padding-top: 140px;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            color: #fff;
            max-width: 600px;
        }

        .hero small {
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 500;
            opacity: .9;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 900;
            line-height: 1.1;
        }

        .hero h1 span {
            color: #ffd600;
        }

        .hero p {
            font-size: 1.1rem;
            opacity: .95;
        }

        .btn-hero {
            background: #ffd600;
            color: #000;
            border-radius: 50px;
            padding: 12px 28px;
            font-weight: 600;
            border: none;
        }

        .hero-image img {
            max-height: 480px;
        }

        .hero::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 120px;
            background: #fff;
            clip-path: ellipse(70% 100% at 50% 100%);
            z-index: 1;
        }

        /* ================= STATS ================= */
        .stats {
            background: #fff;
            margin-top: -80px;
            border-radius: 24px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
            padding: 30px 20px;
            position: relative;
            z-index: 3;
        }

        .stat-item h2 {
            font-weight: 800;
            color: #ff7f00;
        }

        .stat-item span {
            font-size: .9rem;
            font-weight: 600;
            color: #444;
        }

        /* ================= CARD ================= */
        .card {
            border: none;
        }

        .card:hover {
            transform: translateY(-6px);
            transition: .3s;
            box-shadow: 0 15px 35px rgba(0, 0, 0, .15);
        }

        @media (max-width: 768px) {
            .hero {
                padding-top: 160px;
            }

            .hero h1 {
                font-size: 2.3rem;
            }

            .gow-navbar {
                border-radius: 24px;
            }
        }
    </style>
</head>

<body>

    <?php include __DIR__ . '/partials/navbar.php'; ?>

    <!-- ================= HERO ================= -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-md-6 hero-content">
                    <small>Bersama Gabungan Organisasi Wanita</small>
                    <h1 class="my-3">
                        Generasi Emas<br><span>Kota Tegal</span>
                    </h1>
                    <p>
                        Wadah koordinasi organisasi wanita dalam mendukung pembangunan dan
                        pemberdayaan perempuan di Kota Tegal.
                    </p>
                    <a href="<?= base_url('profil') ?>" class="btn btn-hero mt-3">
                        Selengkapnya →
                    </a>
                </div>

                <div class="col-md-6 hero-image text-md-end text-center">
                    <img src="<?= base_url('assets/img/og-default.png') ?>" class="img-fluid" loading="lazy"
                        alt="Hero GOW">
                </div>

            </div>
        </div>
    </section>

    <!-- ================= STATS ================= -->
    <section class="container">
        <div class="stats row text-center">

            <div class="col-md-3 col-6 stat-item">
                <h2>29+</h2>
                <span>ORGANISASI</span>
            </div>

            <div class="col-md-3 col-6 stat-item">
                <h2>500+</h2>
                <span>CABANG</span>
            </div>

            <div class="col-md-3 col-6 stat-item">
                <h2>5K+</h2>
                <span>RANTING</span>
            </div>

            <div class="col-md-3 col-6 stat-item">
                <h2>4K+</h2>
                <span>ANGGOTA</span>
            </div>

        </div>
    </section>

    <!-- ================= BERITA ================= -->
    <section class="py-5 mt-5">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold">Berita Terbaru</h3>
                <a href="<?= base_url('berita') ?>" class="btn btn-sm btn-outline-warning">
                    Lihat Semua
                </a>
            </div>

            <div class="row g-4">
                <?php foreach ($latestPosts as $post): ?>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <img src="<?= base_url('uploads/' . $post['thumbnail']) ?>" class="card-img-top"
                                style="height:220px;object-fit:cover;">
                            <div class="card-body">
                                <h5><?= htmlspecialchars($post['title']) ?></h5>
                                <p class="text-muted">
                                    <?= htmlspecialchars(mb_substr(strip_tags($post['content']), 0, 120)) ?>…
                                </p>
                                <a href="<?= base_url('berita/' . $post['slug']) ?>" class="btn btn-sm btn-outline-warning">
                                    Baca Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>

    <?php include __DIR__ . '/partials/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>