<?php

$query = "SELECT * FROM organisasi";

// Ambil kata kunci pencarian
$search = isset($_GET['search']) ? mysqli_real_escape_string($koneksi, $_GET['search']) : '';

if ($search != '') {
    $query .= " WHERE nama_organisasi LIKE '%$search%' 
                OR ketua LIKE '%$search%'";
}

// Eksekusi query ke database
$result = mysqli_query($koneksi, $query);
?>