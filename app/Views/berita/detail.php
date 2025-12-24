<?php
$title = htmlspecialchars($post['title']);

// Open Graph data
$og_type = 'article';
$og_url = base_url('berita/' . $post['slug']);
$og_img = !empty($post['thumbnail'])
    ? base_url('uploads/' . $post['thumbnail'])
    : base_url('assets/img/hero.png');

$description = substr(strip_tags($post['content']), 0, 120);

ob_start();
?>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <!-- Judul -->
                <h1 class="fw-bold mb-3">
                    <?= htmlspecialchars($post['title']) ?>
                </h1>

                <!-- Author + Tanggal + Share -->
                <div class="d-flex align-items-center justify-content-between text-muted mb-4"
                    style="font-size: 0.9rem;">

                    <div>
                        <span><?= htmlspecialchars($post['author']) ?></span>
                        <span class="mx-2">|</span>
                        <span><?= tanggal_indonesia($post['created_at']) ?></span>
                    </div>

                    <!-- Share -->
                    <div class="dropdown">
                        <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="shareDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-share-fill"></i> Share
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="shareDropdown">
                            <li>
                                <a class="dropdown-item" target="_blank"
                                    href="https://wa.me/?text=<?= urlencode($post['title'] . ' ' . $og_url) ?>">
                                    <i class="bi bi-whatsapp me-2"></i> WhatsApp
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" target="_blank"
                                    href="https://twitter.com/intent/tweet?text=<?= urlencode($post['title']) ?>&url=<?= urlencode($og_url) ?>">
                                    <i class="bi bi-twitter me-2"></i> Twitter
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" target="_blank"
                                    href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode($og_url) ?>">
                                    <i class="bi bi-facebook me-2"></i> Facebook
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <button class="dropdown-item" type="button" id="copyLinkBtn">
                                    <i class="bi bi-link-45deg me-2"></i> Salin Link
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php if (!empty($post['thumbnail'])): ?>
                    <div class="mb-4">
                        <div class="ratio ratio-16x9 mb-1">
                            <img src="<?= $og_img ?>" alt="<?= htmlspecialchars($post['title']) ?>" class="w-100"
                                style="object-fit: cover;">
                        </div>

                        <?php if (!empty($post['thumbnail_caption'])): ?>
                            <small class="text-muted d-block">
                                <?= htmlspecialchars($post['thumbnail_caption']) ?>
                            </small>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <!-- Konten -->
                <article class="content mb-4" style="
                            white-space: pre-line;
                            word-wrap: break-word;
                            overflow-wrap: break-word;
                            line-height: 1.7;
                         ">
                    <?= htmlspecialchars($post['content']) ?>
                </article>

                <!-- Back -->
                <a href="<?= base_url('berita') ?>" class="btn btn-outline-secondary mt-3">
                    ← Kembali ke Berita
                </a>

            </div>
        </div>
    </div>
</section>

<script>
    // Salin link
    document.getElementById('copyLinkBtn').addEventListener('click', function () {
        navigator.clipboard.writeText("<?= $og_url ?>").then(() => {
            alert('Link berita berhasil disalin!');
        });
    });
</script>

<?php
$content = ob_get_clean();
require __DIR__ . '/../partials/layout.php';
