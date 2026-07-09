<?php
// koneksi database
include 'koneksi.php';

// Ambil halaman yang dipilih pengguna dari URL parameter, default ke 'organisasi'
$page = $_GET['page'] ?? 'organisasi';

//UI Layout Utama
include 'includes/header.php';
include 'includes/navbar.php';

// footer
echo '<main class="flex-grow-1 py-4">';
echo '<div class="container-fluid px-4">';

// Logika Buka-Tutup (Include) 
switch ($page) {
    case 'organisasi':
        include 'modul_organisasi/organisasi.php';
        break;
    case 'organisasi_form':
        include 'modul_organisasi/organisasi_form.php';
        break;
    case 'anggota':
        include 'modul_anggota/anggota.php';
        break;
    case 'anggota_form':
        include 'modul_anggota/anggota_form.php';
        break;
    case 'kegiatan':
        include 'modul_kegiatan/kegiatan.php';
        break;
    case 'kegiatan_form':
        include 'modul_kegiatan/kegiatan_form.php';
        break;
    case 'anggaran':
        include 'modul_anggaran/anggaran.php';
        break;
    case 'anggaran_form':
        include 'modul_anggaran/anggaran_form.php';
        break;
    default:
        echo "
        <div class='card text-center p-5 border-0 shadow-sm'>
            <div class='card-body'>
                <i class='fa-solid fa-triangle-exclamation fa-3x text-warning mb-3'></i>
                <h4 class='fw-bold text-dark'>Halaman Tidak Ditemukan</h4>
                <p class='text-muted small'>Mohon periksa kembali link menu atau parameter navigasi Anda.</p>
                <a href='index.php?page=organisasi' class='btn btn-primary btn-sm px-4 fw-semibold mt-2'>Kembali ke Dashboard</a>
            </div>
        </div>";
        break;
}

echo '</div>'; // Penutup container-fluid
echo '</main>'; // Penutup main

include 'includes/footer.php';
?>