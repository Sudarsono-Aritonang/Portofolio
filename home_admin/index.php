<?php
session_start();
include '../koneksi.php';
$ambilHome = query("SELECT * FROM tb_home ");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../home_admin/style.css">
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
                        <li><a href="#home" class="active">Home</a></li>
                        <li><a href="../about_admin/index.php">About</a></li>
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

    <!-- Home -->
    <section id="home" class="home main-container">
        <div class="contact">
            <h1 class="title">Home</h1>
            <div class="line-title">
                <div></div>
            </div>
            <div class="form-contact">
                <form action="" method="post">
                    <table class="tabel-contact">
                        <tr>
                            <th class="column1">Nama</th>
                            <th class="column2">Deskripsi</th>
                            <th class="column3">Dokumen</th>
                            <th class="column4">Foto Home</th>
                            <th class="column5">Aksi</th>
                        </tr>
                        <?php foreach ($ambilHome as $row) : ?>
                            <tr>
                                <td><?php echo $row["nama"] ?></td>
                                <td><?php echo $row["deskripsi"] ?></td>
                                <td><?php echo $row["dokumen"] ?></td>
                                <td><img src="../images/<?php echo $row["gambar"] ?>" alt="" width="200px" height="300px"> </td>
                                <td><a href="../home_admin/edit_home.php?id= <?php echo $row["id"]; ?>" style="color: green; font-weight: 500; font-size: 15;">Edit</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </form>

            </div>
        </div>
    </section>

    <!-- End Home -->

    <script src="../style.js"></script>



</body>

</html>