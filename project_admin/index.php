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

$ambil = query("SELECT * FROM project ");



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
            <div class="tambah-project">
                <button><a href="tambah-project.php">Tambah Project Baru</a></button>
            </div>
            <table class="tabel-project">
                <tr>
                    <th class="column1">No</th>
                    <th class="column2">judul</th>
                    <th class="column3">Tanggal Mulai</th>
                    <th class="column4">Tanggal Selesai</th>
                    <th class="column5">Deskripsi</th>
                    <th class="column6">Gambar</th>
                    <th class="column7">Aksi</th>

                </tr>
                <?php $i = 1 ?>
                <?php foreach ($ambil as $row) : ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row["judul"] ?></td>
                        <td><?php echo $row["tanggal_mulai"] ?></td>
                        <td><?php echo $row["tanggal_selesai"] ?></td>
                        <td><?php echo $row["isi"] ?></td>
                        <td><img src="../images/<?php echo $row["gambar"] ?>" alt="" width="250px" height="150px"></td>
                        <td>
                            <a href="../project_admin/edit_project.php?id= <?php echo $row["id"]; ?>" style="color: green; font-weight: 500; font-size: 15;">Edit</a>|
                            <a href="../project_admin/hapus-project.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Anda yakin ingin menghapus?')" style="color: red; font-weight: 500; font-size: 15;">Hapus</a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </table>
        </div>
    </section>
    <!-- End Project -->

    <script src="../style.js"></script>



</body>

</html>