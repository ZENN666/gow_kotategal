document.addEventListener('click', function (e) {
  const link = e.target.closest('.pagination a');
  if (!link) return;

  e.preventDefault();

  const page = new URL(link.href).searchParams.get('page') || 1;

  const container = document.getElementById('berita-container');
  const skeleton = document.getElementById('skeleton-wrapper');

  container.classList.add('d-none');
  skeleton.style.display = 'flex';

  fetch(`ajax/berita-pagination.php?page=${page}`)
    .then(res => res.text())
    .then(html => {
      skeleton.style.display = 'none';
      container.innerHTML = html;
      container.classList.remove('d-none');
      window.history.pushState({}, '', `?page=${page}`);
    });
});
