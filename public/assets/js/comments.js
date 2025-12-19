document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('comment-form');
    if (!form) return;

    const usernameKey = 'comment_username';

    // tombol balas
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('reply-btn')) {
            form.querySelector('[name="parent_id"]').value = e.target.dataset.id;
            form.querySelector('[name="content"]').focus();
        }
    });

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        let username = localStorage.getItem(usernameKey);

        if (!username) {
            username = prompt('Masukkan username untuk komentar:');
            if (!username || username.trim() === '') {
                alert('Username wajib diisi');
                return;
            }
            localStorage.setItem(usernameKey, username);
        }

        const data = new FormData(form);
        data.append('username', username);

        fetch('/gow_tgl/public/berita/save-comment.php', {
            method: 'POST',
            body: data
        })
        .then(res => res.json())
        .then(res => {
            if (res.status === 'ok') {
                location.reload();
            } else {
                alert(res.message);
            }
        })
        .catch(err => {
            alert('Gagal kirim komentar');
            console.error(err);
        });
    });

});
