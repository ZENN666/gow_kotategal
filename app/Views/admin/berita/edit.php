<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Berita | Admin GOW</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background-color: #f5f6fa;
            overflow-x: hidden;
        }

        /* --- SIDEBAR STYLE --- */
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            background-color: #2c3e50;
            color: #fff;
            transition: all 0.3s;
        }

        .sidebar-header {
            padding: 20px;
            background-color: #1a252f;
            border-bottom: 1px solid #34495e;
        }

        .nav-pills .nav-link {
            color: #b0b8c1;
            padding: 12px 20px;
            margin-bottom: 5px;
            font-weight: 500;
            border-radius: 0;
            border-left: 4px solid transparent;
        }

        .nav-pills .nav-link:hover {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.05);
        }

        .nav-pills .nav-link.active {
            background-color: rgba(255, 127, 0, 0.1);
            color: #ff7f00;
            border-left-color: #ff7f00;
        }

        .nav-pills .nav-link i {
            margin-right: 10px;
            font-size: 1.1rem;
        }

        /* --- MAIN CONTENT STYLE --- */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            transition: all 0.3s;
        }

        .top-header {
            background: #fff;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        textarea#content {
            min-height: 300px;
            resize: vertical;
        }

        @media (max-width: 768px) {
            .sidebar {
                margin-left: -250px;
            }

            .sidebar.active {
                margin-left: 0;
            }

            .main-content {
                margin-left: 0;
            }

            .overlay {
                display: none;
                position: fixed;
                width: 100vw;
                height: 100vh;
                background: rgba(0, 0, 0, 0.5);
                z-index: 900;
                top: 0;
                left: 0;
            }

            .overlay.active {
                display: block;
            }
        }
    </style>
</head>

<body>

    <div class="overlay" id="overlay"></div>

    <nav class="sidebar d-flex flex-column" id="sidebar">
        <div class="sidebar-header d-flex align-items-center">
            <img src="<?= base_url('assets/img/gow.webp') ?>" alt="Logo" width="40" class="me-2">
            <div>
                <h6 class="m-0 fw-bold">ADMIN PANEL</h6>
                <small style="font-size: 10px; opacity: 0.7;">GOW KOTA TEGAL</small>
            </div>
        </div>

        <div class="flex-grow-1 py-3">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="<?= base_url('admin/berita') ?>" class="nav-link active">
                        <i class="bi bi-newspaper"></i> Kelola Berita
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/agenda') ?>" class="nav-link">
                        <i class="bi bi-calendar-event"></i> Kelola Agenda
                    </a>
                </li>
            </ul>
        </div>

        <div class="p-3 border-top border-secondary">
            <a href="<?= base_url('admin/logout') ?>"
                class="btn btn-danger w-100 btn-sm d-flex align-items-center justify-content-center">
                <i class="bi bi-box-arrow-left me-2"></i> LOGOUT
            </a>
        </div>
    </nav>

    <div class="main-content">

        <div class="top-header">
            <div class="d-flex align-items-center">
                <button class="btn btn-light d-md-none me-3" id="sidebarToggle">
                    <i class="bi bi-list fs-4"></i>
                </button>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/berita') ?>"
                                class="text-decoration-none text-muted">Berita</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold">Form Edit Berita</h6>
            </div>
            <div class="card-body p-4">

                <form method="POST" action="<?= base_url('admin/berita/update/' . $post['slug']) ?>"
                    enctype="multipart/form-data">

                    <div class="mb-4">
                        <label for="title" class="form-label fw-semibold">Judul Berita <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="<?= htmlspecialchars($post['title']) ?>" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="author" class="form-label fw-semibold">Penulis <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="author" name="author"
                                value="<?= htmlspecialchars($post['author']) ?>" required>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="created_at" class="form-label fw-semibold">Tanggal & Jam Tayang</label>
                            <?php
                            // Format tanggal database (YYYY-MM-DD HH:MM:SS) menjadi format input HTML5 (YYYY-MM-DDTHH:MM)
                            $dateValue = date('Y-m-d\TH:i', strtotime($post['created_at']));
                            ?>
                            <input type="datetime-local" class="form-control" id="created_at" name="created_at"
                                value="<?= $dateValue ?>" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="thumbnail" class="form-label fw-semibold">Ganti Gambar Utama</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                            <small class="text-muted d-block mt-1" style="font-size: 12px;">
                                Kosongkan jika tidak ingin mengganti gambar
                            </small>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="thumbnail_caption" class="form-label fw-semibold">Deskripsi Gambar
                                (Caption)</label>
                            <input type="text" class="form-control" id="thumbnail_caption" name="thumbnail_caption"
                                value="<?= htmlspecialchars($post['thumbnail_caption'] ?? '') ?>"
                                placeholder="Contoh: Kegiatan rapat koordinasi GOW...">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="content" class="form-label fw-semibold">Isi Berita <span
                                class="text-danger">*</span></label>
                        <textarea class="form-control" id="content" name="content"
                            required><?= htmlspecialchars($post['content']) ?></textarea>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex gap-2 justify-content-end">
                        <a href="<?= base_url('admin/berita') ?>" class="btn btn-light border">
                            Batal
                        </a>
                        <button type="submit" class="btn btn-success px-4">
                            <i class="bi bi-save me-1"></i> Simpan
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const toggleBtn = document.getElementById('sidebarToggle');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        });
    </script>
</body>

</html>