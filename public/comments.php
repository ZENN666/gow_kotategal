<?php
require_once __DIR__ . '/includes/db.php';
session_start();

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post_id = $_POST['post_id'];
    $parent_id = $_POST['parent_id'] ?: NULL;
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'] ?? null;

    if (!$user_id) {
        echo json_encode(['error' => 'Login dulu']);
        exit;
    }

    $stmt = $pdo->prepare("INSERT INTO comments (post_id,user_id,parent_id,content) VALUES (?,?,?,?)");
    $stmt->execute([$post_id, $user_id, $parent_id, $content]);

    echo json_encode(['success' => true]);
    exit;
}

// GET comments
$post_id = $_GET['post_id'];
$stmt = $pdo->prepare("SELECT c.*, u.name, u.avatar, u.role FROM comments c JOIN users u ON c.user_id=u.id WHERE c.post_id=? ORDER BY c.created_at ASC");
$stmt->execute([$post_id]);
$comments = $stmt->fetchAll();

echo json_encode($comments);
