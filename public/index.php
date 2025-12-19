<?php

// ================== INCLUDES ==================
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/functions.php';

require_once __DIR__ . '/../app/Core/Router.php';
require_once __DIR__ . '/../app/Controllers/HomeController.php';
require_once __DIR__ . '/../app/Controllers/BeritaController.php';
require_once __DIR__ . '/../app/Controllers/PagesController.php';

// === ADMIN CONTROLLERS ===
require_once __DIR__ . '/../app/Controllers/AdminController.php';
require_once __DIR__ . '/../app/Controllers/BeritaAdminController.php';

// ================== INIT ==================
$router = new Router();
$pages = new PagesController();

// ================= ROUTES PUBLIK =================

// Home
$router->get('#^$#', function () {
  (new HomeController())->index();
});
$router->get('#^home$#', function () {
  (new HomeController())->index();
});

// Berita
$router->get('#^berita$#', function () {
  (new BeritaController())->index();
});
$router->get('#^berita/([\w-]+)$#', function ($slug) {
  (new BeritaController())->detail($slug);
});

// Halaman statis (menu navbar)
$router->get('#^profil$#', function () use ($pages) {
  $pages->profil(); });
$router->get('#^visimisi$#', function () use ($pages) {
  $pages->visimisi(); });
$router->get('#^struktur$#', function () use ($pages) {
  $pages->struktur(); });
$router->get('#^galeri$#', function () use ($pages) {
  $pages->galeri(); });
$router->get('#^kontak$#', function () use ($pages) {
  $pages->kontak(); });

// ================= ROUTES ADMIN =================

// Admin login/logout
$router->get('#^admin/login$#', function () {
  (new AdminController())->login();
});
$router->post('#^admin/login$#', function () {
  (new AdminController())->loginPost();
});
$router->get('#^admin/logout$#', function () {
  (new AdminController())->logout();
});

// Admin Berita CRUD
$router->get('#^admin/berita$#', function () {
  (new BeritaAdminController())->index();
});
$router->get('#^admin/berita/create$#', function () {
  (new BeritaAdminController())->create();
});
$router->post('#^admin/berita/store$#', function () {
  (new BeritaAdminController())->store();
});
$router->get('#^admin/berita/edit/([\w-]+)$#', function ($slug) {
  (new BeritaAdminController())->edit($slug);
});
$router->post('#^admin/berita/update/([\w-]+)$#', function ($slug) {
  (new BeritaAdminController())->update($slug);
});
$router->post('#^admin/berita/delete/([\w-]+)$#', function ($slug) {
  (new BeritaAdminController())->delete($slug);
});

// ================= URI NORMALIZATION =================
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$basePath = dirname($_SERVER['SCRIPT_NAME']);

// buang /gow_tgl/public
$uri = trim(str_replace($basePath, '', $uri), '/');

// HANDLE index.php
if ($uri === 'index.php') {
  $uri = '';
}

// ================= DISPATCH =================
$router->dispatch($uri);
