<?php
// app/Views/admin/berita/edit.php
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4"><?= $title ?></h1>
        <a href="<?= base_url('admin/berita') ?>" class="btn btn-secondary mb-3">← Kembali</a>

        <form action="<?= base_url('admin/berita/update/' . $post['slug']) ?>" method="post"
            enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Judul Berita</label>
                <input type="text" name="title" id="title" class="form-control"
                    value="<?= htmlspecialchars($post['title']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Konten</label>
                <textarea name="content" id="content" rows="6" class="form-control"
                    required><?= htmlspecialchars($post['content']) ?></textarea>
            </div>

            <div class="mb-3">
                <label for="thumbnail" class="form-label">Thumbnail</label>
                <?php if ($post['thumbnail']): ?>
                    <div class="mb-2">
                        <img src="<?= base_url('uploads/' . $post['thumbnail']) ?>" style="height:100px;">
                    </div>
                <?php endif; ?>
                <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>