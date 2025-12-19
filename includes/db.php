<?php
// includes/db.php
require_once __DIR__ . '/../vendor/autoload.php'; // load composer autoload
use Dotenv\Dotenv;

// Load .env dari root projek
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Ambil config dari .env
$DB_HOST = $_ENV['DB_HOST'] ?? 'localhost';
$DB_NAME = $_ENV['DB_NAME'] ?? 'gow_tgl';
$DB_USER = $_ENV['DB_USER'] ?? 'root';
$DB_PASS = $_ENV['DB_PASS'] ?? '';

try {
    $pdo = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4", $DB_USER, $DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die('DB Connection failed: ' . $e->getMessage());
}
