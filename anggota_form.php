<?php
$id = $_GET['id'] ?? '';
$data = ['id_organisasi'=>'', 'nim'=>'', 'nama_anggota'=>'', 'prodi'=>'', 'status'=>'Aktif', 'jabatan'=>''];

if (!empty($id)) {
    $res = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id_anggota = '$id'");
    $data = mysqli_fetch_assoc($res);
}
$ormawa_list = mysqli_query($koneksi, "SELECT id_organisasi, nama_organisasi FROM organisasi");
?>
<div class="card col-md-6 mx-auto shadow-sm border-0 mt-3">
    <div class="card-header bg-primary text-white fw-bold py-3"><i class="fa-solid fa-user-gear me-2"></i> Pengaturan Anggota</div>
    <div class="card-body p-4 bg-white rounded-bottom">
        <form action="proses.php?modul=anggota" method="POST">
            <input type="hidden" name="id_anggota" value="<?= $id; ?>">
            <div class="mb-3">
                <label class="form-label fw-medium small">Organisasi Naungan</label>
                <select name="id_organisasi" class="form-select text-dark" required>
                    <option value="">-- Pilih Lembaga --</option>
                    <?php while($o = mysqli_fetch_assoc($ormawa_list)): ?>
                        <option value="<?= $o['id_organisasi']; ?>" <?= $data['id_organisasi'] == $o['id_organisasi'] ? 'selected' : ''; ?>><?= htmlspecialchars($o['nama_organisasi']); ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="row mb-3">
                <div class="col-md-5">
                    <label class="form-label fw-medium small">NIM</label>
                    <input type="number" name="nim" class="form-control" value="<?= htmlspecialchars($data['nim']); ?>" required>
                </div>
                <div class="col-md-7">
                    <label class="form-label fw-medium small">Nama Anggota</label>
                    <input type="text" name="nama_anggota" class="form-control" value="<?= htmlspecialchars($data['nama_anggota']); ?>" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label fw-medium small">Program Studi</label>
                <input type="text" name="prodi" class="form-control" value="<?= htmlspecialchars($data['prodi']); ?>" required>
            </div>
            <div class="row mb-4">
                <div class="col-md-7">
                    <label class="form-label fw-medium small">Jabatan Mandat</label>
                    <input type="text" name="jabatan" class="form-control" value="<?= htmlspecialchars($data['jabatan']); ?>" required>
                </div>
                <div class="col-md-5">
                    <label class="form-label fw-medium small">Status Keaktifan</label>
                    <select name="status" class="form-select">
                        <option value="Aktif" <?= $data['status']=='Aktif'?'selected':''; ?>>Aktif</option>
                        <option value="Demisioner" <?= $data['status']=='Demisioner'?'selected':''; ?>>Demisioner</option>
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <a href="index.php?page=anggota" class="btn btn-light border btn-sm px-3 text-secondary">Batal</a>
                <button type="submit" name="simpan" class="btn btn-primary btn-sm px-4 fw-semibold">Simpan Pengurus</button>
            </div>
        </form>
    </div>
</div>