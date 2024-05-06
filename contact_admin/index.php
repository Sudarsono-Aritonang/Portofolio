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

// $ambil=query("SELECT * FROM project")

$ambilcontact = query("SELECT * FROM contact");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../contact_admin/style.css">
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
                        <li><a href="../project_admin/index.php">Project</a></li>
                        <li><a href="#" class="active">Contact</a></li>
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

    <!-- Start Contact Me -->
    <section id="contact">
        <div class="contact main-container">
            <h1 class="title">Contact Me</h1>
            <div class="line-title">
                <div></div>
            </div>
            <div class="form-contact">
                <form action="" method="post">
                    <table class="tabel-contact">
                        <tr>
                            <th class="column1">No</th>
                            <th class="column2">Nama</th>
                            <th class="column3">Email</th>
                            <th class="column4">Isi Pesan</th>
                        </tr>
                        <?php $i = 1; ?>
                        <?php foreach ($ambilcontact as $row) : ?>

                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row["nama"]; ?></td>
                                <td><?php echo $row["email"]; ?></td>
                                <td><?php echo $row["pesan"]; ?></td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </table>
                </form>

            </div>
        </div>
    </section>
    <!-- End Contact Me -->

    <script src="../style.js"></script>



</body>

</html>