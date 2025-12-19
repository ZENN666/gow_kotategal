<?php
require_once '../../includes/db.php';

$limit = 6;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
if ($page < 1)
    $page = 1;

$offset = ($page - 1) * $limit;

$stmt = $pdo->prepare("
  SELECT title, slug, content, thumbnail, created_at
  FROM posts
  ORDER BY created_at DESC
  LIMIT :limit OFFSET :offset
");
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();

while ($row = $stmt->fetch()):
    ?>
    <div class="col-md-4">
        <div class="card h-100 shadow-sm">
            <img src="uploads/<?= htmlspecialchars($row['thumbnail']); ?>" class="card-img-top"
                style="height:200px;object-fit:cover;" alt="<?= htmlspecialchars($row['title']); ?> - GOW Kota Tegal">

            <div class="card-body d-flex flex-column">
                <h5 class="card-title"><?= htmlspecialchars($row['title']); ?></h5>
                <p class="text-muted small mb-2">
                    <?= date('F j, Y', strtotime($row['created_at'])); ?>
                </p>
                <p class="card-text text-muted">
                    <?= substr(strip_tags($row['content']), 0, 120); ?>...
                </p>

                <a href="/berita/<?= htmlspecialchars($row['slug']); ?>" class="btn btn-sm btn-primary mt-auto">
                    Baca Selengkapnya
                </a>
            </div>
        </div>
    </div>
<?php endwhile; ?>