<?php
$title = 'Berita GOW Kota Tegal';
ob_start();
?>

<!-- OFFSET karena navbar fixed -->
<style>
    .page-offset {
        padding-top: 140px;
    }
</style>

<!-- NAVBAR -->
<?php include __DIR__ . '/../partials/navbar.php'; ?>

<section class="py-5 bg-light page-offset">
    <div class="container">
        <h3 class="fw-bold mb-4">Berita & Artikel</h3>

        <div class="row g-4">
            <?php if (empty($posts)): ?>
                <p class="text-muted">Belum ada berita.</p>
            <?php endif; ?>

            <?php foreach ($posts as $post): ?>
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">

                        <?php if (!empty($post['thumbnail'])): ?>
                            <img src="<?= base_url('uploads/' . $post['thumbnail']) ?>" class="card-img-top"
                                style="height:200px;object-fit:cover;" alt="<?= htmlspecialchars($post['title']) ?>">
                        <?php endif; ?>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">
                                <?= htmlspecialchars($post['title']) ?>
                            </h5>

                            <p class="card-text text-muted flex-grow-1">
                                <?= htmlspecialchars(
                                    mb_substr(strip_tags($post['content']), 0, 120)
                                ) ?>…
                            </p>

                            <a href="<?= base_url('berita/' . $post['slug']) ?>"
                                class="btn btn-sm btn-outline-warning mt-auto">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<?php
$content = ob_get_clean();
require __DIR__ . '/../partials/layout.php';
