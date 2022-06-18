<?php 
	session_start();
  include 'koneksi.php';
  if($_SESSION['status_mahasiswa'] != true){
  echo '<script>window.location="login_mahasiswa.php"</script>';

}

$id_mahasiswa = $_SESSION['id_mahasiswa'];
$mahasiswa = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE id_mahasiswa = '$id_mahasiswa' ");
$mhs = mysqli_fetch_array($mahasiswa);

if(isset($_POST['submit'])){

  // menampung inputan dari form 
  $id_mahasiswa 	= $_POST['id_mahasiswa'];
  $judul 	= $_POST['judul'];
  $deskripsi_judul = $_POST['deskripsi_judul'];
  $tanggal_pengajuan = $_POST['tanggal_pengajuan'];
  $status 	= $_POST['status'];
  
  $mahasiswa = mysqli_query($conn, "INSERT INTO tb_judul VALUES('', '$id_mahasiswa', '$judul', '$deskripsi_judul', '$tanggal_pengajuan', '$status')");

    if($mahasiswa){
      echo '<script>alert("Input Judul Success!")</script>';
      echo '<script>window.location="data_judul.php"</script>';
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
    <title>Input Judul Aplikasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body class="bg-light">
  
  <div class="container-fluid">
      <div class="container">

      <div class="row mt-5">
          <div class="col-lg-8 offset-lg-2">
          <div class="card">
              <div class="card-header bg-primary">
                <h3 class="text-white">Input Judul Konsentrasi</h3>
              </div>
              <div class="card-body">
                <!-- Form Tambah Data Dosen -->
              <form action="" method="post">
                    <input type="hidden" name="id_mahasiswa" value="<?php echo $id_mahasiswa ?>">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi_judul" class="form-label">Deskripsi Judul</label>
                        <textarea class="form-control" id="deskripsi_judul" rows="3" name="deskripsi_judul"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_pengajuan">Tanggal Pengajuan</label>
                        <input type="date" class="form-control" name="tanggal_pengajuan" id="tanggal_pengajuan">
                    </div>
                    <input type="hidden" name="status" value="0">
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