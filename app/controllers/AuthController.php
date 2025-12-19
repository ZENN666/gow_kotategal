<?php

class AuthController
{
    public function login()
    {
        include __DIR__ . '/../Views/auth/login.php';
    }

    public function process()
    {
        session_start();
        global $pdo;

        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
        $stmt->execute([$username]);
        $admin = $stmt->fetch();

        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['admin'] = $admin;
            header('Location: ' . BASE_PATH . '/admin/berita');
            exit;
        }

        header('Location: ' . BASE_PATH . '/admin/login?error=1');
        exit;
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: ' . BASE_PATH . '/admin/login');
        exit;
    }
}
