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

    // ================= SIMPAN =================
    public function store()
    {
        global $pdo;

        $title = trim($_POST['title']);
        $content = $_POST['content'];
        $author = $_SESSION['admin']['username'];

        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title))) . '-' . time();

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
            "INSERT INTO berita (title, author, slug, content, thumbnail, created_at)
             VALUES (?, ?, ?, ?, ?, NOW())"
        );

        $stmt->execute([
            $title,
            $author,
            $slug,
            $content,
            $thumbnail
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

        // kalau upload thumbnail baru
        if (!empty($_FILES['thumbnail']['name'])) {
            $filename = time() . '_' . $_FILES['thumbnail']['name'];
            $target = __DIR__ . '/../../public/uploads/' . $filename;

            move_uploaded_file($_FILES['thumbnail']['tmp_name'], $target);

            $stmt = $pdo->prepare(
                "UPDATE berita
                 SET title=?, content=?, thumbnail=?
                 WHERE slug=?"
            );

            $stmt->execute([$title, $content, $filename, $slug]);
        } else {
            $stmt = $pdo->prepare(
                "UPDATE berita
                 SET title=?, content=?
                 WHERE slug=?"
            );

            $stmt->execute([$title, $content, $slug]);
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
