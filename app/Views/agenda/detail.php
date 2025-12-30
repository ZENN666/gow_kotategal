<?php
// --- SETUP DATA ---
// Bersihkan teks
$clean_text = preg_replace('/^\s+|\s+$/u', '', $agenda['deskripsi']);
$meta_desc = mb_substr(strip_tags($clean_text), 0, 150) . '...';

$meta_image = $agenda['gambar'] ? base_url('uploads/' . $agenda['gambar']) : base_url('assets/img/gow.webp');
$current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$share_text = "Jangan lewatkan kegiatan ini: " . $agenda['judul'];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($agenda['judul']) ?> | Agenda GOW</title>

    <meta property="og:title" content="<?= htmlspecialchars($agenda['judul']) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($meta_desc) ?>">
    <meta property="og:image" content="<?= $meta_image ?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

    <style>
        .info-box {
            background-color: #fff8e1;
            border-left: 4px solid #ffc107;
        }

        /* Konfigurasi Gambar Flyer */
        .flyer-card {
            background-color: #fff;
            border: none;
            overflow: hidden;
            max-height: 600px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .flyer-img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
        }

        /* Tombol Share */
        .btn-share {
            border: none;
            font-size: 0.9rem;
            transition: 0.3s;
        }

        .btn-share:hover {
            transform: translateY(-2px);
        }

        .btn-wa {
            background-color: #25D366;
            color: white;
        }

        .btn-fb {
            background-color: #1877F2;
            color: white;
        }

        .btn-copy {
            background-color: #6c757d;
            color: white;
        }
    </style>
</head>

<body class="bg-light">

    <?php include __DIR__ . '/../partials/navbar.php'; ?>

    <div class="container py-5 mb-5" style="margin-top: 100px;">

        <div class="mb-4">
            <a href="<?= base_url('agenda') ?>" class="text-decoration-none text-muted fw-bold">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="row g-4 align-items-start">

            <div class="col-lg-5">
                <div class="card shadow-sm flyer-card">
                    <?php if ($agenda['gambar']): ?>
                        <img src="<?= base_url('uploads/' . $agenda['gambar']) ?>" class="flyer-img" alt="Flyer">
                    <?php else: ?>
                        <div class="py-5 text-muted text-center"><i class="bi bi-image fs-1"></i><br>Tidak ada flyer</div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card shadow-sm border-0 p-4 p-md-5">

                    <div class="mb-4">
                        <span class="badge bg-warning text-dark mb-2">Agenda Kegiatan</span>
                        <h1 class="fw-bold text-dark lh-sm"><?= htmlspecialchars($agenda['judul']) ?></h1>
                    </div>

                    <div class="info-box p-3 rounded mb-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <small class="text-muted fw-bold d-block text-uppercase mb-1">Waktu</small>
                                <div class="fw-bold"><i class="bi bi-calendar-check text-warning me-2"></i>
                                    <?= tanggal_indonesia($agenda['tanggal_mulai']) ?></div>
                                <div><i class="bi bi-clock text-warning me-2"></i>
                                    <?= date('H:i', strtotime($agenda['waktu_mulai'])) ?> WIB</div>
                            </div>
                            <div class="col-md-6 border-start border-warning-subtle ps-md-4">
                                <small class="text-muted fw-bold d-block text-uppercase mb-1">Lokasi</small>
                                <div class="fw-semibold"><i class="bi bi-geo-alt-fill text-danger me-2"></i>
                                    <?= htmlspecialchars($agenda['lokasi']) ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="agenda-desc mb-4">
                        <h5 class="fw-bold fs-6 border-bottom pb-2 mb-3">Deskripsi :</h5>
                        <div class="text-secondary"
                            style="white-space: pre-wrap; word-wrap: break-word; text-align: justify; margin-top:0;">
                            <?= htmlspecialchars(preg_replace('/^\s+|\s+$/u', '', $agenda['deskripsi'])) ?></div>
                    </div>

                    <div class="pt-3 border-top">
                        <small class="text-muted fw-bold mb-2 d-block text-uppercase"
                            style="font-size:0.75rem;">Bagikan:</small>
                        <div class="d-flex gap-2">
                            <a href="https://api.whatsapp.com/send?text=<?= urlencode($share_text . " " . $current_url) ?>"
                                target="_blank" class="btn btn-share btn-wa px-3 py-2 rounded-pill">
                                <i class="bi bi-whatsapp"></i> WhatsApp
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode($current_url) ?>"
                                target="_blank" class="btn btn-share btn-fb px-3 py-2 rounded-pill">
                                <i class="bi bi-facebook"></i> Facebook
                            </a>
                            <button onclick="copyLink()" class="btn btn-share btn-copy px-3 py-2 rounded-pill"
                                id="btnCopy">
                                <i class="bi bi-link-45deg"></i> Salin
                            </button>
                        </div>
                        <div id="copyOk" class="text-success small mt-2 d-none fw-bold">Link tersalin!</div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <?php include __DIR__ . '/../partials/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function copyLink() {
            navigator.clipboard.writeText(window.location.href).then(() => {
                document.getElementById('copyOk').classList.remove('d-none');
                setTimeout(() => document.getElementById('copyOk').classList.add('d-none'), 2000);
            });
        }
    </script>
</body>

</html>