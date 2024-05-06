<?php
session_start();
include '../koneksi.php';
if (isset($_POST['kirim'])) {
    if (simpan($_POST) > 0) {
        echo "<script>
        alert('Data berhasil ditambahkan');
        document.location.href='admin.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal ditambahkan');
        document.location.href='./';
        </script>";
    }
}

$ambilAbout = query("SELECT * FROM tb_about");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../about_admin/style.css">
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
                        <li><a href="#" class="active">About</a></li>
                        <li><a href="../project_admin/index.php">Project</a></li>
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

    <!-- About -->
    <section id="about">
        <div class="about main-container">
            <h1 class="title">About Me</h1>
            <div class="line-title">
                <div></div>
            </div>
            <?php foreach ($ambilAbout as $row) : ?>
                <table class="tabel-contact">
                    <tr>
                        <th class="column1">No</th>
                        <th class="column2">Nama</th>
                        <th class="column3">Deskripsi</th>
                        <th class="column4">Aksi</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td><?php echo $row["nama"]; ?></td>
                        <td><?php echo $row["deskripsi"]; ?></td>
                        <td><a href="../about_admin/edit_about.php?id= <?php echo $row["id_about"]; ?>" style="color: green; font-weight: 500; font-size: 15;">Edit</a></td>
                    </tr>

                </table>

            <?php endforeach; ?>
        </div>
    </section>
    <!-- End About -->

    <script src="../style.js"></script>



</body>

</html>