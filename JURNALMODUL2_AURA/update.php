<?php
include 'connect.php';

// Cek Apakah ada data yang dikirim
if (isset($_POST['update'])) {
    $id = $_POST['id_buku'];
    $judul = $_POST['judul_buku'];
    $penulis = $_POST['penulis_buku'];
    $tahun_terbit = $_POST['tahun_terbit'];

    // Buatlah query untuk update data
    $query ="UPDATE db_buku SET
            id_buku='$id',
            judul_buku='$judul',
            penulis_buku='$penulis',
            tahun_terbit='$tahun_terbit'
            WHERE id_buku=$id";
    

    $test = mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        header("location: katalog_buku.php");
    } else {
        echo "<script>alert('Data gagal ditambahkan');</script>";
    }
}
?>