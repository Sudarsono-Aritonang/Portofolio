<?php
session_start();
include '../koneksi.php';
if (isset($_POST['kirim'])) {
    if (simpan($_POST) > 0) {
        echo "<script>
        alert('Data berhasil ditambahkan');
        document.location.href='./';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal ditambahkan');
        document.location.href='./';
        </script>";
    }
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../project_admin/style.css">
    <link rel="stylesheet" href="../responsive.css">
</head>

<body>

    <header id="navbar">
        <div class="main-container">
            <div class="nav">
                <div class="left-nav">
                    <a href="#">Sudarsono Aritonang</a>
                </div>
                <nav class="right-nav">
                    <ul>
                        <li><a href="../home_admin/index.php">Home</a></li>
                        <li><a href="../about_admin/index.php">About</a></li>
                        <li><a href="#" class="active">Project</a></li>
                        <li><a href="../contact_admin/index.php">Contact</a></li>
                    </ul>
                </nav>
                <div class="burger">
                    <div class="line-1"></div>
                    <div class="line-2"></div>
                    <div class="line-3"></div>
                </div>
            </div>
        </div>
    </header>
    <!-- End Navbar -->

    <!-- Project -->
    <section id="project">
        <div class="project main-container">
            <h1 class="title">Tambah Project</h1>
            <div class="line-title">
                <div></div>
            </div>
            <div class="input-contact">
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="judul">Judul</label>
                    <input type="text" placeholder="Masukkan judul" id="judul" name="judul">

                    <label for="gambar">Tanggal Mulai</label>
                    <input type="date" id="tanggal_mulai" name="tanggal_mulai">

                    <label for="gambar">Tanggal Selesai</label>
                    <input type="date" id="tanggal_selesai" name="tanggal_selesai">

                    <label for="isi">Isi</label>
                    <textarea name="isi" id="" cols="30" rows="6" placeholder="Masukkan isi" id="isi"></textarea>


                    <label for="gambar">Gambar</label>
                    <input type="file" placeholder=" Masukkan gambar" id="gambar" name="gambar">

                    <input type="submit" value="kirim" name="kirim">
                </form>
            </div>
        </div>
    </section>
    <!-- End Project -->

    <script src="../style.js"></script>



</body>

</html>