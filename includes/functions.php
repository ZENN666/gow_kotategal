<?php


define('BASE_PATH', '/gow_tgl/public');
// Memulai session supaya bisa pakai $_SESSION di seluruh file
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Menghasilkan URL penuh berdasarkan path
 *
 * @param string $path Path relatif setelah base URL
 * @return string URL lengkap
 */
function base_url(string $path = ''): string
{
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        ? 'https'
        : 'http';

    $host = $_SERVER['HTTP_HOST'];
    $base = '/gow_tgl/public'; // Ubah sesuai folder project kamu

    return $scheme . '://' . $host . $base . '/' . ltrim($path, '/');
}

/**
 * Mengecek apakah admin sudah login
 * Kalau belum, diarahkan ke halaman login admin
 */
function ensure_logged_in(): void
{
    if (!isset($_SESSION['admin_id'])) {
        header('Location: /admin/login');
        exit;
    }
}

/**
 * Logout admin
 */
function logout(): void
{
    $_SESSION = [];
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }
    session_destroy();
    header('Location: /admin/login');
    exit;
}

/**
 * Membuat slug dari string
 * Contoh: "Halo Dunia!" -> "halo-dunia"
 */
function slugify(string $text): string
{
    // Ganti spasi & karakter non-alphanumeric jadi "-"
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    // Transliterate UTF-8 ke ASCII
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // Hapus karakter selain huruf, angka, dan "-"
    $text = preg_replace('~[^-\w]+~', '', $text);
    // Hapus "-" di awal & akhir
    $text = trim($text, '-');
    // Hapus double "-"
    $text = preg_replace('~-+~', '-', $text);
    // lowercase
    return strtolower($text);
}

// Fungsi untuk memanggil view dengan data
function view(string $path, array $data = [])
{
    extract($data);
    include __DIR__ . '/../app/Views/' . $path . '.php';
}

function adminAuth()
{
    session_start();
    if (!isset($_SESSION['admin'])) {
        header('Location: /admin/login');
        exit;
    }
}
