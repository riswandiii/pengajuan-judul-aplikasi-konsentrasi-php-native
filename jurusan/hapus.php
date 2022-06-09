<?php

	include '../koneksi.php ';

	if(isset($_GET['id_jurusan'])){

		$delete = mysqli_query($conn, "DELETE FROM tb_jurusan WHERE id_jurusan = '".$_GET['id_jurusan']."' ");
		echo '<script>window.location="jurusan.php"</script>';

	}

?>