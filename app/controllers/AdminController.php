<?php
class AdminController
{
    public function login()
    {
        // tampilkan halaman login
        view('admin/login');
    }

    public function loginPost()
    {
        session_start(); // aman, walaupun session sudah start di functions.php
        global $db;

        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        // cek admin di database
        $stmt = $db->prepare("SELECT * FROM admins WHERE username = ?");
        $stmt->execute([$username]);
        $admin = $stmt->fetch();

        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['admin'] = $admin['username'];
            header('Location: ' . base_url('admin/berita'));
            exit;
        } else {
            $error = 'Username atau password salah';
            view('admin/login', ['error' => $error]);
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: ' . base_url('admin/login'));
        exit;
    }
}
