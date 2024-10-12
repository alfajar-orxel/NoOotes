<!-- Koneksi -->
<?php
    include "koneksi.php";

    // Query untuk mengambil data catatan dari database
    $query = "SELECT * FROM catatan";
    $result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My NoOotes</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,400;1,700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">

    <style>
       
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <div class="container-fluid">
            <img src="img/iconn.png" style="height: 70px; width: 70px; margin-left: 1rem">
            <a class="navbar-brand" href="#">NoOotes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="about.php">About Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Section for Notes -->
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            
            <!-- Card untuk menambahkan catatan baru -->
            <div class="col">
                <div class="card text-center h-100">
                    <div class="card-body d-flex justify-content-center align-items-center" style="height: 250px;">
                        <a href="create.php" class="text-decoration-none text-dark">
                            <i class="fas fa-plus fa-3x"></i>
                            <p class="mt-3">Tambah Catatan Baru</p>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Looping untuk menampilkan catatan dari database -->
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['judul']; ?></h5>
                            <p class="card-text text-muted"><?php echo $row['isi']; ?></p>
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin dek?')">Delete</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
