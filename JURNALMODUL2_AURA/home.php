<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <!-- Hero -->
     <div class="container">
        <div class="row">
            <div class="col-md-12 text-center p-5 hero-text">
                <h1>Selamat Datang di EAD Library</h1>
                <br>
                <img src="logo-ead.png" alt="EAD Library" width="800px">
                <br>
                <p>EAD Library adalah website manajemen perpustakaan yang menyediakan katalog buku dan informasi seputar buku.</p>
            </div>
            <div class="row justify-content-center gap-3 mt-4">
                <a href="katalog_buku.php" class="btn btn-primary w-50">Katalog Buku</a>
                <a href="tambah_buku.php" class="btn btn-outline-primary w-50">Tambah Buku</a>
            </div>
        </div>
     </div>
</body>
</html>