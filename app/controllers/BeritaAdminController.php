<?php
// app/Controllers/BeritaAdminController.php

class BeritaAdminController
{
    public function __construct()
    {
        // Mulai session kalau belum aktif
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Cek login admin
        if (!isset($_SESSION['admin_logged_in'])) {
            header('Location: ' . base_url('admin/login'));
            exit;
        }
    }

    // ================== INDEX ==================
    public function index()
    {
        global $db;

        $query = $db->query("SELECT * FROM berita ORDER BY created_at DESC");
        $posts = $query->fetch_all(MYSQLI_ASSOC);

        $title = 'Kelola Berita - Admin';
        include __DIR__ . '/../Views/admin/berita/index.php';
    }

    // ================== CREATE ==================
    public function create()
    {
        $title = 'Tambah Berita - Admin';
        include __DIR__ . '/../Views/admin/berita/create.php';
    }

    // ================== STORE ==================
    public function store()
    {
        global $db;

        $judul = $_POST['title'] ?? '';
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $judul)));
        $content = $_POST['content'] ?? '';

        // Upload thumbnail jika ada
        $thumbnail = '';
        if (!empty($_FILES['thumbnail']['name'])) {
            $fileName = time() . '_' . $_FILES['thumbnail']['name'];
            move_uploaded_file($_FILES['thumbnail']['tmp_name'], __DIR__ . '/../../uploads/' . $fileName);
            $thumbnail = $fileName;
        }

        $stmt = $db->prepare("INSERT INTO berita (title, slug, content, thumbnail, created_at) VALUES (?, ?, ?, ?, NOW())");
        $stmt->bind_param('ssss', $judul, $slug, $content, $thumbnail);
        $stmt->execute();

        header('Location: ' . base_url('admin/berita'));
        exit;
    }

    // ================== EDIT ==================
    public function edit($slug)
    {
        global $db;

        $stmt = $db->prepare("SELECT * FROM berita WHERE slug = ?");
        $stmt->bind_param('s', $slug);
        $stmt->execute();
        $result = $stmt->get_result();
        $post = $result->fetch_assoc();

        if (!$post) {
            http_response_code(404);
            echo 'Berita tidak ditemukan';
            exit;
        }

        $title = 'Edit Berita - Admin';
        include __DIR__ . '/../Views/admin/berita/edit.php';
    }

    // ================== UPDATE ==================
    public function update($slug)
    {
        global $db;

        $judul = $_POST['title'] ?? '';
        $new_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $judul)));
        $content = $_POST['content'] ?? '';

        // Upload thumbnail baru jika ada
        $thumbnail = '';
        if (!empty($_FILES['thumbnail']['name'])) {
            $fileName = time() . '_' . $_FILES['thumbnail']['name'];
            move_uploaded_file($_FILES['thumbnail']['tmp_name'], __DIR__ . '/../../uploads/' . $fileName);
            $thumbnail = $fileName;

            $stmt = $db->prepare("UPDATE berita SET title=?, slug=?, content=?, thumbnail=? WHERE slug=?");
            $stmt->bind_param('sssss', $judul, $new_slug, $content, $thumbnail, $slug);
        } else {
            $stmt = $db->prepare("UPDATE berita SET title=?, slug=?, content=? WHERE slug=?");
            $stmt->bind_param('ssss', $judul, $new_slug, $content, $slug);
        }

        $stmt->execute();
        header('Location: ' . base_url('admin/berita'));
        exit;
    }

    // ================== DELETE ==================
    public function delete($slug)
    {
        global $db;

        $stmt = $db->prepare("DELETE FROM berita WHERE slug = ?");
        $stmt->bind_param('s', $slug);
        $stmt->execute();

        header('Location: ' . base_url('admin/berita'));
        exit;
    }
}
