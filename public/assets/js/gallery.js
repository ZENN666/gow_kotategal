document.addEventListener('DOMContentLoaded', () => {
    const modalEl = document.getElementById('galleryModal');
    const carouselEl = document.getElementById('galleryCarousel');

    const carousel = bootstrap.Carousel.getOrCreateInstance(carouselEl, {
        touch: true,
        interval: false
    });

    document.querySelectorAll('.gallery-thumb').forEach((img, index) => {
        img.addEventListener('click', () => {
            carousel.to(index);
        });
    });

    modalEl.addEventListener('hidden.bs.modal', () => {
        carousel.to(0);
    });
});

