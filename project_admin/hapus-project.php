<?php

include '../koneksi.php';


$id = $_GET["id"];

if (hapus_project($id)) {
    echo "

		<script>
			alert('Data berhasil dihapus!');
			document.location.href = 'index.php';
		</script>

		";
} else {

    echo "

		<script>
			alert('Data gagal dihapus!');
			document.location.href = '../tangg_aspirasi/';
		</script>

		";
}
