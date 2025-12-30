<?php

// ================== INCLUDES ==================
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/functions.php';

require_once __DIR__ . '/../app/Core/Router.php';

// Controllers publik
require_once __DIR__ . '/../app/Controllers/HomeController.php';
require_once __DIR__ . '/../app/Controllers/BeritaController.php';
require_once __DIR__ . '/../app/Controllers/PagesController.php';

// Controllers admin
require_once __DIR__ . '/../app/Controllers/AuthController.php';
require_once __DIR__ . '/../app/Controllers/BeritaAdminController.php';

//helpers
require_once __DIR__ . '/../app/helpers/date_helper.php';


// ================== INIT ==================
$router = new Router();
$pages = new PagesController();

// ================= ROUTES PUBLIK =================

// Home
$router->get('#^$#', fn() => (new HomeController())->index());
$router->get('#^home$#', fn() => (new HomeController())->index());

// Berita publik
$router->get('#^berita$#', fn() => (new BeritaController())->index());
$router->get(
  '#^berita/([\w-]+)$#',
  fn($slug) => (new BeritaController())->detail($slug)
);

// Halaman statis
$router->get('#^visimisi$#', fn() => $pages->visimisi());
$router->get('#^struktur$#', fn() => $pages->struktur());
$router->get('#^galeri$#', fn() => $pages->galeri());
$router->get('#^kontak$#', fn() => $pages->kontak());
$router->get('#^coming-soon$#', fn() => $pages->comingSoon());


// ================= AUTH ADMIN =================

$router->get('#^admin/login$#', fn() => (new AuthController())->login());
$router->post('#^admin/login$#', fn() => (new AuthController())->process());
$router->get('#^admin/logout$#', fn() => (new AuthController())->logout());

// ================= ROUTES ADMIN BERITA =================

$router->get('#^admin/berita$#', fn() => (new BeritaAdminController())->index());
$router->get('#^admin/berita/create$#', fn() => (new BeritaAdminController())->create());
$router->post('#^admin/berita/store$#', fn() => (new BeritaAdminController())->store());

$router->get(
  '#^admin/berita/edit/([\w-]+)$#',
  fn($slug) => (new BeritaAdminController())->edit($slug)
);

$router->post(
  '#^admin/berita/update/([\w-]+)$#',
  fn($slug) => (new BeritaAdminController())->update($slug)
);

$router->post(
  '#^admin/berita/delete/([\w-]+)$#',
  fn($slug) => (new BeritaAdminController())->delete($slug)
);

// ================= URI NORMALIZATION =================

// Ambil path URL
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Hilangkan base folder (/gow_tgl/public)
$basePath = dirname($_SERVER['SCRIPT_NAME']);
$uri = trim(str_replace($basePath, '', $uri), '/');

// Normalisasi index.php
if ($uri === 'index.php') {
  $uri = '';
}

// Dispatch ke router
$router->dispatch($uri);
