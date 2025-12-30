document.addEventListener("DOMContentLoaded", function () {
    // ==========================================
    // 1. Stats Counter Logic (Angka bergerak naik)
    // ==========================================
    const counters = document.querySelectorAll(".count-up");
    const duration = 1500; // Durasi animasi dalam ms

    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute("data-count"), 10);
        let startTime = null;

        function animateCount(timestamp) {
            if (!startTime) startTime = timestamp;
            const progress = Math.min((timestamp - startTime) / duration, 1);
            const current = Math.floor(progress * target);
            
            counter.innerText = current + "+";

            if (progress < 1) {
                requestAnimationFrame(animateCount);
            } else {
                counter.innerText = target + "+";
            }
        }
        requestAnimationFrame(animateCount);
    });

    // ==========================================
    // 2. Swiper Logic (Slider Logo Partner)
    // ==========================================
    var swiperLogo = new Swiper(".logo-swiper", {
        slidesPerView: 2,
        spaceBetween: 20,
        loop: true,
        grabCursor: true,
        speed: 4000, // Kecepatan gerak (smooth linear effect)
        autoplay: {
            delay: 0,
            disableOnInteraction: false,
            pauseOnMouseEnter: true
        },
        breakpoints: {
            576: { slidesPerView: 3, spaceBetween: 30 },
            768: { slidesPerView: 4, spaceBetween: 40 },
            1024: { slidesPerView: 5, spaceBetween: 50 },
            1200: { slidesPerView: 6, spaceBetween: 60 }
        }
    });
});