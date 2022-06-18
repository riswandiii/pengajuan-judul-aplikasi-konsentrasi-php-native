<?php
session_start();
include 'koneksi.php';
if($_SESSION['status_mahasiswa'] != true){
echo '<script>window.location="login_mahasiswa.php"</script>';
}

$id_mahasiswa = $_SESSION['id_mahasiswa'];

$mahasiswa = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE id_mahasiswa = '$id_mahasiswa' ");
$mhs = mysqli_fetch_array($mahasiswa);


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Judul <?php echo $mhs['username'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body class="bg-light">
  
  <div class="container-fluid">
      <div class="container">
        <br><br>
      <div class="row py-3 text-center">
          <div class="col-lg-12">
                <h3>Data Revisi <?php echo $mhs['username'] ?></h3>
          </div>
      </div>

      <div class="row">
          <div class="col-lg-12">
              <div class="table-responsive">
                  <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id Revisi</th>
                                <th>Judul</th>
                                <th>Dosen</th>
                                <th>Revisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
							$revisi = mysqli_query($conn, "SELECT * FROM tb_revisi_judul
                            LEFT JOIN tb_dosen ON tb_revisi_judul.id_dosen = tb_dosen.id_dosen
                            LEFT JOIN tb_judul ON tb_revisi_judul.id_judul = tb_judul.id_judul
                            ");
                            $no = 1;
							if(mysqli_num_rows($revisi) > 0){
							while($jud = mysqli_fetch_array($revisi)){
				            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $jud['id_revisi'] ?></td>
                                <td><?php echo $jud['judul'] ?></td>
                                <td><?php echo $jud['username'] ?></td>
                                <td><?php echo $jud['revisi'] ?></td>
                            </tr>  
                            <?php }}else{ ?>
							<tr>
								<td colspan="9" class="text-danger">Belom ada data revisi!</td>
							</tr>

				            <?php } ?>
                        </tbody>
                  </table>
              </div>
          </div>
      </div>

      <div class="row">
          <div class="col-lg-12">
              <a href="dashboard_mahasiswa.php" class="btn btn-danger btn-sm">Back to Dashboard Mahasiswa</a>
          </div>
      </div>

      </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>

