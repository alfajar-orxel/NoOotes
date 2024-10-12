<!-- Koneksi -->
<?php
    include "koneksi.php";

    // Cek apakah form sudah disubmit
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];

        // Insert data catatan ke dalam database
        $query = "INSERT INTO catatan (judul, isi) VALUES ('$judul', '$isi')";
        
        if (mysqli_query($koneksi, $query)) {
            // Jika berhasil redirect ke halaman utama
            header("Location: index.php");
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Note</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <div class="container-fluid">
        <img src="img/iconn.png" style="height: 70px; width: 70px">
            <a class="navbar-brand" href="#">NoOotes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" href="about.php">About Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Form untuk menambahkan catatan baru -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-15">
                <div class="card">
                    <div class="card-header">
                        <h3>Tambah Catatan Baru</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="form-group mb-3">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan judul catatan" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="isi">Isi</label>
                                <textarea name="isi" id="isi" class="form-control" rows="10" placeholder="Masukkan isi catatan" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Catatan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
