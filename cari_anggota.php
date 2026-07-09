<?php

// 1. Ambil kata kunci pencarian
$search = isset($_GET['search']) ? mysqli_real_escape_string($koneksi, $_GET['search']) : '';

// 2. Relational Databse Query
$query = "SELECT a.*, o.nama_organisasi 
          FROM anggota a 
          LEFT JOIN organisasi o ON a.id_organisasi = o.id_organisasi";

// Jika ada pencarian, sambung teks query di atas dengan WHERE
if ($search != '') {
    $query .= " WHERE a.nama_anggota LIKE '%$search%' 
                OR a.nim LIKE '%$search%' 
                OR a.prodi LIKE '%$search%' 
                OR a.jabatan LIKE '%$search%' 
                OR o.nama_organisasi LIKE '%$search%'";
}
$result = mysqli_query($koneksi, $query);
?>