<?php
$active_page = $_GET['page'] ?? 'organisasi';
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-info shadow">
    <div class="container-fluid">

        <a class="navbar-brand fw-bold" href="index.php?page=organisasi">
            <i class="fa-solid fa-layer-group me-2"></i>
            SIPK ORMAWA
        </a>

        <form class="d-flex ms-auto me-5 me-lg-4" action="index.php" method="GET" style="max-width: 250px;">
            <input type="hidden" name="page" value="<?= htmlspecialchars($active_page); ?>">

            <div class="input-group">
                <input
                    type="search" class="form-control" name="search" placeholder="Cari..." value="<?= htmlspecialchars($_GET['search'] ?? ''); ?>"
                >

                <button class="btn btn-light" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </form>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse flex-grow-0" id="navbarNav">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link <?= $active_page=='organisasi'?'active':''; ?>"
                       href="index.php?page=organisasi">
                        Organisasi
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= $active_page=='anggota'?'active':''; ?>"
                       href="index.php?page=anggota">
                        Anggota
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= $active_page=='kegiatan'?'active':''; ?>"
                       href="index.php?page=kegiatan">
                        Kegiatan
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= $active_page=='anggaran'?'active':''; ?>"
                       href="index.php?page=anggaran">
                        Anggaran
                    </a>
                </li>

            </ul>

        </div>

    </div>
</nav>