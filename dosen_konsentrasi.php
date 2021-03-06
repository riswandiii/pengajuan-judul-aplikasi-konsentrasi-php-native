<?php
session_start();
include 'koneksi.php';
if($_SESSION['status_mahasiswa'] != true){
echo '<script>window.location="login_mahasiswa.php"</script>';
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dosen Konsentrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body class="bg-light">
  
  <div class="container-fluid">
      <div class="container">
        <br><br>
      <div class="row py-3 text-center">
          <div class="col-lg-12">
                <h3>Dosen Konsentrasi</h3>
          </div>
      </div>

      <div class="row">
          <div class="col-lg-12">
              <div class="table-responsive">
                  <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nid Dosen</th>
                                <th>Nama Dosen</th>
                                <th>Username</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
							$dosen = mysqli_query($conn, "SELECT * FROM tb_dosen
                            ");
                            $no = 1;
							if(mysqli_num_rows($dosen) > 0){
							while($dos = mysqli_fetch_array($dosen)){
				            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $dos['nid_dosen'] ?></td>
                                <td><?php echo $dos['nama_dosen'] ?></td>
                                <td><?php echo $dos['username'] ?></td>
                                <td><?php echo $dos['email'] ?></td>
                            </tr>  
                            <?php }}else{ ?>
							<tr>
								<td colspan="9" class="text-danger">Belom ada data dosen!</td>
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