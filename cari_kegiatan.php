<?php
// Ambil kata kunci pencarian
$search = isset($_GET['search']) ? mysqli_real_escape_string($koneksi, $_GET['search']) : '';

//  LEFT JOIN ke tabel organisasi)
$query = "SELECT kegiatan.*, organisasi.nama_organisasi 
          FROM kegiatan 
          LEFT JOIN organisasi ON kegiatan.id_organisasi = organisasi.id_organisasi";

// Gabungkan Klausa WHERE jika user mengetik sesuatu di kolom pencarian
if ($search != '') {
    $query .= " WHERE kegiatan.nama_kegiatan LIKE '%$search%' 
                OR kegiatan.lokasi LIKE '%$search%' 
                OR kegiatan.status LIKE '%$search%' 
                OR organisasi.nama_organisasi LIKE '%$search%'";
}

// Susun bagian akhir dengan pengurutan data terbaru
$query .= " ORDER BY kegiatan.id_kegiatan DESC";

// Eksekusi perintah ke database
$result = mysqli_query($koneksi, $query);
?>