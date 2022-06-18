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
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body class="bg-light">
  
  <div class="container-fluid">
      <div class="container">

      <div class="row py-3 text-center mb-3">
          <div class="col-lg-12">
                <h3>Data Mahasiswa</h3>
          </div>
      </div>

      <div class="row">
          <div class="col-lg-12">
              <div class="table-responsive">
                  <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Mahasiwa</th>
                                <th>No Stb</th>
                                <th>Jurusan</th>
                                <th>Kelas</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Password</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
							$no = 1;
							$mahasiswa = mysqli_query($conn, "SELECT * FROM tb_mahasiswa 
                                                  INNER JOIN tb_jurusan ON tb_mahasiswa.id_jurusan = tb_jurusan.id_jurusan   
                                                  INNER JOIN tb_kelas ON tb_mahasiswa.id_kelas = tb_kelas.id_kelas   
                            ");
							if(mysqli_num_rows($mahasiswa) > 0){
							while($row = mysqli_fetch_array($mahasiswa)){
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $row['nama_mahasiswa'] ?></td>
							<td><?php echo $row['stb'] ?></td>
							<td><?php echo $row['jurusan'] ?></td>
							<td><?php echo $row['kode_kelas'] ?></td>
							<td><?php echo $row['username'] ?></td>
							<td><?php echo $row['email'] ?></td>
							<td><?php echo $row['password'] ?></td>
                            
						</tr>
						<?php }}else{ ?>
							<tr>
								<td colspan="8" class="text-danger">Belom Ada Data Mahasiswa</td>
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