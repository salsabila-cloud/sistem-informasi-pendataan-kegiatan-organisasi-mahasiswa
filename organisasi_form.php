<?php
$id = $_GET['id'] ?? '';
$data = ['nama_organisasi' => '', 'ketua' => '', 'tahun_berdiri' => ''];

if (!empty($id)) {
    $res = mysqli_query($koneksi, "SELECT * FROM organisasi WHERE id_organisasi = '$id'");
    $data = mysqli_fetch_assoc($res);
}
?>
<div class="card col-md-6 mx-auto shadow-sm border-0 mt-3">
    <div class="card-header bg-primary text-white fw-bold py-3"><i class="fa-solid fa-file-pen me-2"></i> Form <?= empty($id) ? 'Input' : 'Edit'; ?> Organisasi</div>
    <div class="card-body p-4 bg-white rounded-bottom">
        <form action="proses.php?modul=organisasi" method="POST">
            <input type="hidden" name="id_organisasi" value="<?= $id; ?>">
            <div class="mb-3">
                <label class="form-label fw-medium small">Nama Organisasi</label>
                <input type="text" name="nama_organisasi" class="form-control" value="<?= htmlspecialchars($data['nama_organisasi']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-medium small">Ketua Umum</label>
                <input type="text" name="ketua" class="form-control" value="<?= htmlspecialchars($data['ketua']); ?>" required>
            </div>
            <div class="mb-4">
                <label class="form-label fw-medium small">Tahun Berdiri</label>
                <input type="number" name="tahun_berdiri" class="form-control" min="1950" max="2026" value="<?= $data['tahun_berdiri']; ?>" required>
            </div>
            <div class="d-flex justify-content-between">
                <a href="index.php?page=organisasi" class="btn btn-light border btn-sm px-3 text-secondary">Batal</a>
                <button type="submit" name="simpan" class="btn btn-primary btn-sm px-4 fw-semibold">Simpan Data</button>
            </div>
        </form>
    </div>
</div>