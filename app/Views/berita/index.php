<?php
$title = 'Berita GOW Kota Tegal';
ob_start();
?>

<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

<style>
    /* PAGE SPECIFIC CSS: HERO BERITA */
    .page-hero {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 350px;
        background: linear-gradient(rgba(255, 140, 0, 0.5),
                rgba(255, 100, 0, 1)), url("<?= base_url('assets/img/alun.webp') ?>");
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: flex-end;
        /* Teks di bawah */
        padding-bottom: 60px;
        color: #fff;
        border-bottom-left-radius: 48px;
        border-bottom-right-radius: 48px;
        overflow: hidden;
        z-index: 1;
    }

    .page-hero h1 {
        font-size: 3rem;
        font-weight: 800;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        margin-bottom: 0;
    }

    .hero-spacer {
        height: 450px;
    }

    .content-section {
        margin-top: -250px;
        padding-top: 80px;
    }

    /* RESPONSIVE MOBILE */
    @media (max-width: 768px) {
        .page-hero {
            height: 320px;
            border-bottom-left-radius: 28px;
            border-bottom-right-radius: 28px;
            padding-bottom: 40px;
        }

        .hero-spacer {
            height: 380px;
        }

        .content-section {
            margin-top: -100px;
            padding-top: 60px;
        }

        .page-hero h1 {
            font-size: 2rem;
            text-align: center;
            width: 100%;
        }
    }
</style>

<?php include __DIR__ . '/../partials/navbar.php'; ?>

<section class="page-hero">
    <div class="container">
        <h1>Berita & Informasi Terkini</h1>
    </div>
</section>

<div class="hero-spacer"></div>

<section class="py-5 bg-light content-section">
    <div class="container">
        <div class="row g-4">
            <?php if (empty($posts)): ?>
                <div class="col-12 text-center py-5">
                    <p class="text-muted fs-5">Belum ada berita yang diterbitkan.</p>
                </div>
            <?php endif; ?>

            <?php foreach ($posts as $post): ?>
                <div class="col-md-4">
                    <div class="card shadow-sm h-100 border-0">
                        <?php if (!empty($post['thumbnail'])): ?>
                            <div class="overflow-hidden rounded-top">
                                <img src="<?= base_url('uploads/' . $post['thumbnail']) ?>" class="card-img-top transition-zoom"
                                    style="height:220px; object-fit:cover; transition: transform 0.3s ease;"
                                    alt="<?= htmlspecialchars($post['title']) ?>">
                            </div>
                        <?php endif; ?>

                        <div class="card-body d-flex flex-column p-4">

                            <div class="mb-2 text-muted small d-flex align-items-center">
                                <i class="bi bi-calendar-event me-2 text-warning"></i>
                                <span class="fw-medium"><?= tanggal_indonesia($post['created_at']) ?></span>
                            </div>

                            <h5 class="card-title fw-bold mb-3 text-dark">
                                <?= htmlspecialchars($post['title']) ?>
                            </h5>

                            <p class="card-text text-muted flex-grow-1 small" style="line-height: 1.6;">
                                <?= htmlspecialchars(mb_substr(strip_tags($post['content']), 0, 110)) ?>...
                            </p>

                            <a href="<?= base_url('berita/' . $post['slug']) ?>"
                                class="btn btn-outline-warning w-100 fw-bold mt-3 rounded-pill">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
require __DIR__ . '/../partials/layout.php';
?>