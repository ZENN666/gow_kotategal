<?php
// WARNING: run once then delete this file!
require_once __DIR__.'/../includes/db.php';

$username = 'admin';
$password = 'admin123';
$hash = password_hash($password, PASSWORD_DEFAULT);
$stmt = $pdo->prepare('SELECT COUNT(*) as c FROM admins WHERE username = ?');
$stmt->execute([$username]);
$r = $stmt->fetch();
if ($r['c']==0) {
    $pdo->prepare('INSERT INTO admins (username,password) VALUES (?,?)')->execute([$username,$hash]);
    echo "Admin created: $username / $password\n";
} else {
    echo "Admin already exists\n";
}
