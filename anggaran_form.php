<?php
$id = $_GET['id'] ?? '';
$data = ['id_kegiatan'=>'', 'sumber_dana'=>'', 'jumlah_anggaran'=>0, 'jumlah_terpakai'=>0, 'keterangan'=>''];

if (!empty($id)) {
    $res = mysqli_query($koneksi, "SELECT * FROM anggaran WHERE id_anggaran = '$id'");
    $data = mysqli_fetch_assoc($res);
}
$kegiatan_list = mysqli_query($koneksi, "SELECT id_kegiatan, nama_kegiatan FROM kegiatan");
?>
<div class="card col-md-6 mx-auto shadow-sm border-0 mt-3">
    <div class="card-header bg-primary text-white fw-bold py-3"><i class="fa-solid fa-wallet me-2"></i> Catatan Pembukuan Anggaran</div>
    <div class="card-body p-4 bg-white rounded-bottom">
        <form action="proses.php?modul=anggaran" method="POST" oninput="hitungSisaUang()">
            <input type="hidden" name="id_anggaran" value="<?= $id; ?>">
            <div class="mb-3">
                <label class="form-label fw-medium small">Gunakan Pada Kegiatan</label>
                <select name="id_kegiatan" class="form-select" required>
                    <option value="">-- Pilih Agenda --</option>
                    <?php while($k = mysqli_fetch_assoc($kegiatan_list)): ?>
                        <option value="<?= $k['id_kegiatan']; ?>" <?= $data['id_kegiatan'] == $k['id_kegiatan'] ? 'selected' : ''; ?>><?= htmlspecialchars($k['nama_kegiatan']); ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label fw-medium small">Sumber Dana Pembiayaan</label>
                <input type="text" name="sumber_dana" class="form-control" value="<?= htmlspecialchars($data['sumber_dana']); ?>" required>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-medium small">Jumlah Anggaran (Rp)</label>
                    <input type="number" step="0.01" id="val_pagu" name="jumlah_anggaran" class="form-control" value="<?= $data['jumlah_anggaran']; ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-medium small">Dana Terpakai (Rp)</label>
                    <input type="number" step="0.01" id="val_terpakai" name="jumlah_terpakai" class="form-control" value="<?= $data['jumlah_terpakai']; ?>" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label fw-medium small text-muted">Sisa Anggaran Terkalkulasi (Rp)</label>
                <input type="number" step="0.01" id="val_sisa" name="sisa_anggaran" class="form-control bg-light fw-bold" readonly>
            </div>
            <div class="mb-4">
                <label class="form-label fw-medium small">Deskripsi/Keterangan Tambahan</label>
                <textarea name="keterangan" class="form-control" rows="2"><?= htmlspecialchars($data['keterangan']); ?></textarea>
            </div>
            <div class="d-flex justify-content-between">
                <a href="index.php?page=anggaran" class="btn btn-light border btn-sm px-3 text-secondary">Batal</a>
                <button type="submit" name="simpan" class="btn btn-primary btn-sm px-4 fw-semibold">Simpan Neraca</button>
            </div>
        </form>
    </div>
</div>

<script>
</script>