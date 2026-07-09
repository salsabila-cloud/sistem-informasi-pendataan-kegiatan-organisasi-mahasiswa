<?php
$id = $_GET['id'] ?? '';
$data = ['id_organisasi'=>'', 'nama_kegiatan'=>'', 'tanggal_mulai'=>'', 'tanggal_selesai'=>'', 'lokasi'=>'', 'status'=>'Terencana'];

if (!empty($id)) {
    $res = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE id_kegiatan = '$id'");
    $data = mysqli_fetch_assoc($res);
}
$ormawa_select = mysqli_query($koneksi, "SELECT id_organisasi, nama_organisasi FROM organisasi");
?>
<div class="card col-md-6 mx-auto shadow-sm border-0 mt-3">
    <div class="card-header bg-primary text-white fw-bold py-3"><i class="fa-solid fa-calendar-check me-2"></i> Form Jadual Kegiatan</div>
    <div class="card-body p-4 bg-white rounded-bottom">
        <form action="proses.php?modul=kegiatan" method="POST">
            <input type="hidden" name="id_kegiatan" value="<?= $id; ?>">
            <div class="mb-3">
                <label class="form-label fw-medium small">Instansi Pelaksana</label>
                <select name="id_organisasi" class="form-select" required>
                    <option value="">-- Pilih Ormawa --</option>
                    <?php while($o = mysqli_fetch_assoc($ormawa_select)): ?>
                        <option value="<?= $o['id_organisasi']; ?>" <?= $data['id_organisasi'] == $o['id_organisasi'] ? 'selected' : ''; ?>><?= htmlspecialchars($o['nama_organisasi']); ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label fw-medium small">Nama Kegiatan Acara</label>
                <input type="text" name="nama_kegiatan" class="form-control" value="<?= htmlspecialchars($data['nama_kegiatan']); ?>" required>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-medium small">Waktu Mulai</label>
                    <input type="datetime-local" name="tanggal_mulai" class="form-control" value="<?= !empty($data['tanggal_mulai']) ? date('Y-m-d\TH:i', strtotime($data['tanggal_mulai'])) : ''; ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-medium small">Waktu Selesai</label>
                    <input type="datetime-local" name="tanggal_selesai" class="form-control" value="<?= !empty($data['tanggal_selesai']) ? date('Y-m-d\TH:i', strtotime($data['tanggal_selesai'])) : ''; ?>" required>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-7">
                    <label class="form-label fw-medium small">Tempat / Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" value="<?= htmlspecialchars($data['lokasi']); ?>" required>
                </div>
                <div class="col-md-5">
                    <label class="form-label fw-medium small">Status Alur</label>
                    <select name="status" class="form-select">
                        <option value="Terencana" <?= $data['status']=='Terencana'?'selected':''; ?>>Terencana</option>
                        <option value="Terlaksana" <?= $data['status']=='Terlaksana'?'selected':''; ?>>Terlaksana</option>
                        <option value="Batal" <?= $data['status']=='Batal'?'selected':''; ?>>Batal</option>
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <a href="index.php?page=kegiatan" class="btn btn-light border btn-sm px-3 text-secondary">Batal</a>
                <button type="submit" name="simpan" class="btn btn-primary  btn-sm px-4 fw-bold">Simpan Kegiatan</button>
            </div>
        </form>
    </div>
</div>