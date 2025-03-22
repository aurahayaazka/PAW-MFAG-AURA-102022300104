<?php
include('connect.php');

// Cek Apakah ada data yang dikirim
if (isset($_GET['edit'])){
    $id = $_POST["id"];
    $judul = $_POST["judul"];
    $penulis = $_POST["penulis"];
    $tahun_terbit = $_POST["tahun_terbit"];


    // Definisikan query untuk menampilkan data
    $query = "INSERT INTO tb_buku ( id, judul, penulis, tahun_terbit )
    VALUES ('$id', '$judul', '$penulis', '$tahun_terbit')";
    mysqli_query($conn, $query);

    $data = mysqli_query($conn,$query);
    $buku = mysqli_fetch_assoc($data);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <?php include('navbar.php');?>
    <center>
        <div class="container">
            <h1>Ubah Detail Buku</h1>
            <div class="col-md-4 p-3">
                <div class="card">
                    <div class="card-body">
                        <form action="update.php?id=<?=$id?>" method="POST" enctype="multipart/form-data">
                            <div class="form-floating mb-3">
                                <input type="string" class="form-control" name="judul" id="judul" value="<?=$buku['judul']?>" required>
                                <label for="judul">Judul</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="string" class="form-control" name="penulis" id="penulis" value="<?=$buku['penulis']?>">
                                <label for="penulis">Penulis</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="string" class="form-control" name="tahun_terbit" id="tahun_terbit" value="<?=$buku['tahun_terbit']?>" required>
                                <label for="tahun_terbit">Tahun Terbit</label>
                            </div>
                            <button type="submit" name="update" id="update" class="btn btn-primary mb-3 mt-3 w-100">Ubah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </center>

</body>
</html>