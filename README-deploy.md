README - Deploy ke Rumahweb (singkat)

1. Buat database MySQL via cPanel -> MySQL Databases.
2. Import db.sql via phpMyAdmin.
3. Upload isi folder 'public' ke public_html (pastikan index.php berada di public_html root).
4. Upload folder 'admin' ke public_html/admin dan 'includes' ke public_html/includes.
5. Edit includes/db.php -> sesuaikan DB_NAME, DB_USER, DB_PASS.
6. Buat folder public/uploads dan chmod 755/775.
7. Akses https://yourdomain.com/admin/create_admin.php lalu hapus file itu setelah berhasil.
8. Login di https://yourdomain.com/admin/login.php
