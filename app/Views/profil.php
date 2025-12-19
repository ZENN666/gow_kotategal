<?php
$title = 'Profil GOW Kota Tegal';
ob_start();
?>

<div class="container">
    <p>Ini halaman profil.</p>
</div>

<?php
$content = ob_get_clean();
require __DIR__ . '/partials/layout.php';
