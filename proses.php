<?php
include 'koneksi.php';

$target = $_GET['modul'] ?? '';
$aksi   = $_GET['aksi'] ?? '';

//proses organisasi
if ($target == 'organisasi') {
    if (isset($_POST['simpan'])) {
        $id    = $_POST['id_organisasi'];
        $nama  = mysqli_real_escape_string($koneksi, $_POST['nama_organisasi']);
        $ketua = mysqli_real_escape_string($koneksi, $_POST['ketua']);
        $tahun = mysqli_real_escape_string($koneksi, $_POST['tahun_berdiri']);

        if (empty($id)) {
            $query = "INSERT INTO organisasi (nama_organisasi, ketua, tahun_berdiri) VALUES ('$nama', '$ketua', '$tahun')";
        } else {
            $query = "UPDATE organisasi SET nama_organisasi='$nama', ketua='$ketua', tahun_berdiri='$tahun' WHERE id_organisasi='$id'";
        }
        mysqli_query($koneksi, $query);
    } elseif ($aksi == 'hapus') {
        $id = $_GET['id'];
        mysqli_query($koneksi, "DELETE FROM organisasi WHERE id_organisasi='$id'");
    }
    header("Location: index.php?page=organisasi");
    exit;
}

//proses anggota
if ($target == 'anggota') {
    if (isset($_POST['simpan'])) {
        $id      = $_POST['id_anggota'];
        $id_org  = $_POST['id_organisasi'];
        $nim     = mysqli_real_escape_string($koneksi, $_POST['nim']);
        $nama    = mysqli_real_escape_string($koneksi, $_POST['nama_anggota']);
        $prodi   = mysqli_real_escape_string($koneksi, $_POST['prodi']);
        $status  = $_POST['status'];
        $jabatan = mysqli_real_escape_string($koneksi, $_POST['jabatan']);

        if (empty($id)) {
            $query = "INSERT INTO anggota (id_organisasi, nim, nama_anggota, prodi, status, jabatan) VALUES ('$id_org', '$nim', '$nama', '$prodi', '$status', '$jabatan')";
        } else {
            $query = "UPDATE anggota SET id_organisasi='$id_org', nim='$nim', nama_anggota='$nama', prodi='$prodi', status='$status', jabatan='$jabatan' WHERE id_anggota='$id'";
        }
        mysqli_query($koneksi, $query);
    } elseif ($aksi == 'hapus') {
        $id = $_GET['id'];
        mysqli_query($koneksi, "DELETE FROM anggota WHERE id_anggota='$id'");
    }
    header("Location: index.php?page=anggota");
    exit;
}

//proses kegiatan
if ($target == 'kegiatan') {
    if (isset($_POST['simpan'])) {
        $id       = $_POST['id_kegiatan'];
        $id_org   = $_POST['id_organisasi'];
        $nama     = mysqli_real_escape_string($koneksi, $_POST['nama_kegiatan']);
        $mulai    = $_POST['tanggal_mulai'];
        $selesai  = $_POST['tanggal_selesai'];
        $lokasi   = mysqli_real_escape_string($koneksi, $_POST['lokasi']);
        $status   = $_POST['status'];

        if (empty($id)) {
            $query = "INSERT INTO kegiatan (id_organisasi, nama_kegiatan, tanggal_mulai, tanggal_selesai, lokasi, status) VALUES ('$id_org', '$nama', '$mulai', '$selesai', '$lokasi', '$status')";
        } else {
            $query = "UPDATE kegiatan SET id_organisasi='$id_org', nama_kegiatan='$nama', tanggal_mulai='$mulai', tanggal_selesai='$selesai', lokasi='$lokasi', status='$status' WHERE id_kegiatan='$id'";
        }
        mysqli_query($koneksi, $query);
    } elseif ($aksi == 'hapus') {
        $id = $_GET['id'];
        mysqli_query($koneksi, "DELETE FROM kegiatan WHERE id_kegiatan='$id'");
    }
    header("Location: index.php?page=kegiatan");
    exit;
}

//proses anggaran
if ($target == 'anggaran') {
    if (isset($_POST['simpan'])) {
        $id       = $_POST['id_anggaran'];
        $id_keg   = $_POST['id_kegiatan'];
        $sumber   = mysqli_real_escape_string($koneksi, $_POST['sumber_dana']);
        $pagu     = $_POST['jumlah_anggaran'];
        $terpakai = $_POST['jumlah_terpakai'];
        $sisa     = $pagu - $terpakai;
        $ket      = mysqli_real_escape_string($koneksi, $_POST['keterangan']);

        if (empty($id)) {
            $query = "INSERT INTO anggaran (id_kegiatan, sumber_dana, jumlah_anggaran, jumlah_terpakai, sisa_anggaran, keterangan) VALUES ('$id_keg', '$sumber', '$pagu', '$terpakai', '$sisa', '$ket')";
        } else {
            $query = "UPDATE anggaran SET id_kegiatan='$id_keg', sumber_dana='$sumber', jumlah_anggaran='$pagu', jumlah_terpakai='$terpakai', sisa_anggaran='$sisa', keterangan='$ket' WHERE id_anggaran='$id'";
        }
        mysqli_query($koneksi, $query);
    } elseif ($aksi == 'hapus') {
        $id = $_GET['id'];
        mysqli_query($koneksi, "DELETE FROM anggaran WHERE id_anggaran='$id'");
    }
    header("Location: index.php?page=anggaran");
    exit;
}
?>