<?php
	session_start();
  include 'koneksi.php';
  if($_SESSION['status_mahasiswa'] != true){
  echo '<script>window.location="login_mahasiswa.php"</script>';
}

if(isset($_POST['submit'])){

  // menampung inputan dari form
    $id_revisi 	= $_POST['id_revisi'];
    $id_mahasiswa 	= $_SESSION['id_mahasiswa'];
    $judul_ulang 	= $_POST['judul_ulang'];
    $deskripsi_judul_ulang 	= $_POST['deskripsi_judul_ulang'];
    $tanggal_pengajuan_ulang 	= $_POST['tanggal_pengajuan_ulang'];
    $status 	= $_POST['status'];
    $judul_ulang = mysqli_query($conn, "INSERT INTO tb_pengajuan_ulang VALUES('', '$id_revisi', '$id_mahasiswa', '$judul_ulang', '$deskripsi_judul_ulang', '$tanggal_pengajuan_ulang', '$status')");

    if($judul_ulang){
      echo '<script>alert("Pengajuan judul ulang success!")</script>';
      echo '<script>window.location="data_judul_ulang.php"</script>';
    }else{
      echo 'Gagal'.mysqli_error($conn);
    }

  }	

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengajuan Ulang Judul Aplikasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body class="bg-light">
  
  <div class="container-fluid">
      <div class="container">

      <div class="row mt-5">
          <div class="col-lg-8 offset-lg-2">
          <div class="card">
              <div class="card-header bg-primary">
                <h3 class="text-white">Pengajuan Ulang Judul Konsentrasi</h3>
              </div>
              <div class="card-body">
                <!-- Form Tambah Data Dosen -->
              <form action="" method="post">
                    <div class="mb-3">
                        <input type="number" class="form-control" name="id_revisi" id="id_revisi" placeholder="Masukkan Id Revisi Judul Anda Yang Di Revisi!" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="judul_ulang" id="judul_ulang" placeholder="Judul Ulang">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi_judul_ulang" class="form-label">Deskripsi Judul Ulang</label>
                        <textarea class="form-control" id="deskripsi_judul_ulang" rows="3" name="deskripsi_judul_ulang"></textarea>
                    </div>
                    <input type="hidden" name="status" value="0">
                    <div class="mb-3">
                        <label for="tanggal_pengajuan_ulang">Tanggal Pengajuan Ulang</label>
                        <input type="date" class="form-control" name="tanggal_pengajuan_ulang" id="tanggal_pengajuan_ulang">
                    </div>
                    <div class="mb-2">
                        <button type="submit" name="submit" class="btn btn-primary btn-sm">Submit</button> Or 
                        <button class="btn btn-danger btn-sm" type="reset">Reset</button>
                    </div>
              </form>
              </div>
          </div>
          </div>
      </div>

      </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>