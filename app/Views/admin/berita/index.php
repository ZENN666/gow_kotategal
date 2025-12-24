<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f6fa;
        }

        /* App Bar */
        .app-bar {
            background-color: #ff7f00;
            color: #fff;
            padding: 16px 24px;
            margin-bottom: 20px;
        }

        .app-bar h4 {
            margin: 0;
            font-weight: 600;
        }

        .page-header {
            margin-bottom: 1rem;
        }

        .card {
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .table th {
            background-color: #f8f9fc;
            font-weight: 600;
        }

        .btn-icon {
            padding: .25rem .6rem;
            font-size: .85rem;
        }
    </style>
</head>

<body>

    <!-- App Bar -->
    <div class="app-bar">
        <h4>Kelola Berita</h4>
    </div>

    <div class="container-fluid px-4 pb-4">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Kelola Berita</li>
            </ol>
        </nav>

        <!-- Header -->
        <div class="page-header">
            <h5 class="mb-2">Daftar Berita</h5>
            <a href="<?= base_url('admin/berita/create') ?>" class="btn btn-success">
                + Tambah Berita
            </a>
        </div>

        <!-- Card -->
        <div class="card mt-3">
            <div class="card-body p-0">

                <table class="table table-hover align-middle mb-0">
                    <thead>
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
                                <td colspan="5" class="text-center text-muted py-4">
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
                                    <a href="<?= base_url('admin/berita/edit/' . $post['slug']) ?>"
                                        class="btn btn-sm btn-success btn-icon">
                                        Edit
                                    </a>

                                    <form action="<?= base_url('admin/berita/delete/' . $post['slug']) ?>" method="POST"
                                        style="display:inline-block" onsubmit="return confirm('Yakin hapus berita ini?')">
                                        <button class="btn btn-sm btn-danger btn-icon">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>

            </div>
        </div>

    </div>

</body>

</html>