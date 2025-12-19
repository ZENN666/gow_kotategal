<?php
// app/Views/admin/berita/index.php
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
        <a href="<?= base_url('admin/berita/create') ?>" class="btn btn-primary mb-3">Tambah Berita</a>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Slug</th>
                    <th>Thumbnail</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post): ?>
                    <tr>
                        <td><?= htmlspecialchars($post['title']) ?></td>
                        <td><?= htmlspecialchars($post['slug']) ?></td>
                        <td>
                            <?php if ($post['thumbnail']): ?>
                                <img src="<?= base_url('uploads/' . $post['thumbnail']) ?>" style="height:50px;">
                            <?php endif; ?>
                        </td>
                        <td><?= date('d M Y', strtotime($post['created_at'])) ?></td>
                        <td>
                            <a href="<?= base_url('admin/berita/edit/' . $post['slug']) ?>"
                                class="btn btn-sm btn-warning">Edit</a>
                            <form action="<?= base_url('admin/berita/delete/' . $post['slug']) ?>" method="post"
                                style="display:inline-block;" onsubmit="return confirm('Hapus berita ini?')">
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if (empty($posts))
                    echo '<tr><td colspan="5">Belum ada berita.</td></tr>'; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>