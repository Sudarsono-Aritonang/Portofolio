<?php
session_start();
include 'koneksi.php';
$ambil = query("SELECT * FROM project");
$ambilHome = query("SELECT * FROM tb_home");
$ambilAbout = query("SELECT * FROM tb_about");


if (isset($_POST['kirim'])) {

  if (kirimPesan($_POST) > 0) {
    echo "

	 	<script>
	 		alert('Pesan Berhasil Dikirim!');
	 		document.location.href = './';
	 	</script>";
  } else {
    echo "

	 	<script>
	 		alert('Pesan Gagal Dikirim!');
	 		document.location.href = './';
	 	</script>";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sudarsono Aritonang</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="responsive.css" />
</head>

<body>
  <!-- Navbar -->
  <header id="navbar">
    <div class="main-container">
      <div class="nav">
        <div class="left-nav">
          <a href="#">Sudarsono Aritonang</a>
        </div>
        <nav class="right-nav">
          <ul>
            <li><a href="#home" class="active">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#project">Project</a></li>
            <li><a href="#contact">Contact</a></li>
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
    <?php foreach ($ambilHome as $row) : ?>
      <div class="home-left">
        <h3>Hallo, Saya</h3>
        <h1><?php echo $row["nama"]; ?></h1>
        <h4>Front End Web Developer & <span>UI/UX Enthusiast</span></h4>
        <p><?php echo $row["deskripsi"] ?></p>
        <button><a href="images/<?php echo $row["dokumen"] ?>" download>Download CV</a></button>
      </div>
      <div class="home-right">
        <div class="wrap-heroimg"><img src="images/<?php echo $row["gambar"] ?>" alt="Foto" /></div>
      </div>
    <?php endforeach; ?>
  </section>

  <!-- End Home -->

  <!-- About -->
  <section id="about">
    <div class="about main-container">
      <h1 class="title">About Me</h1>
      <div class="line-title">
        <div></div>
      </div>
      <?php foreach ($ambilAbout as $row) : ?>
        <div class="isi-about">
          <h1><?php echo $row["nama"]; ?></h1>
          <p><?php echo $row["deskripsi"]; ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
  <!-- End About -->

  <!-- Project -->
  <section id="project">
    <div class="project main-container">
      <h1 class="title">Project Me</h1>
      <div class="line-title">
        <div></div>
      </div>
      <div class="card-project">
        <?php foreach ($ambil as $row) : ?>
          <div class="project-card">
            <div class="project-icon">
              <img src="./images/<?php echo $row["gambar"]; ?> " alt="" />
            </div>
            <div class="project-isi">
              <div class="judul-project">
                <h4><?php echo $row["judul"]; ?></h4>
                <h6><?php echo $row["tanggal_mulai"]; ?> sampai <?php echo $row["tanggal_selesai"]; ?></h6>
                <p><?php echo nl2br($row["isi"]); ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <!-- <div class="button-project">
      <button><a href="">Selengkapnya</a></button>
    </div> -->

    </div>
  </section>
  <!-- End Project -->

  <!-- Start Contact Me -->
  <section id="contact">
    <div class="contact main-container">
      <h1 class="title">Contact Me</h1>
      <div class="line-title">
        <div></div>
      </div>
      <div class="form-contact">
        <form action="" method="post">
          <div class="form-isi">
            <div>
              <label for="nama">Nama<span>*</span></label>
              <input type="nama" name="nama" id="text" placeholder="Masukkan Nama Anda" required />
            </div>
            <div>
              <label for="email">Email<span>*</span></label>
              <input type="email" name="email" id="email" placeholder="Masukkan Email Anda" required />
            </div>
            <div>
              <label for="">Pesan <span>*</span></label>
              <textarea name="pesan" id="textarea" cols="30" rows="10" placeholder="Tulis Pesan yang Anda akan Sampaikan" required></textarea>
            </div>
            <div class="button-contact">
              <input type="submit" name="kirim" value="Kirim">
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  <!-- End Contact Me -->

  <!-- Footer -->
  <footer id="footer">
    <div class="footer main-container">
      <div class="footer-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
          <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
        </svg>

        <p>Sudarsono Aritonang</p>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
          <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z" />
        </svg>

        <p>Sudarsono Aritonang</p>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
          <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
        </svg>

        <p>sudarsono_arios</p>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
          <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
        </svg>

        <p>082246864534</p>
      </div>
      <div class="line"></div>
      <div class="copyright">
        <p>@2024 Created by Sudarsono</p>
      </div>
    </div>
  </footer>
  <!-- End Footer -->
  <script src="style.js"></script>
</body>

</html>