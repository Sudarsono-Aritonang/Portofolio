<?php
session_start();
include '../koneksi.php';

if (isset($_POST['kirim'])) {
    if (edit($_POST) > 0) {
        echo "<script>
        alert('Data berhasil diedit');
        document.location.href='index.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal diedit');
        document.location.href='./';
        </script>";
    }
}

// ambil data dari url

$id = $_GET["id"];

// Query data mahasawa berdasarkan id
$data = query("SELECT * FROM project WHERE id = $id")[0];


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
            <h1 class="title">Edit Project</h1>
            <div class="line-title">
                <div></div>
            </div>
            <div class="input-contact">
                <form action="" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?php echo $data["id"] ?>">

                    <label for="judul">Judul</label>
                    <input type="text" placeholder="Masukkan judul" id="judul" name="judul" value="<?php echo $data["judul"]; ?>">

                    <label for="tanggal">Tanggal Mulai</label>
                    <input type="date" id="tanggal_mulai" name="tanggal_mulai" value="<?php echo $data["tanggal_mulai"]; ?>">

                    <label for="tanggal">Tanggal Selesai</label>
                    <input type="date" id="tanggal_selesai" name="tanggal_selesai" value="<?php echo $data["tanggal_selesai"]; ?>">

                    <label for="isi">Isi</label>
                    <textarea name="isi" id="" cols="30" rows="6" placeholder="Masukkan isi" id="isi"><?php echo $data["isi"]; ?></textarea>

                    <label for="gambar">Gambar</label>
                    <!-- Name attribute added for file input -->
                    <input type="file" id="gambar" name="gambar">
                    <!-- Display the current image filename if needed -->
                    <input type="text" disabled value="<?php echo $data["gambar"]; ?>">

                    <input type="submit" value="kirim" name="kirim">

                </form>
            </div>
        </div>
    </section>
    <!-- End Project -->

    <script src="../style.js"></script>



</body>

</html>