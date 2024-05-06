<?php
session_start();
include '../koneksi.php';

if (isset($_POST['kirim'])) {
    if (editAbout($_POST) > 0) {
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

$id_about = $_GET["id"];

// Query data mahasawa berdasarkan id
$data = query("SELECT * FROM tb_about WHERE id_about = $id_about")[0];


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
            <h1 class="title">Edit About</h1>
            <div class="line-title">
                <div></div>
            </div>
            <div class="input-contact">
                <form action="" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?php echo $data["id_about"] ?>">

                    <label for="judul">Nama</label>
                    <input type="text" placeholder="Masukkan nama" id="nama" name="nama" value="<?php echo $data["nama"]; ?>">

                    <label for="isi">Isi</label>
                    <textarea name="deskripsi" id="" cols="30" rows="6" placeholder="Masukkan isi" id="isi"><?php echo $data["deskripsi"]; ?></textarea>


                    <input type="submit" value="kirim" name="kirim">

                </form>
            </div>
        </div>
    </section>
    <!-- End Project -->

    <script src="../style.js"></script>



</body>

</html>