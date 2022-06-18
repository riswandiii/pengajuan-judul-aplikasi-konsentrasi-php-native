<?php
	session_start();
    include 'koneksi.php';
	  if($_SESSION['status_dosen'] != true){
		echo '<script>window.location="login_dosen.php"</script>';
	}

  $id_judul = $_GET['id_judul'];
  
    $status = '2';

    $revisi = mysqli_query($conn, "UPDATE tb_judul SET 
                status = '".$status."'
                WHERE id_judul = '".$id_judul."' ");

    if($revisi){
      echo '<script>alert("Revisi judul success!")</script>';
      echo '<script>window.location="judul.php"</script>';
    }else{
      echo 'Gagal'.mysqli_error($conn);
    }

   //proses tambah data ke tb revisi judul
   $id_judull = $id_judul;
   $id_dosen = $_SESSION['id_dosen'];
   $revisi = 'Revisi';
   
    $revisi = mysqli_query($conn, "INSERT INTO tb_revisi_judul VALUES('', '$id_judull', '$id_dosen', '$revisi')");

    if($revisi){
        echo '<script>alert("Revisi judul success!")</script>';
        echo '<script>window.location="judul.php"</script>';
    }else{
        echo 'Gagal'.mysqli_error($conn);
    }

?>