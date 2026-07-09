<?php
//Tangkap kata kunci pencarian 
$search = isset($_GET['search']) ? mysqli_real_escape_string($koneksi, $_GET['search']) : '';

// INNER JOIN ke tabel kegiatan
$query = "SELECT anggaran.*, kegiatan.nama_kegiatan 
          FROM anggaran 
          INNER JOIN kegiatan ON anggaran.id_kegiatan = kegiatan.id_kegiatan";

//Gabungkan klausa WHERE jika ada kata kunci pencarian
if ($search != '') {
    $query .= " WHERE kegiatan.nama_kegiatan LIKE '%$search%' 
                OR anggaran.sumber_dana LIKE '%$search%'";
}

//Tambahkan pengurutan data terbaru di akhir query
$query .= " ORDER BY anggaran.id_anggaran DESC";

//Eksekusi query ke database
$result = mysqli_query($koneksi, $query);
?>