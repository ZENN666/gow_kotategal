<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Kelola Berita</h3>
            <a href="<?= base_url('admin/berita/create') ?>" class="btn btn-primary">
                + Tambah Berita
            </a>
        </div>

        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th style="width:5%">#</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th style="width:15%">Tanggal</th>
                    <th style="width:20%">Aksi</th>
                </tr>
            </thead>
            <tbody>

                <?php if (empty($posts)): ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            Belum ada berita
                        </td>
                    </tr>
                <?php endif; ?>

                <?php foreach ($posts as $i => $post): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= htmlspecialchars($post['title']) ?></td>
                        <td><?= htmlspecialchars($post['author'] ?? '-') ?></td>
                        <td><?= date('d M Y', strtotime($post['created_at'])) ?></td>
                        <td>
                            <a href="<?= base_url('admin/berita/edit/' . $post['slug']) ?>" class="btn btn-sm btn-warning">
                                Edit
                            </a>

                            <form action="<?= base_url('admin/berita/delete/' . $post['slug']) ?>" method="POST"
                                style="display:inline-block" onsubmit="return confirm('Yakin hapus berita ini?')">
                                <button class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>

    </div>

</body>

</html>