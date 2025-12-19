<?php

class HomeController
{
    public function index()
    {
        global $pdo;

        $stmt = $pdo->query(
            "SELECT id, title, slug, thumbnail, content, created_at
             FROM berita
             ORDER BY created_at DESC
             LIMIT 3"
        );

        // INI YANG PENTING
        $latestPosts = $stmt->fetchAll();

        // OPTIONAL: metadata biar gak undefined
        $og_title = 'Beranda - GOW Kota Tegal';
        $og_desc = 'Gabungan Organisasi Wanita Kota Tegal';
        $og_url = base_url();
        $og_img = base_url('assets/img/hero.png');

        include __DIR__ . '/../Views/home.php';
    }
}
