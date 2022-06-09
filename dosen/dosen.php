<?php
session_start();
include '../koneksi.php';
// if($_SESSION['status_dosen'] != true){
//     echo '<script>window.location="../login_dosen.php"</script>';
// }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body class="bg-light">
  
  <div class="container-fluid">
      <div class="container">

      <div class="row py-3 text-center">
          <div class="col-lg-12">
                <h3>Data Dosen</h3>
          </div>
      </div>

      <div class="row mb-3">
          <div class="col-lg-12">
              <a href="tambah_data.php" class="btn btn-primary btn-sm">+create Data Dosen</a>
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
                                <th>Password</th>
                                <th>Email</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
							$no = 1;
							$dosen = mysqli_query($conn, "SELECT * FROM tb_dosen 
                            ");
							if(mysqli_num_rows($dosen) > 0){
							while($row = mysqli_fetch_array($dosen)){
						?>
						<tr>
							<td class="text-dark"><?php echo $no++ ?></td>
							<td class="text-dark"><?php echo $row['nid_dosen'] ?></td>
							<td class="text-dark"><?php echo $row['nama_dosen'] ?></td>
							<td class="text-dark"><?php echo $row['username'] ?></td>
							<td class="text-dark"><?php echo $row['password'] ?></td>
							<td class="text-dark"><?php echo $row['email'] ?></td>
                            <td>
                                <a href="edit.php?id_dosen=<?php echo $row['id_dosen']?>" class="btn btn-primary btn-sm">Edit</a> ||
                                <a href="hapus.php?id_dosen=<?php echo $row['id_dosen'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('YAKIN INGIN HAPUS DATA DOSEN?')">Delete</a>
                            </td>
                            
						</tr>
						<?php }}else{ ?>
							<tr>
								<td colspan="8" class="text-danger">Belom Ada Data Dosen</td>
							</tr>

						<?php } ?>
                        </tbody>
                  </table>
              </div>
          </div>
      </div>

      <div class="row">
          <div class="col-lg-12">
              <a href="../dashboard_admin.php" class="btn btn-danger btn-sm">Back to Dashboard Admin</a>
          </div>
      </div>

      </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>