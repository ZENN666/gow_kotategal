<?php
require_once __DIR__ . '/../includes/functions.php';
ensure_logged_in();
require_once __DIR__ . '/../includes/db.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$post = null;

if ($id) {
  $stmt = $pdo->prepare('SELECT * FROM posts WHERE id = ?');
  $stmt->execute([$id]);
  $post = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'];
  $author = $_POST['author'];
  $content = $_POST['content'];
  $slug = slugify($title);

  // handle thumbnail
  $thumbnailName = $post['thumbnail'] ?? null;
  if (!empty($_FILES['thumbnail']['name'])) {
    $ext = pathinfo($_FILES['thumbnail']['name'], PATHINFO_EXTENSION);
    $thumbnailName = time() . '-' . preg_replace('/[^a-z0-9\\-\\.]/', '-', strtolower($slug)) . '.' . $ext;
    move_uploaded_file(
      $_FILES['thumbnail']['tmp_name'],
      __DIR__ . '/../public/uploads/' . $thumbnailName
    );
  }

  if ($id) {
    $stmt = $pdo->prepare(
      'UPDATE posts SET title=?, author=?, slug=?, content=?, thumbnail=? WHERE id=?'
    );
    $stmt->execute([$title, $author, $slug, $content, $thumbnailName, $id]);
  } else {
    $stmt = $pdo->prepare(
      'INSERT INTO posts (title, author, slug, content, thumbnail)
             VALUES (?, ?, ?, ?, ?)'
    );
    $stmt->execute([$title, $author, $slug, $content, $thumbnailName]);
  }

  header('Location: posts.php');
  exit;
}
?>
<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $id ? 'Edit' : 'Tambah' ?> Berita</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">

  <h1><?= $id ? 'Edit' : 'Tambah' ?> Berita</h1>

  <form method="post" enctype="multipart/form-data">

    <div class="mb-3">
      <label class="form-label">Judul</label>
      <input name="title" class="form-control" value="<?= htmlspecialchars($post['title'] ?? '') ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Penulis</label>
      <input name="author" class="form-control" value="<?= htmlspecialchars($post['author'] ?? 'GOW Official') ?>"
        required>
    </div>

    <div class="mb-3">
      <label class="form-label">Thumbnail</label>
      <input type="file" name="thumbnail" class="form-control">
      <?php if (!empty($post['thumbnail'])): ?>
        <img src="../public/uploads/<?= htmlspecialchars($post['thumbnail']) ?>" style="max-width:150px;margin-top:8px;">
      <?php endif; ?>
    </div>

    <div class="mb-3">
      <label class="form-label">Konten</label>
      <textarea name="content" class="form-control" rows="8"><?= htmlspecialchars($post['content'] ?? '') ?></textarea>
    </div>

    <button class="btn btn-primary">Simpan</button>
    <a href="posts.php" class="btn btn-secondary">Kembali</a>
  </form>

</body>

</html>