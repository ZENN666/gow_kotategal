<?php
// app/Views/admin/berita/create.php
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

        <form action="<?= base_url('admin/berita/store') ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Judul Berita</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Konten</label>
                <textarea name="content" id="content" rows="6" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="thumbnail" class="form-label">Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>