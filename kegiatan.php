<?php
include "cari_kegiatan.php"; 
?>

<?php if (!empty($search)): ?>
    <div class="alert alert-light border border-light-subtle text-muted small mb-3 d-flex justify-content-between align-items-center shadow-sm rounded-3">
        <span>Menampilkan hasil pencarian agenda untuk: <strong class="text-dark">"<?= htmlspecialchars($search); ?>"</strong></span>
        <a href="index.php?page=kegiatan" class="btn btn-sm btn-outline-danger border-0 fw-bold py-0 text-decoration-none"> Bersihkan</a>
    </div>
<?php endif; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold text-dark mb-0">Agenda Kegiatan Ormawa</h3>
    </div>
    <a href="index.php?page=kegiatan_form" class="btn btn-primary px-4 text-white fw-bold shadow-sm">
        <i class="fa-solid fa-calendar-plus me-2"></i>Buat Kegiatan
    </a>
</div>

<div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-primary text-secondary">
                <tr>
                    <th>Nama Program / Pelaksana</th>
                    <th>Timeline Pelaksanaan</th>
                    <th>Lokasi Ruangan</th>
                    <th>Status Progress</th>
                    <th class="text-center" width="130">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(mysqli_num_rows($result) > 0): while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td>
                        <strong class="text-dark d-block"><?= htmlspecialchars($row['nama_kegiatan']); ?></strong>
                        <span class="text-muted small"><i class="fa-solid fa-users me-1"></i><?= htmlspecialchars($row['nama_organisasi']); ?></span>
                    </td>
                    <td>
                        <span class="d-block small text-success fw-medium">Start: <?= date('d M Y H:i', strtotime($row['tanggal_mulai'])); ?></span>
                        <span class="small text-muted">End: <?= date('d M Y H:i', strtotime($row['tanggal_selesai'])); ?></span>
                    </td>
                    <td><i class="fa-solid text-danger me-1 small"></i><?= htmlspecialchars($row['lokasi']); ?></td>
                    <td><span class="badge bg-secondary text-white"><?= $row['status']; ?></span></td>
                    <td class="text-center">
                        <a href="index.php?page=kegiatan_form&id=<?= $row['id_kegiatan']; ?>" class="btn btn-sm btn-warning text-dark me-1"><i class="fa-solid fa-marker"></i></a>
                        <a href="proses.php?modul=kegiatan&aksi=hapus&id=<?= $row['id_kegiatan']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Batalkan agenda kegiatan ini?')"><i class="fa-solid fa-eraser"></i></a>
                    </td>
                </tr>
                <?php endwhile; else: ?>
                <tr>
                    <td colspan="5" class="text-center py-4 text-muted small">
                        <?= (!empty($search)) ? 'Agenda kegiatan yang Anda cari tidak dapat ditemukan.' : 'Belum terdata jadual kegiatan kerja terdekat.'; ?>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>