<?php
include "koneksi.php";

include "cari_organisasi.php"; 
?>

<?php if (!empty($search)): ?>
        <div class="alert alert-light border border-light-subtle text-muted small mb-3 d-flex justify-content-between align-items-center shadow-sm rounded-3">
            <span>Menampilkan hasil pencarian untuk: <strong class="text-dark">"<?= htmlspecialchars($search); ?>"</strong></span>
            <a href="index.php?page=organisasi" class="btn btn-sm btn-outline-danger border-0 fw-bold py-0 text-decoration-none">Bersihkan</a>
        </div>
    <?php endif; ?>

<div class="mt-3">
    <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom border-light-subtle">
        <div>
            <h3 class="fw-bold text-dark m-0 tracking-tight">Administrasi Organisasi</h3>
        </div>
        <a href="index.php?page=organisasi_form" class="btn btn-primary fw-semibold px-4 py-2 shadow-sm rounded-3">
            <i class="fa-solidfa-plus me-2 small"></i>Tambah Organisasi
        </a>
    </div>

    <div class="d-flex flex-column gap-3">
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                
                <div class="card border border-light-subtle bg-white shadow-sm rounded-3">
                    <div class="card-body p-4 d-flex justify-content-between align-items-center">
                        
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-primary-subtle text-primary rounded-3 p-3 d-flex align-items-center justify-content-center" style="width: 55px; height: 55px;">
                                <i class="fa-solid fa-building-columns fs-5"></i>
                            </div>
                            <div>
                                <span class="fw-bold text-dark fs-5 d-block">
                                    <?= htmlspecialchars($row['nama_organisasi']); ?>
                                </span>
                                
                                <div class="d-flex flex-wrap align-items-center gap-3 mt-1 text-muted small">
                                    <span><i class="fa-regular fa-user me-1 text-secondary"></i> Ketua: <strong class="text-dark"><?= htmlspecialchars($row['ketua']); ?></strong></span>
                                    <span class="text-light-subtle">|</span>
                                    <span><i class="fa-regular fa-calendar me-1 text-secondary"></i> Berdiri: <strong class="text-dark"><?= $row['tahun_berdiri']; ?></strong></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center gap-2">
                            
                            <a href="index.php?page=organisasi_form&id=<?= $row['id_organisasi']; ?>" class="btn btn-sm btn-outline-warning text-dark fw-semibold px-3 rounded-2">
                                <i class="fa-regular fa-pen-to-square me-1"></i> Edit
                            </a>
                            <a href="proses.php?modul=organisasi&aksi=hapus&id=<?= $row['id_organisasi']; ?>" class="btn btn-sm btn-outline-danger fw-semibold px-3 rounded-2" onclick="return confirm('Apakah Anda yakin ingin menghapus organisasi ini?')">
                                <i class="fa-regular fa-trash-can me-1"></i> Hapus
                            </a>
                        </div>

                    </div>
                </div>

            <?php endwhile; ?>
        <?php else: ?>
            <div class="text-center p-5 border border-dashed border-secondary-subtle bg-white rounded-3">
                <i class="fa-solid fa-inbox text-muted fs-2 mb-3"></i>
                <p class="text-muted m-0 small">
                    <?= (!empty($search)) ? 'Data organisasi yang Anda cari tidak ditemukan.' : 'Belum ada entitas organisasi yang terdaftar.'; ?>
                </p>
            </div>
        <?php endif; ?>
    </div>
</div>