<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($og_title) ?></title>
    <meta name="description" content="<?= htmlspecialchars($og_desc) ?>">
    <link rel="canonical" href="<?= $og_url ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= htmlspecialchars($og_title) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($og_desc) ?>">
    <meta property="og:url" content="<?= $og_url ?>">
    <meta property="og:image" content="<?= $og_img ?>">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #f9f9f9 0%, #e0f7fa 100%);
            padding: 80px 0;
        }

        .hero h1 {
            font-size: 2.8rem;
            line-height: 1.2;
        }

        .hero p {
            font-size: 1.1rem;
        }

        /* Button style */
        .btn-primary {
            border-radius: 50px;
            padding: 10px 25px;
            font-weight: 500;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background-color: #007bffcc;
        }

        /* Card hover effect */
        .card:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease-in-out;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        /* Section headers */
        .section-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            position: relative;
        }

        .section-title::after {
            content: '';
            width: 60px;
            height: 3px;
            background: #007bff;
            display: block;
            margin-top: 8px;
            border-radius: 2px;
        }

        /* Footer */
        footer {
            background: #f8f9fa;
            padding: 40px 0;
        }
    </style>
</head>

<body>

    <?php include __DIR__ . '/partials/navbar.php'; ?>

    <!-- ================= HERO ================= -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <h1 class="fw-bold">
                        Gabungan Organisasi Wanita<br>Kota Tegal
                    </h1>
                    <p class="text-muted mt-3">
                        Wadah koordinasi organisasi wanita dalam mendukung pembangunan dan
                        pemberdayaan perempuan di Kota Tegal.
                    </p>
                    <a href="<?= base_url('profil') ?>" class="btn btn-primary mt-3">
                        Tentang Kami
                    </a>
                </div>
                <div class="col-md-6 text-center">
                    <img src="<?= base_url('assets/img/hero.png') ?>" class="img-fluid rounded shadow" loading="lazy">
                </div>
            </div>
        </div>
    </section>

    <!-- ================= BERITA TERBARU ================= -->
    <section class="py-5">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="section-title">Berita Terbaru</h3>
                <a href="<?= base_url('berita') ?>" class="btn btn-sm btn-primary">
                    Lihat Semua
                </a>
            </div>

            <div class="row g-4">
                <?php if (empty($latestPosts)): ?>
                    <p class="text-muted">Belum ada berita.</p>
                <?php endif; ?>

                <?php foreach ($latestPosts as $post): ?>
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="<?= base_url('uploads/' . $post['thumbnail']) ?>" class="card-img-top"
                                style="height:220px;object-fit:cover;" alt="<?= htmlspecialchars($post['title']) ?>">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?= htmlspecialchars($post['title']) ?></h5>
                                <p class="text-muted mb-3 flex-grow-1">
                                    <?= htmlspecialchars(
                                        mb_substr(strip_tags($post['content']), 0, 120)
                                    ) ?>…
                                </p>
                                <a href="<?= base_url('berita/' . $post['slug']) ?>"
                                    class="btn btn-outline-primary btn-sm mt-auto">
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