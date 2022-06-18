<?php
	session_start();
    include 'koneksi.php';
	  if($_SESSION['status_dosen'] != true){
		echo '<script>window.location="login_dosen.php"</script>';
	}

  $id_judul = $_GET['id_judul'];
  
    $status = '3';

    $tolak = mysqli_query($conn, "UPDATE tb_judul SET 
                status = '".$status."'
                WHERE id_judul = '".$id_judul."' ");

    if($tolak){
      echo '<script>alert("Toalak judul success!")</script>';
      echo '<script>window.location="judul.php"</script>';
    }else{
      echo 'Gagal'.mysqli_error($conn);
    }

?>