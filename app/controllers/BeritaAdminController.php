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

    // ================= SIMPAN (CREATE) =================
    public function store()
    {
        global $pdo;

        $title = trim($_POST['title']);
        $content = $_POST['content'];
        $author = trim($_POST['author']);
        $thumbnail_caption = trim($_POST['thumbnail_caption'] ?? null);

        // --- LOGIC SLUG (SEO FRIENDLY) ---
        $slug_base = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
        $slug_base = preg_replace('/-+/', '-', $slug_base);

        $slug = $slug_base;
        $counter = 1;

        // Cek duplikat slug
        while (true) {
            $stmt_check = $pdo->prepare("SELECT id FROM berita WHERE slug = ?");
            $stmt_check->execute([$slug]);

            if ($stmt_check->rowCount() == 0) {
                break;
            }

            $slug = $slug_base . '-' . $counter;
            $counter++;
        }
        // --- END LOGIC SLUG ---

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
            $slug,
            $content,
            $thumbnail,
            $thumbnail_caption
        ]);

        header('Location: ' . base_url('admin/berita'));
        exit;
    }

    // ================= FORM EDIT =================
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

    // ================= UPDATE (PERBAIKAN FITUR EDIT TANGGAL) =================
    public function update(string $slug)
    {
        global $pdo;

        // 1. Tangkap semua input dari Form Edit
        $title = trim($_POST['title']);
        $author = trim($_POST['author']); // Update Penulis
        $content = $_POST['content'];
        $thumbnail_caption = trim($_POST['thumbnail_caption'] ?? null);
        $created_at = $_POST['created_at']; // Update Tanggal (Dari input datetime-local)

        // Catatan: Slug biasanya tidak diubah agar link lama tidak mati (404).

        // 2. Cek apakah user upload gambar baru?
        if (!empty($_FILES['thumbnail']['name'])) {
            // Upload Gambar Baru
            $filename = time() . '_' . $_FILES['thumbnail']['name'];
            $target = __DIR__ . '/../../public/uploads/' . $filename;

            move_uploaded_file($_FILES['thumbnail']['tmp_name'], $target);

            // Query Update DENGAN Gambar Baru
            $stmt = $pdo->prepare(
                "UPDATE berita 
                 SET title = ?, author = ?, content = ?, thumbnail = ?, thumbnail_caption = ?, created_at = ?
                 WHERE slug = ?"
            );

            $stmt->execute([
                $title,
                $author,
                $content,
                $filename, // Nama file gambar baru
                $thumbnail_caption,
                $created_at, // Tanggal baru
                $slug
            ]);

        } else {
            // Query Update TANPA Ganti Gambar (Gambar lama tetap)
            $stmt = $pdo->prepare(
                "UPDATE berita 
                 SET title = ?, author = ?, content = ?, thumbnail_caption = ?, created_at = ?
                 WHERE slug = ?"
            );

            $stmt->execute([
                $title,
                $author,
                $content,
                $thumbnail_caption,
                $created_at, // Tanggal baru
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

        // (Opsional) Sebaiknya hapus juga file gambar dari folder uploads sebelum hapus data di DB
        $stmt_img = $pdo->prepare("SELECT thumbnail FROM berita WHERE slug = ?");
        $stmt_img->execute([$slug]);
        $img = $stmt_img->fetchColumn();

        if ($img && file_exists(__DIR__ . '/../../public/uploads/' . $img)) {
            unlink(__DIR__ . '/../../public/uploads/' . $img);
        }

        // Hapus Data
        $stmt = $pdo->prepare("DELETE FROM berita WHERE slug = ?");
        $stmt->execute([$slug]);

        header('Location: ' . base_url('admin/berita'));
        exit;
    }
}