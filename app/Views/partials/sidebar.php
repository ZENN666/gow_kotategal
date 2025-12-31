<nav class="sidebar d-flex flex-column" id="sidebar">
    <div class="sidebar-header d-flex align-items-center">
        <img src="<?= base_url('assets/img/gow.webp') ?>" alt="Logo" width="40" class="me-2">
        <div>
            <h6 class="m-0 fw-bold">ADMIN PANEL</h6>
            <small style="font-size: 10px; opacity: 0.7;">GOW KOTA TEGAL</small>
        </div>
    </div>

    <div class="flex-grow-1 py-3">
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="<?= base_url('admin/berita') ?>"
                    class="nav-link <?= (isset($active_menu) && $active_menu == 'berita') ? 'active' : '' ?>">
                    <i class="bi bi-newspaper"></i> Kelola Berita
                </a>
            </li>

            <li class="nav-item">
                <a href="<?= base_url('admin/agenda') ?>"
                    class="nav-link <?= (isset($active_menu) && $active_menu == 'agenda') ? 'active' : '' ?>">
                    <i class="bi bi-calendar-event"></i> Kelola Agenda
                </a>
            </li>
        </ul>
    </div>

    <div class="p-3 border-top border-secondary">
        <a href="<?= base_url('admin/logout') ?>"
            class="btn btn-danger w-100 btn-sm d-flex align-items-center justify-content-center">
            <i class="bi bi-box-arrow-left me-2"></i> LOGOUT
        </a>
    </div>
</nav>