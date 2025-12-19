<?php

class HomeController
{
    public static function index()
    {
        global $pdo;

        $stmt = $pdo->query("
            SELECT id, title, slug, content, thumbnail, created_at
            FROM posts
            ORDER BY created_at DESC
            LIMIT 3
        ");

        $latestPosts = $stmt->fetchAll();

        require __DIR__ . '/../Views/home.php';
    }
}
