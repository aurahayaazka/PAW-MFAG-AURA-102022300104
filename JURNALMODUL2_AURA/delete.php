<?php
include 'connect.php';

// Cek Apakah ada data yang dikirim
if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    // Definisikan query untuk menghapus data
    $delete_query = "DELETE FROM db_buku WHERE id = $id ";

    // Jalankan query
    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        header("location: katalog_buku.php");
    } else {
        echo "<script>alert('Data gagal dihapus');</script>";
    }
}
?>