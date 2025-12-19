<?php

class BeritaController
{
    public static function index()
    {
        global $pdo;

        $stmt = $pdo->query("
            SELECT title, slug, content, thumbnail, created_at
            FROM posts
            ORDER BY created_at DESC
        ");

        $posts = $stmt->fetchAll();

        // SEO
        $title = 'Berita - GOW Kota Tegal';

        require __DIR__ . '/../Views/berita/index.php';
    }

    public static function detail(string $slug)
    {
        global $pdo;

        $stmt = $pdo->prepare("
            SELECT *
            FROM posts
            WHERE slug = ?
            LIMIT 1
        ");
        $stmt->execute([$slug]);
        $post = $stmt->fetch();

        if (!$post) {
            http_response_code(404);
            echo 'Berita tidak ditemukan';
            return;
        }

        // SEO
        $title = $post['title'] . ' - GOW Kota Tegal';

        require __DIR__ . '/../Views/berita/detail.php';
    }
}
