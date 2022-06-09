<?php

	include '../koneksi.php ';

	if(isset($_GET['id_kelas'])){

		$delete = mysqli_query($conn, "DELETE FROM tb_kelas WHERE id_kelas = '".$_GET['id_kelas']."' ");
		echo '<script>window.location="kelas.php"</script>';

	}

?>