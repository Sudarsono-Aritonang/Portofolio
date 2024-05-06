<?php
$koneksi = mysqli_connect("localhost", "sudarsono", "sono07032024", "sudarsono_portofolio");
function query($query)
{
    global $koneksi;
    $ambil = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($ambil)) {
        $rows[] = $row;
    }
    return $rows;
}

function simpan($data)
{
    global $koneksi;
    //ambil data dari tiap elemen yang ada pada form
    $judul = htmlspecialchars($data["judul"]);
    $tanggal_mulai = htmlspecialchars($data["tanggal_mulai"]);
    $tanggal_selesai = htmlspecialchars($data["tanggal_selesai"]);
    $isi = htmlspecialchars($data["isi"]);
    $gambar = upload();
    if (!$gambar) {
        return false;
    }
    //Query input data
    $query = "INSERT INTO project values ('', '$judul', '$tanggal_mulai', '$tanggal_selesai', '$isi', '$gambar')";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function upload()
{
    $namaGambar = $_FILES['gambar']['name'];
    $ukuranGambar = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpGambar = $_FILES['gambar']['tmp_name'];
    if ($error === 4) {
        echo "<script>alert ('pilih file dahulu');</script>";
        return false;
    }
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaGambar);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>alert ('Yang anda upload bukan gambar');</script>";
        return false;
    }
    if ($ukuranGambar > 20000000) {
        echo "<script>alert ('Ukuran gambar terlalu besar');</script>";
        return false;
    }
    $namaGambarBaru = uniqid();
    $namaGambarBaru .= '.';
    $namaGambarBaru .= $ekstensiGambar;
    move_uploaded_file($tmpGambar, '../images/' . $namaGambarBaru);

    return $namaGambarBaru;
}
function uploadDokumen()
{
    $namaDokumen = $_FILES['dokumen']['name'];
    $ukuranDokumen = $_FILES['dokumen']['size'];
    $error = $_FILES['dokumen']['error'];
    $tmpDokumen = $_FILES['dokumen']['tmp_name'];
    if ($error === 4) {
        echo "<script>alert ('pilih file dahulu');</script>";
        return false;
    }
    $ekstensiDokumenValid = ['pdf'];
    $ekstensiDokumen = explode('.', $namaDokumen);
    $ekstensiDokumen = strtolower(end($ekstensiDokumen));
    if (!in_array($ekstensiDokumen, $ekstensiDokumenValid)) {
        echo "<script>alert ('Yang anda upload bukan dokumen');</script>";
        return false;
    }
    if ($ukuranDokumen > 20000000) {
        echo "<script>alert ('Ukuran gambar terlalu besar');</script>";
        return false;
    }
    $namaDokumenBaru = uniqid();
    $namaDokumenBaru .= '.';
    $namaDokumenBaru .= $ekstensiDokumen;
    move_uploaded_file($tmpDokumen, '../images/' . $namaDokumenBaru);

    return $namaDokumenBaru;
}

// if(isset($_POST['kirim'])){
//   $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
//   $email = mysqli_real_escape_string($koneksi, $_POST['email']);
//   $pesan = mysqli_real_escape_string($koneksi, $_POST['pesan']);
// $kirim = mysqli_query($koneksi, "INSERT INTO contact VALUES('$nama', '$email', '$pesan')") ;


// };

function kirimPesan($data)
{
    global $koneksi;

    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data["email"]);
    $pesan = htmlspecialchars($data["pesan"]);
    $query = "INSERT INTO contact
			values
		('', '$nama', '$email', '$pesan')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


function hapus_project($id)
{

    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM project where id = $id");


    return mysqli_affected_rows($koneksi);
}
// edit project
function edit($data)
{
    global $koneksi;
    //ambil data dari tiap elemen yang ada pada form
    $id = $data["id"];
    $judul = htmlspecialchars($data["judul"]);
    $tanggal_mulai = htmlspecialchars($data["tanggal_mulai"]);
    $tanggal_selesai = htmlspecialchars($data["tanggal_selesai"]);
    $isi = htmlspecialchars($data["isi"]);

    // Cek apakah ada gambar yang diunggah
    if ($_FILES['gambar']['error'] === 4) {
        // Tidak ada gambar yang diunggah, pertahankan gambar yang sudah ada
        $gambar = $data['gambar_lama'];
    } else {
        // Ada gambar yang diunggah, lakukan proses upload gambar baru
        $gambar = upload();
        if (!$gambar) {
            return false;
        }
    }

    //Query input data
    $query = "UPDATE project SET 
            judul = '$judul', 
            tanggal_mulai = '$tanggal_mulai', 
            tanggal_selesai = '$tanggal_selesai', 
            isi = '$isi'";
    // Tambahkan pembaruan gambar jika ada gambar baru yang diunggah
    if ($_FILES['gambar']['error'] !== 4) {
        $query .= ", gambar = '$gambar'";
    }
    // Tambahkan WHERE statement
    $query .= " WHERE id = $id ";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function editAbout($data)
{
    global $koneksi;
    //ambil data dari tiap elemen yang ada pada form
    $id_about = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);


    //Query input data
    $query = "UPDATE tb_about SET 
            nama = '$nama', 
            deskripsi = '$deskripsi'";

    $query .= " WHERE id_about = $id_about ";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function editHome($data)
{
    global $koneksi;
    //ambil data dari tiap elemen yang ada pada form
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);


    // Cek apakah ada gambar yang diunggah
    if ($_FILES['gambar']['error'] === 4) {
        // Tidak ada gambar yang diunggah, pertahankan gambar yang sudah ada
        $gambar = $data['gambar_lama'];
    } else {
        // Ada gambar yang diunggah, lakukan proses upload gambar baru
        $gambar = upload();
        if (!$gambar) {
            return false;
        }
    }

    if ($_FILES['dokumen']['error'] === 4) {
        // Tidak ada dokumen yang diunggah, pertahankan dokumen yang sudah ada
        $dokumen = $data['dokumen_lama'];
    } else {
        // Ada dokumen yang diunggah, lakukan proses upload dokumen baru
        $dokumen = uploadDokumen();
        if (!$dokumen) {
            return false;
        }
    }

    //Query input data
    $query = "UPDATE tb_home SET 
            nama = '$nama', 
            deskripsi = '$deskripsi'";

    // Tambahkan pembaruan gambar jika ada gambar baru yang diunggah
    if ($_FILES['gambar']['error'] !== 4) {
        $query .= ", gambar = '$gambar'";
    }
    if ($_FILES['dokumen']['error'] !== 4) {
        $query .= ", dokumen = '$dokumen'";
    }
    // Tambahkan WHERE statement
    $query .= " WHERE id = $id ";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
