<?php
class BeritaController
{
    public function index()
    {
        global $pdo;

        $stmt = $pdo->query(
            "SELECT id, title, author, slug, thumbnail, content, created_at
FROM berita
ORDER BY created_at DESC"
        );

        $posts = $stmt->fetchAll();

        $title = 'Berita - GOW Kota Tegal';
        include __DIR__ . '/../Views/berita/index.php';
    }

    public function detail(string $slug)
    {
        global $pdo;

        $stmt = $pdo->prepare(
            "SELECT id, title, author, slug, thumbnail, content, created_at
FROM berita
WHERE slug = :slug
LIMIT 1"
        );

        $stmt->execute(['slug' => $slug]);
        $post = $stmt->fetch();

        if (!$post) {
            http_response_code(404);
            echo 'Berita tidak ditemukan';
            exit;
        }

        $title = $post['title'];
        include __DIR__ . '/../Views/berita/detail.php';
    }
}