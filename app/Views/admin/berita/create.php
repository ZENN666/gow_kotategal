=<h2>Tambah Berita</h2>

<form method="POST" action="<?= BASE_PATH ?>/admin/berita/store" enctype="multipart/form-data">

    <input type="text" name="title" placeholder="Judul" required><br><br>
    <input type="text" name="author" placeholder="Penulis" required><br><br>

    <textarea name="content" rows="8" placeholder="Isi berita" required></textarea><br><br>

    <input type="file" name="thumbnail"><br><br>

    <button type="submit">Simpan</button>
</form>