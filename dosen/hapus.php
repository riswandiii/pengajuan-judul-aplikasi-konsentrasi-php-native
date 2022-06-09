<?php

	include '../koneksi.php ';

	if(isset($_GET['id_dosen'])){

		$delete = mysqli_query($conn, "DELETE FROM tb_dosen WHERE id_dosen = '".$_GET['id_dosen']."' ");
		echo '<script>window.location="dosen.php"</script>';

	}

?>