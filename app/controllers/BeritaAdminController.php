<?php

class BeritaAdminController
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (empty($_SESSION['admin'])) {
            header('Location: ' . base_url('admin/login'));
            exit;
        }
    }

    // ================= LIST =================
    public function index()
    {
        global $pdo;

        $stmt = $pdo->query(
            "SELECT id, title, author, slug, created_at
             FROM berita
             ORDER BY created_at DESC"
        );

        $posts = $stmt->fetchAll();

        include __DIR__ . '/../Views/admin/berita/index.php';
    }

    // ================= FORM TAMBAH =================
    public function create()
    {
        include __DIR__ . '/../Views/admin/berita/create.php';
    }

    // ================= SIMPAN (UPDATED - SEO FRIENDLY) =================
    public function store()
    {
        global $pdo;

        $title = trim($_POST['title']);
        $content = $_POST['content'];
        $author = trim($_POST['author']);
        $thumbnail_caption = trim($_POST['thumbnail_caption'] ?? null);

        // --- MULAI PERBAIKAN SLUG ---

        // 1. Bersihin judul jadi slug dasar (huruf kecil, angka, dash)
        $slug_base = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
        // Hapus dash berlebih (misal "judul---berita" jadi "judul-berita")
        $slug_base = preg_replace('/-+/', '-', $slug_base);

        $slug = $slug_base;
        $counter = 1;

        // 2. Cek apakah slug sudah ada di database
        while (true) {
            $stmt_check = $pdo->prepare("SELECT id FROM berita WHERE slug = ?");
            $stmt_check->execute([$slug]);

            // Kalau tidak ada duplikat (rowCount == 0), berarti aman, keluar loop
            if ($stmt_check->rowCount() == 0) {
                break;
            }

            // Kalau duplikat, tambahkan counter (contoh: judul-berita-1, judul-berita-2)
            $slug = $slug_base . '-' . $counter;
            $counter++;
        }

        // --- SELESAI PERBAIKAN SLUG ---

        // ================= UPLOAD THUMBNAIL =================
        $thumbnail = null;

        if (!empty($_FILES['thumbnail']['name'])) {
            $filename = time() . '_' . $_FILES['thumbnail']['name'];
            $target = __DIR__ . '/../../public/uploads/' . $filename;

            if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $target)) {
                $thumbnail = $filename;
            }
        }

        $stmt = $pdo->prepare(
            "INSERT INTO berita
            (title, author, slug, content, thumbnail, thumbnail_caption, created_at)
            VALUES (?, ?, ?, ?, ?, ?, NOW())"
        );

        $stmt->execute([
            $title,
            $author,
            $slug, // Slug bersih yang akan masuk DB
            $content,
            $thumbnail,
            $thumbnail_caption
        ]);

        header('Location: ' . base_url('admin/berita'));
        exit;
    }

    // ================= EDIT =================
    public function edit(string $slug)
    {
        global $pdo;

        $stmt = $pdo->prepare("SELECT * FROM berita WHERE slug = ?");
        $stmt->execute([$slug]);
        $post = $stmt->fetch();

        if (!$post) {
            echo 'Berita tidak ditemukan';
            exit;
        }

        include __DIR__ . '/../Views/admin/berita/edit.php';
    }

    // ================= UPDATE =================
    public function update(string $slug)
    {
        global $pdo;

        $title = trim($_POST['title']);
        $content = $_POST['content'];
        $thumbnail_caption = trim($_POST['thumbnail_caption'] ?? null);

        // Catatan: Biasanya slug tidak diubah saat update biar link lama gak mati (404).
        // Jadi di sini gw biarin logic update-nya gak nyentuh kolom slug.

        // kalau upload thumbnail baru
        if (!empty($_FILES['thumbnail']['name'])) {
            $filename = time() . '_' . $_FILES['thumbnail']['name'];
            $target = __DIR__ . '/../../public/uploads/' . $filename;

            move_uploaded_file($_FILES['thumbnail']['tmp_name'], $target);

            $stmt = $pdo->prepare(
                "UPDATE berita
                 SET title = ?, content = ?, thumbnail = ?, thumbnail_caption = ?
                 WHERE slug = ?"
            );

            $stmt->execute([
                $title,
                $content,
                $filename,
                $thumbnail_caption,
                $slug
            ]);
        } else {
            $stmt = $pdo->prepare(
                "UPDATE berita
                 SET title = ?, content = ?, thumbnail_caption = ?
                 WHERE slug = ?"
            );

            $stmt->execute([
                $title,
                $content,
                $thumbnail_caption,
                $slug
            ]);
        }

        header('Location: ' . base_url('admin/berita'));
        exit;
    }

    // ================= DELETE =================
    public function delete(string $slug)
    {
        global $pdo;

        $stmt = $pdo->prepare("DELETE FROM berita WHERE slug = ?");
        $stmt->execute([$slug]);

        header('Location: ' . base_url('admin/berita'));
        exit;
    }
}