<?php

	include '../koneksi.php ';

	if(isset($_GET['id_mahasiswa'])){

		$delete = mysqli_query($conn, "DELETE FROM tb_mahasiswa WHERE id_mahasiswa = '".$_GET['id_mahasiswa']."' ");
		echo '<script>window.location="mahasiswa.php"</script>';

	}

?>