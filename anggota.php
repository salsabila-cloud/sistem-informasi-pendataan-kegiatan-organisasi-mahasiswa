<?php
include "cari_anggota.php"; 
?>

<?php if (!empty($search)): ?>
    <div class="alert alert-light border border-light-subtle text-muted small mb-3 d-flex justify-content-between align-items-center shadow-sm rounded-3">
        <span>Menampilkan hasil pencarian anggota untuk: <strong class="text-dark">"<?= htmlspecialchars($search); ?>"</strong></span>
        <a href="index.php?page=anggota" class="btn btn-sm btn-outline-danger border-0 fw-bold py-0 text-decoration-none">Bersihkan</a>
    </div>
<?php endif; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold text-dark mb-0">Daftar Anggota Pengurus</h3>
    </div>
    <a href="index.php?page=anggota_form" class="btn btn-primary px-4 fw-semibold shadow-sm">
        <i class="fa-solid fa-user-plus me-2"></i>Tambah Anggota
    </a>
</div>

<div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-primary text-secondary">
                <tr>
                    <th>Biodata Pengurus</th>
                    <th>Program Studi</th>
                    <th>Jabatan</th>
                    <th>Jenis Organisasi</th>
                    <th>Status</th>
                    <th class="text-center" width="130">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(mysqli_num_rows($result) > 0): while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td>
                        <strong class="text-dark d-block"><?= htmlspecialchars($row['nama_anggota']); ?></strong>
                        <span class="text-muted small">NIM. <?= htmlspecialchars($row['nim']); ?></span>
                    </td>
                    <td><?= htmlspecialchars($row['prodi']); ?></td>
                    <td class="fw-semibold text-secondary"><?= htmlspecialchars($row['jabatan']); ?></td>
                    <td><span class="badge bg-primary-subtle text-primary border px-2 py-1"><?= $row['nama_organisasi'] ?? 'Mandiri'; ?></span></td>
                    <td><span class="badge <?= $row['status']=='Aktif'?'bg-success':'bg-danger'; ?>"><?= $row['status']; ?></span></td>
                    <td class="text-center">
                        <a href="index.php?page=anggota_form&id=<?= $row['id_anggota']; ?>" class="btn btn-sm btn-warning text-dark me-1"><i class="fa-solid fa-pen"></i></a>
                        <a href="proses.php?modul=anggota&aksi=hapus&id=<?= $row['id_anggota']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus keanggotaan pengurus?')"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <?php endwhile; else: ?>
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted small">
                        <?= (!empty($search)) ? 'Data pengurus yang Anda cari tidak ditemukan.' : 'Belum tersedia rekaman data fungsionaris anggota.'; ?>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>