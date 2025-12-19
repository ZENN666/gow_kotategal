<?php
$title = htmlspecialchars($post['title']);
ob_start();
?>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <h1 class="fw-bold mb-3"><?= htmlspecialchars($post['title']) ?></h1>

                <p class="text-muted mb-4">
                    Diposting pada <?= date('d M Y', strtotime($post['created_at'])) ?>
                </p>

                <?php if (!empty($post['thumbnail'])): ?>
                    <img src="<?= base_url('uploads/' . $post['thumbnail']) ?>" class="img-fluid rounded mb-4"
                        alt="<?= htmlspecialchars($post['title']) ?>">
                <?php endif; ?>

                <article class="content">
                    <?= nl2br($post['content']) ?>
                </article>

                <a href="<?= base_url('berita') ?>" class="btn btn-outline-secondary mt-4">
                    ← Kembali ke Berita
                </a>

            </div>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
require __DIR__ . '/../partials/layout.php';
