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

    <!-- Twitter Card (opsional) -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= htmlspecialchars($title ?? 'GOW Kota Tegal') ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($description ?? '') ?>">
    <meta name="twitter:image" content="<?= htmlspecialchars($og_img ?? base_url('assets/img/hero.png')) ?>">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

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
        }

        main {
            flex: 1 0 auto;
        }

        footer {
            flex-shrink: 0;
        }

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

        .btn-primary {
            border-radius: 50px;
            padding: 10px 25px;
            font-weight: 500;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background-color: #007bffcc;
        }

        .card:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease-in-out;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

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

        footer {
            background: #f8f9fa;
            padding: 40px 0;
        }

        /* Konten berita agar wrap rapi */
        article.content {
            white-space: pre-line;
            word-wrap: break-word;
            overflow-wrap: break-word;
            line-height: 1.6;
        }
    </style>
</head>

<body>

    <?php include __DIR__ . '/navbar.php'; ?>

    <main>
        <?php if (isset($content))
            echo $content; ?>
    </main>

    <?php include __DIR__ . '/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>