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
    <title>Data Judul Ulang<?php echo $mhs['username'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body class="bg-light">
  
  <div class="container-fluid">
      <div class="container">
        <br><br>
      <div class="row py-3 text-center">
          <div class="col-lg-12">
                <h3>Data Judul Ulang <?php echo $mhs['username'] ?></h3>
          </div>
      </div>

      <div class="row">
          <div class="col-lg-12">
              <div class="table-responsive">
                  <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Pengajuan Ulang</th>
                                <th>Deskripsi Judul Ualng</th>
                                <th>Tanggal Pengajuan Ulang</th>
                                <th>Status Judul Ulang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
							$judul_ulang = mysqli_query($conn, "SELECT * FROM tb_pengajuan_ulang
                            WHERE id_mahasiswa  = '$id_mahasiswa'
                            ");
                            $no = 1;
							if(mysqli_num_rows($judul_ulang) > 0){
							while($jud = mysqli_fetch_array($judul_ulang)){
				            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $jud['judul_ulang'] ?></td>
                                <td><?php echo $jud['deskripsi_judul_ulang'] ?></td>
                                <td><?php echo $jud['tanggal_pengajuan_ulang'] ?></td>
                                <?php if($jud['status'] == '0') {?>
                                <th>Belom Di Acc</th>
                                <?php }elseif($jud['status'] == '1') { ?>
                                <th>Di Terima</th>
                                <?php }elseif($jud['status'] == '2') {?>
                                <th>Di Revisi</th>
                                <?php }else{ ?>
                                <th>Di Tolak</th>
                                <?php } ?>
                                </td>
                            </tr>  
                            <?php }}else{ ?>
							<tr>
								<td colspan="9" class="text-danger">Anda belom melakukan input judul!</td>
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

