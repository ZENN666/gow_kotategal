<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">

                <div class="card shadow-lg border-0 rounded">
                    <div class="card-header bg-primary text-white text-center">
                        <h2 class="mb-0">Tambah Berita</h2>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="<?= BASE_PATH ?>/admin/berita/store" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label for="title" class="form-label fw-bold">Judul Berita</label>
                                <input type="text" id="title" name="title" class="form-control form-control-lg"
                                    placeholder="Masukkan judul berita" required>
                            </div>

                            <div class="mb-3">
                                <label for="author" class="form-label fw-bold">Penulis</label>
                                <input type="text" id="author" name="author" class="form-control form-control-lg"
                                    placeholder="Masukkan nama penulis" required>
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label fw-bold">Isi Berita</label>
                                <textarea id="content" name="content" rows="8" class="form-control"
                                    placeholder="Masukkan isi berita" required></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="thumbnail" class="form-label fw-bold">Thumbnail</label>
                                <input type="file" id="thumbnail" name="thumbnail" class="form-control">
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-success btn-lg flex-fill">
                                    <i class="bi bi-save me-1"></i> Simpan Berita
                                </button>
                                <a href="<?= BASE_PATH ?>/admin/berita" class="btn btn-secondary btn-lg flex-fill">
                                    <i class="bi bi-arrow-left me-1"></i> Kembali
                                </a>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle (Popper + JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>