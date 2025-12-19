<?php
require_once __DIR__ . '/../includes/db.php';

/**
 * ==========================
 * BASE URL HELPER
 * ==========================
 */
function base_url(string $path = ''): string
{
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    return $scheme . '://' . $_SERVER['HTTP_HOST'] . $path;
}

/**
 * ==========================
 * LOAD GALERI FILES
 * folder: /public/uploads
 * ==========================
 */
$uploadDir = __DIR__ . '/uploads';
$files = glob($uploadDir . '/*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Galeri - GOW Kota Tegal</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- GLOBAL STYLE -->
    <link rel="stylesheet" href="<?= base_url('/assets/css/style.css') ?>">

    <!-- GALERI STYLE -->
    <style>
        .modal-backdrop.show {
            opacity: .85;
        }

        .modal-content.bg-dark {
            background-color: rgba(0, 0, 0, .92);
            border: none;
        }

        .modal .btn-close {
            position: absolute;
            top: 1rem;
            right: 1rem;
            z-index: 1056;
        }

        .btn-close-white {
            filter: invert(1);
        }

        .gallery-thumb {
            cursor: pointer;
            aspect-ratio: 1 / 1;
            object-fit: cover;
            transition: transform .2s ease;
        }

        .gallery-thumb:hover {
            transform: scale(1.03);
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    <?php include __DIR__ . '/partials/navbar.php'; ?>

    <main class="flex-fill">
        <div class="container py-5">
            <h1 class="fw-bold mb-4">Galeri</h1>

            <?php if (empty($files)): ?>
                <p class="text-muted">Belum ada foto.</p>
            <?php else: ?>
                <div class="row g-4">
                    <?php foreach ($files as $index => $file): ?>
                        <?php $name = basename($file); ?>
                        <div class="col-6 col-md-4 col-lg-3">
                            <img src="<?= base_url('/uploads/' . $name) ?>" alt="Galeri GOW Kota Tegal"
                                class="img-fluid rounded shadow-sm gallery-thumb" loading="lazy" data-bs-toggle="modal"
                                data-bs-target="#galleryModal" data-index="<?= $index ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <?php include __DIR__ . '/partials/footer.php'; ?>

    <!-- ================= MODAL GALERI ================= -->
    <div class="modal fade" id="galleryModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content bg-dark">

                <!-- CLOSE -->
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>

                <div class="modal-body p-0">
                    <div id="galleryCarousel" class="carousel slide" data-bs-touch="true" data-bs-interval="false">

                        <div class="carousel-inner">
                            <?php foreach ($files as $i => $file): ?>
                                <?php $name = basename($file); ?>
                                <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
                                    <div class="d-flex justify-content-center align-items-center" style="min-height:80vh;">
                                        <img src="<?= base_url('/uploads/' . $name) ?>" class="img-fluid rounded"
                                            style="max-height:80vh; object-fit:contain;">
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- NAV -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>

                        <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- GALERI JS -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modalEl = document.getElementById('galleryModal');
            const carouselEl = document.getElementById('galleryCarousel');

            const carousel = bootstrap.Carousel.getOrCreateInstance(carouselEl, {
                touch: true,
                interval: false
            });

            document.querySelectorAll('.gallery-thumb').forEach((img, index) => {
                img.addEventListener('click', () => {
                    carousel.to(index);
                });
            });

            modalEl.addEventListener('hidden.bs.modal', () => {
                carousel.to(0);
            });
        });
    </script>

</body>

</html>