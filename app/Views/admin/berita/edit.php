<!DOCTYPE html>
<html>

<head>
    <title>Edit Berita</title>
</head>

<body>

    <h1>Edit Berita</h1>

    <p>
        <a href="/gow_tgl/public/admin/berita">← Kembali</a>
    </p>

    <form method="POST" action="/gow_tgl/public/admin/berita/update/<?= $post['slug'] ?>" enctype="multipart/form-data">

        <p>
            <label>Judul</label><br>
            <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>" required>
        </p>

        <p>
            <label>Konten</label><br>
            <textarea name="content" rows="10" cols="50" required><?= htmlspecialchars($post['content']) ?></textarea>
        </p>

        <p>
            <label>Thumbnail Baru (opsional)</label><br>
            <input type="file" name="thumbnail" accept="image/*">
        </p>

        <?php if (!empty($post['thumbnail'])): ?>
            <p>
                <img src="/gow_tgl/public/uploads/<?= $post['thumbnail'] ?>" width="150">
            </p>
        <?php endif; ?>

        <button type="submit">Update</button>

    </form>

</body>

</html>