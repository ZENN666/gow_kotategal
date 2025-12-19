<?php // admin/dashboard.php
require_once __DIR__.'/../includes/functions.php';
ensure_logged_in();
require_once __DIR__.'/../includes/db.php';
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
  <h1>Dashboard</h1>
  <p><a href="posts.php" class="btn btn-sm btn-primary">Kelola Berita</a>
  <a href="logout.php" class="btn btn-sm btn-secondary">Logout</a></p>
</body>
</html>
