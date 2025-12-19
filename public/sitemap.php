<?php
header("Content-Type: application/xml; charset=UTF-8");

require_once '../includes/db.php';

$baseUrl = 'https://localhost/gow_tgl/public';
// NANTI DI HOSTING GANTI JADI DOMAIN ASLI

echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <!-- HOME -->
    <url>
        <loc><?= $baseUrl ?>/</loc>
        <priority>1.00</priority>
    </url>

    <!-- LIST BERITA -->
    <url>
        <loc><?= $baseUrl ?>/berita.php</loc>
        <priority>0.80</priority>
    </url>

    <?php
    $stmt = $pdo->query("SELECT slug, created_at FROM posts ORDER BY created_at DESC");
    while ($row = $stmt->fetch()):
        ?>
        <url>
            <loc><?= $baseUrl ?>/berita/<?= htmlspecialchars($row['slug']) ?></loc>
            <lastmod><?= date('Y-m-d', strtotime($row['created_at'])) ?></lastmod>
            <priority>0.70</priority>
        </url>
    <?php endwhile; ?>

</urlset>