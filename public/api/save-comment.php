<?php
require_once __DIR__ . '/../../includes/db.php';

header('Content-Type: application/json');

$username = trim($_POST['username'] ?? '');
$content = trim($_POST['content'] ?? '');
$post_id = (int) ($_POST['post_id'] ?? 0);
$parent_id = $_POST['parent_id'] !== '' ? (int) $_POST['parent_id'] : null;

if ($username === '' || $content === '' || !$post_id) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Data tidak lengkap'
    ]);
    exit;
}

// cari / buat user berdasarkan username
$stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch();

if (!$user) {
    $pdo->prepare("INSERT INTO users (username, created_at) VALUES (?, NOW())")
        ->execute([$username]);
    $user_id = $pdo->lastInsertId();
} else {
    $user_id = $user['id'];
}

// simpan komentar
$pdo->prepare("
    INSERT INTO comments (post_id, user_id, parent_id, content, created_at)
    VALUES (?,?,?,?,NOW())
")->execute([$post_id, $user_id, $parent_id, $content]);

echo json_encode(['status' => 'ok']);
