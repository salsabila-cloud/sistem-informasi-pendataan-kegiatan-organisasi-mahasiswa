<?php
include "cari_anggaran.php"; 
?>

<?php if (!empty($search)): ?>
    <div class="alert alert-light border border-light-subtle text-muted small mb-3 d-flex justify-content-between align-items-center shadow-sm rounded-3">
        <span>Menampilkan hasil pencarian anggaran untuk: <strong class="text-dark">"<?= htmlspecialchars($search); ?>"</strong></span>
        <a href="index.php?page=anggaran" class="btn btn-sm btn-outline-danger border-0 fw-bold py-0 text-decoration-none"> Bersihkan</a>
    </div>
<?php endif; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold text-dark mb-0">Alokasi Anggaran Keuangan</h3>
    </div>
    <a href="index.php?page=anggaran_form" class="btn btn-primary px-4 fw-semibold shadow-sm">
        <i class="fa-solid fa-file-invoice-dollar me-2"></i>Input Laporan Kas
    </a>
</div>

<div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-primary text-secondary">
                <tr>
                    <th>Nama Kegiatan Operasional / Sumber Dana</th>
                    <th>Jumlah Anggaran</th>
                    <th>Total Pengeluaran</th>
                    <th>Sisa Saldo Kas</th>
                    <th class="text-center" width="130">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(mysqli_num_rows($result) > 0): while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td>
                        <strong class="text-dark d-block"><?= htmlspecialchars($row['nama_kegiatan']); ?></strong>
                        <small class="text-muted">Sumber: <?= htmlspecialchars($row['sumber_dana']); ?></small>
                    </td>
                    <td class="fw-bold text-dark">Rp <?= number_format($row['jumlah_anggaran'], 2, ',', '.'); ?></td>
                    <td class="text-danger fw-medium">Rp <?= number_format($row['jumlah_terpakai'], 2, ',', '.'); ?></td>
                    <td class="text-success fw-bold">Rp <?= number_format($row['sisa_anggaran'], 2, ',', '.'); ?></td>
                    <td class="text-center">
                        <a href="index.php?page=anggaran_form&id=<?= $row['id_anggaran']; ?>" class="btn btn-sm btn-warning text-dark me-1"><i class="fa-solid fa-pen-clip"></i></a>
                        <a href="proses.php?modul=anggaran&aksi=hapus&id=<?= $row['id_anggaran']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus pelaporan anggaran?')"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
                <?php endwhile; else: ?>
                <tr>
                    <td colspan="5" class="text-center py-4 text-muted small">
                        <?= (!empty($search)) ? 'Data alokasi anggaran yang Anda cari tidak ditemukan.' : 'Belum ada sirkulasi neraca alokasi dana kegiatan masuk.'; ?>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>