<footer class="w-100 p-0 m-0">

    <div class="footer-top-section pt-5 pb-5 m-0 border-0">

        <div class="footer-bg-layer"></div>

        <div class="container position-relative" style="z-index: 2;">
            <div class="row align-items-start g-4 text-start text-white">

                <div
                    class="col-lg-3 col-md-12 text-center text-lg-start d-flex align-items-center justify-content-center justify-content-lg-start">
                    <img src="<?= base_url('assets/img/gow.webp') ?>" alt="Logo GOW" class="img-fluid"
                        style="max-height: 120px; width: auto; filter: drop-shadow(0 5px 15px rgba(0, 0, 0, 0.7));">
                </div>
                <div class="col-lg-3 col-md-4">
                    <h6
                        class="text-uppercase fw-bold mb-3 border-bottom border-white border-opacity-25 d-inline-block pb-1">
                        Alamat</h6>
                    <p class="small mb-0 opacity-90" style="line-height: 1.6;">
                        Jl. Jalan Betik No. 5, Kelurahan Tegalsari, Kec. Tegal Barat, Kota Tegal,<br>
                        Jawa Tengah 52123
                    </p>
                </div>

                <div class="col-lg-3 col-md-4">
                    <h6
                        class="text-uppercase fw-bold mb-3 border-bottom border-white border-opacity-25 d-inline-block pb-1">
                        Kontak</h6>
                    <ul class="list-unstyled small mb-0 opacity-90" style="line-height: 1.8;">
                        <li><strong>Telepon:</strong> (0283) 123456 </li>
                        <li><strong>Email:</strong> info@gowtegalkota.id </li>
                        <li><strong>Layanan:</strong> Senin - Jumat<br>(08:00 - 16:00 WIB)</li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4">
                    <h6
                        class="text-uppercase fw-bold mb-3 border-bottom border-white border-opacity-25 d-inline-block pb-1">
                        Ikuti Kami</h6>
                    <div class="d-flex gap-2">
                        <a href="#"
                            class="btn btn-social-white rounded-circle d-flex align-items-center justify-content-center shadow-sm">
                            <i class="bi bi-linkedin fs-5"></i>
                        </a>
                        <a href="#"
                            class="btn btn-social-white rounded-circle d-flex align-items-center justify-content-center shadow-sm">
                            <i class="bi bi-facebook fs-5"></i>
                        </a>
                        <a href="https://www.instagram.com/"
                            class="btn btn-social-white rounded-circle d-flex align-items-center justify-content-center shadow-sm">
                            <i class="bi bi-instagram fs-5"></i>
                        </a>
                        <a href="#"
                            class="btn btn-social-white rounded-circle d-flex align-items-center justify-content-center shadow-sm">
                            <i class="bi bi-youtube fs-5"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom-section py-3 m-0 border-0">
        <div class="container text-center">
            <small class="text-white-50">
                &copy; <?= date('Y'); ?> <strong>GOW Kota Tegal</strong>. All Rights Reserved.
            </small>
        </div>
    </div>

</footer>

<style>
    /* Pastikan tidak ada overflow horizontal */
    body {
        overflow-x: hidden;
    }

    /* === BAGIAN ATAS (ORANYE) === */
    .footer-top-section {
        background: linear-gradient(135deg, #C44D00 0%, #FF7F00 100%);
        position: relative;
        overflow: hidden;
        color: white;
        /* Hapus border radius atau shadow yang mungkin bikin garis gelap */
        border-radius: 0;
        box-shadow: none;
    }

    /* === BAGIAN BAWAH (GELAP SOLID + PEMBATAS ORANYE) === */
    .footer-bottom-section {
        background-color: #1a1a1a;
        /* Gelap Solid */

        /* Border Top sebagai pemisah */
        border-top: 5px solid #ff7f00 !important;

        position: relative;
        z-index: 10;
    }

    /* === ANIMASI === */
    .footer-bg-layer {
        position: absolute;
        inset: 0;
        z-index: 0;
        pointer-events: none;
    }

    .footer-bg-layer::before {
        content: "";
        position: absolute;
        width: 600px;
        height: 600px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 40%;
        top: -30%;
        left: -10%;
        animation: float 20s infinite linear;
    }

    .footer-bg-layer::after {
        content: "";
        position: absolute;
        width: 500px;
        height: 500px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 45%;
        bottom: -30%;
        right: -10%;
        animation: float-reverse 25s infinite linear;
    }

    /* Tombol Sosmed */
    .btn-social-white {
        width: 40px;
        height: 40px;
        background: #fff;
        color: #C44D00;
        border: none;
        transition: transform 0.2s;
    }

    .btn-social-white:hover {
        transform: translateY(-3px);
        background: #ffe0b2;
        color: #a33f00;
    }

    @keyframes float {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes float-reverse {
        0% {
            transform: rotate(360deg);
        }

        100% {
            transform: rotate(0deg);
        }
    }
</style>