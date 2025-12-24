<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Berita</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

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

        .card {
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        textarea#content {
            min-height: 300px;
            resize: vertical;
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
                <li class="breadcrumb-item">
                    <a href="<?= base_url('admin/berita') ?>">Kelola Berita</a>
                </li>
                <li class="breadcrumb-item active">Tambah Berita</li>
            </ol>
        </nav>

        <!-- Header -->
        <div class="mb-3">
            <h5 class="mb-0">Tambah Berita</h5>
        </div>

        <!-- Card -->
        <div class="card">
            <div class="card-body">

                <form method="POST" action="<?= BASE_PATH ?>/admin/berita/store" enctype="multipart/form-data">

                    <!-- Judul -->
                    <div class="mb-4">
                        <label for="title" class="form-label fw-semibold">Judul Berita</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Judul Berita"
                            required>
                    </div>

                    <!-- Penulis -->
                    <div class="mb-4">
                        <label for="author" class="form-label fw-semibold">Penulis</label>
                        <input type="text" class="form-control" id="author" name="author" placeholder="Nama Penulis"
                            required>
                    </div>

                    <!-- Thumbnail -->
                    <div class="mb-4">
                        <label for="thumbnail" class="form-label fw-semibold">Thumbnail</label>
                        <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                        <small class="text-muted">JPG / PNG, max 2MB</small>
                    </div>

                    <!-- Caption Thumbnail -->
                    <div class="mb-4">
                        <label for="thumbnail_caption" class="form-label fw-semibold">
                            Deskripsi Gambar
                        </label>
                        <input type="text" class="form-control" id="thumbnail_caption" name="thumbnail_caption"
                            placeholder="Contoh: Kegiatan rapat GOW Kota Tegal">
                        <small class="text-muted">
                            Teks kecil di bawah gambar (opsional)
                        </small>
                    </div>

                    <!-- Isi -->
                    <div class="mb-5">
                        <label for="content" class="form-label fw-semibold">Isi Berita</label>
                        <textarea class="form-control" id="content" name="content"
                            placeholder="Tulis isi berita di sini..." required></textarea>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex gap-3">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save me-1"></i> Simpan Berita
                        </button>
                        <a href="<?= base_url('admin/berita') ?>" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>

                </form>

            </div>
        </div>

    </div>

</body>

</html>