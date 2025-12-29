<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GOW Kota Tegal | Website Resmi</title>

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
                        <div class="logo-item"><img src="<?= base_url('assets/img/hwk.png') ?>" alt="HWK"></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="logo-item"><img src="<?= base_url('assets/img/iwapi.png') ?>" alt="IWAPI"></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="logo-item"><img src="<?= base_url('assets/img/muslimat-nu.png') ?>"
                                alt="Muslimat NU"></div>
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
                        <div class="logo-item"><img src="https://via.placeholder.com/150x80/eee/999?text=Salimah"
                                alt="Partner"></div>
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
                        <div class="card h-100">
                            <img src="<?= base_url('uploads/' . $post['thumbnail']) ?>" class="card-img-top"
                                style="height:220px;object-fit:cover;">
                            <div class="card-body">
                                <h5><?= htmlspecialchars($post['title']) ?></h5>
                                <p class="text-muted">
                                    <?= htmlspecialchars(mb_substr(strip_tags($post['content']), 0, 120)) ?>…
                                </p>
                                <a href="<?= base_url('berita/' . $post['slug']) ?>"
                                    class="btn btn-sm btn-outline-warning">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php include __DIR__ . '/partials/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Stats Counter Logic
            const counters = document.querySelectorAll(".count-up");
            const duration = 1500;
            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute("data-count"), 10);
                let startTime = null;
                function animateCount(timestamp) {
                    if (!startTime) startTime = timestamp;
                    const progress = Math.min((timestamp - startTime) / duration, 1);
                    const current = Math.floor(progress * target);
                    counter.innerText = current + "+";
                    if (progress < 1) requestAnimationFrame(animateCount);
                    else counter.innerText = target + "+";
                }
                requestAnimationFrame(animateCount);
            });

            // Swiper Logic
            var swiperLogo = new Swiper(".logo-swiper", {
                slidesPerView: 2, spaceBetween: 20, loop: true, grabCursor: true, speed: 4000,
                autoplay: { delay: 0, disableOnInteraction: false, pauseOnMouseEnter: true },
                breakpoints: { 576: { slidesPerView: 3, spaceBetween: 30 }, 768: { slidesPerView: 4, spaceBetween: 40 }, 1024: { slidesPerView: 5, spaceBetween: 50 }, 1200: { slidesPerView: 6, spaceBetween: 60 } }
            });
        });
    </script>
</body>

</html>