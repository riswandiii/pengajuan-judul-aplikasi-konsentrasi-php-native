<?php
	session_start();
    include 'koneksi.php';
	  if($_SESSION['status_dosen'] != true){
		echo '<script>window.location="login_dosen.php"</script>';
	}

    $id_dosen = $_SESSION['id_dosen'];
    $dosen = mysqli_query($conn, "SELECT * FROM tb_kelas 
            WHERE id_dosen = '$id_dosen'
    ");
    $dos = mysqli_fetch_array($dosen);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Judul Ulang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body class="bg-light">
  
  <div class="container-fluid">
      <div class="container-fluid">
        <br><br>
      <div class="row py-3 text-center">
          <div class="col-lg-12">
                <h3>Data Judul Ulang Mahasiswa</h3>
          </div>
      </div>

      <div class="row">
          <div class="col-lg-12">
              <div class="table-responsive">
                  <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Ulang</th>
                                <th>Mahasiswa</th>
                                <th>Stb</th>
                                <th>Kelas</th>
                                <th>Deskripsi Judul</th>
                                <th>Tgl Pengajuan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
							$judul = mysqli_query($conn, "SELECT * FROM tb_pengajuan_ulang
                            LEFT JOIN tb_mahasiswa ON tb_pengajuan_ulang.id_mahasiswa = tb_mahasiswa.id_mahasiswa
                            ");
                            $no = 1;
							if(mysqli_num_rows($judul) > 0){
							while($jud = mysqli_fetch_array($judul)){
				            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $jud['judul_ulang'] ?></td>
                                <td><?php echo $jud['username'] ?></td>
                                <td><?php echo $jud['stb'] ?></td>
                                <td><?php echo $dos['kode_kelas'] ?></td>
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

                                <?php if($jud['status'] == '0') { ?>
                                <th>
                                <a href="acc_judul_ulang.php?id_pengajuan_ulang=<?php echo $jud['id_pengajuan_ulang'] ?>" class="btn btn-primary btn-sm" onclick="return confirm('Yakin ingin acc judul abru mahasiswa?')">Acc</a>
                                <a href="revisi_judul_ulang.php?id_pengajuan_ulang=<?php echo $jud['id_pengajuan_ulang'] ?>" class="btn btn-success btn-sm" onclick="return confirm('Yakin ingin revisi judul baru mahasiswa?')">Revisi</a>
                                <a href="tolak_judul_ulang.php?id_pengajuan_ulang=<?php echo $jud['id_pengajuan_ulang'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin tolak judul baru mahasiswa?')">Tolak</a>
                                </th>
                                <?php }else{ ?>
                                    <?php if($jud['status'] == '0') {?>
                                    <th>Belom Di Acc</th>
                                    <?php }elseif($jud['status'] == '1') { ?>
                                    <th>Di Terima</th>
                                    <?php }elseif($jud['status'] == '2') {?>
                                    <th>Di Revisi</th>
                                    <?php }else{ ?>
                                    <th>Di Tolak</th>
                                    <?php } ?>
                                    <?php }?>
                            </tr>  
                            <?php }}else{ ?>
							<tr>
								<td colspan="9" class="text-danger">Belom ada data judul!</td>
							</tr>

				            <?php } ?>
                        </tbody>
                  </table>
              </div>
          </div>
      </div>

      <div class="row">
          <div class="col-lg-12">
              <a href="dashboard_dosen.php" class="btn btn-danger btn-sm">Back to Dashboard Dosen</a>
          </div>
      </div>

      </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>