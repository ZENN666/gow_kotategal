<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= htmlspecialchars($title ?? 'GOW Kota Tegal') ?></title>
    <meta name="description" content="<?= htmlspecialchars($description ?? '') ?>">

    <?php if (isset($canonical) && $canonical): ?>
        <link rel="canonical" href="<?= htmlspecialchars($canonical) ?>">
    <?php endif; ?>

    <!-- Open Graph -->
    <meta property="og:type" content="<?= htmlspecialchars($og_type ?? 'website') ?>">
    <meta property="og:title" content="<?= htmlspecialchars($title ?? 'GOW Kota Tegal') ?>">
    <meta property="og:description" content="<?= htmlspecialchars($description ?? '') ?>">
    <meta property="og:url" content="<?= htmlspecialchars($og_url ?? base_url()) ?>">
    <meta property="og:image" content="<?= htmlspecialchars($og_img ?? base_url('assets/img/hero.png')) ?>">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/navbar.css') ?>">

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            font-family: 'Roboto', sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            background: #fff;
        }

        /* OFFSET GLOBAL karena navbar fixed */
        main {
            flex: 1 0 auto;
            padding-top: 140px;
        }

        footer {
            flex-shrink: 0;
        }

        /* Konten berita */
        article.content {
            white-space: pre-line;
            word-wrap: break-word;
            overflow-wrap: break-word;
            line-height: 1.6;
        }

        @media (max-width: 768px) {
            main {
                padding-top: 160px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR (Dynamic Island – SAMA DENGAN HOME) -->
    <?php include __DIR__ . '/navbar.php'; ?>

    <main>
        <?= $content ?? '' ?>
    </main>

    <?php include __DIR__ . '/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>