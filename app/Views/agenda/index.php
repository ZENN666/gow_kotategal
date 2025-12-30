<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agenda Kegiatan | GOW Kota Tegal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>

<body class="bg-light">

    <?php include __DIR__ . '/../partials/navbar.php'; ?>

    <div class="container py-5 mb-5" style="margin-top: 100px;">

        <div class="text-center mb-5">
            <h2 class="fw-bold text-uppercase" style="color: #ff7f00;">Agenda Kegiatan</h2>
            <p class="text-muted">Jadwal kegiatan dan acara mendatang GOW Kota Tegal</p>
            <hr class="mx-auto" style="width: 80px; border: 2px solid #ff7f00; opacity: 1;">
        </div>

        <div class="row g-4">
            <?php if (empty($agendas)): ?>
                <div class="col-12 text-center py-5">
                    <div class="alert alert-warning d-inline-block px-5 py-3 shadow-sm border-0">
                        <i class="bi bi-calendar-x me-2 fs-5"></i> <span class="fw-medium">Belum ada jadwal kegiatan
                            mendatang.</span>
                    </div>
                </div>
            <?php else: ?>
                <?php foreach ($agendas as $agn): ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm border-0 hover-effect">

                            <div class="position-absolute top-0 start-0 bg-warning text-white p-2 m-3 rounded text-center fw-bold shadow-sm"
                                style="width: 60px; z-index: 10;">
                                <span class="d-block fs-4 lh-1"><?= date('d', strtotime($agn['tanggal_mulai'])) ?></span>
                                <small class="text-uppercase"
                                    style="font-size: 0.7rem;"><?= date('M', strtotime($agn['tanggal_mulai'])) ?></small>
                            </div>

                            <?php $imgSrc = $agn['gambar'] ? base_url('uploads/' . $agn['gambar']) : 'https://via.placeholder.com/600x400/eee/999?text=GOW+Tegal'; ?>
                            <div class="overflow-hidden rounded-top">
                                <img src="<?= $imgSrc ?>" class="card-img-top transition-zoom"
                                    style="height: 220px; object-fit: cover; transition: 0.3s;"
                                    alt="<?= htmlspecialchars($agn['judul']) ?>">
                            </div>

                            <div class="card-body">
                                <h5 class="card-title fw-bold">
                                    <a href="<?= base_url('agenda/' . $agn['slug']) ?>"
                                        class="text-decoration-none text-dark stretched-link">
                                        <?= htmlspecialchars($agn['judul']) ?>
                                    </a>
                                </h5>
                                <div class="mb-3 text-muted small">
                                    <i class="bi bi-clock me-1 text-warning"></i>
                                    <?= date('H:i', strtotime($agn['waktu_mulai'])) ?> WIB
                                    &nbsp;|&nbsp;
                                    <i class="bi bi-geo-alt me-1 text-danger"></i> <?= htmlspecialchars($agn['lokasi']) ?>
                                </div>
                                <p class="card-text text-secondary small">
                                    <?= htmlspecialchars(mb_substr(strip_tags($agn['deskripsi']), 0, 80)) ?>...
                                </p>
                            </div>
                            <div class="card-footer bg-white border-top-0 pb-4 pt-0">
                                <span class="text-warning fw-bold small" style="font-size: 0.8rem;">LIHAT DETAIL <i
                                        class="bi bi-arrow-right ms-1"></i></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <?php include __DIR__ . '/../partials/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .hover-effect:hover .transition-zoom {
            transform: scale(1.05);
        }
    </style>
</body>

</html>