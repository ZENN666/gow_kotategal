<?php
require_once __DIR__ . '/../includes/functions.php';
ensure_logged_in();
require_once __DIR__ . '/../includes/db.php';

if (isset($_GET['delete'])) {
  $id = (int) $_GET['delete'];

  // ambil thumbnail dan hapus
  $stmt = $pdo->prepare('SELECT thumbnail FROM posts WHERE id = ?');
  $stmt->execute([$id]);
  $row = $stmt->fetch();

  if ($row && $row['thumbnail']) {
    @unlink(__DIR__ . '/../public/uploads/' . $row['thumbnail']);
  }

  $pdo->prepare('DELETE FROM posts WHERE id = ?')->execute([$id]);
  header('Location: posts.php');
  exit;
}

$posts = $pdo->query('SELECT * FROM posts ORDER BY created_at DESC')->fetchAll();
?>
<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kelola Berita</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">

  <h1>Kelola Berita</h1>
  <p>
    <a href="post_edit.php" class="btn btn-success">Tambah Berita</a>
  </p>

  <table class="table table-bordered align-middle">
    <thead class="table-light">
      <tr>
        <th>#</th>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Tanggal</th>
        <th width="150">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($posts as $p): ?>
        <tr>
          <td><?= htmlspecialchars($p['id']) ?></td>
          <td><?= htmlspecialchars($p['title']) ?></td>
          <td><?= htmlspecialchars($p['author']) ?></td>
          <td><?= date('d M Y', strtotime($p['created_at'])) ?></td>
          <td>
            <a class="btn btn-sm btn-primary" href="post_edit.php?id=<?= $p['id'] ?>">Edit</a>
            <a class="btn btn-sm btn-danger" href="posts.php?delete=<?= $p['id'] ?>"
              onclick="return confirm('Hapus berita ini?')">Hapus</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</body>

</html>