    <!-- Proses Tambah Data Kelas -->
    <?php
        session_start();
        include '../koneksi.php';

        if(isset($_POST['submit'])){

          // menampung inputan dari form 
          $id_dosen 	= $_POST['id_dosen'];
          $kode_kelas 	= $_POST['kode_kelas'];
          $hari 	= $_POST['hari'];
          $pukul 	= $_POST['pukul'];
          
            $rutee = mysqli_query($conn, "INSERT INTO tb_kelas VALUES('', '$id_dosen', '$kode_kelas', '$hari', '$pukul')");

            if($rutee){
              echo '<script>alert("Tambah data berhasil")</script>';
              echo '<script>window.location="kelas.php"</script>';
            }else{
              echo 'Gagal'.mysqli_error($conn);
            }

          }	

        //untuk menampilkan data dosen di form tambah 
        function dosen($query){

          global $conn;
          
          $result = mysqli_query($conn, $query);
          
          $kotak = [];
          
          while($dosen = mysqli_fetch_array($result)){
              $kotak [] = $dosen;
          }
          return $kotak;
          }
        $tb_dosen = dosen("SELECT * FROM tb_dosen");


				?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Data Kelas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body class="bg-light">
  
  <div class="container-fluid">
      <div class="container">

      <div class="row mt-5">
          <div class="col-lg-8 offset-lg-2">
          <div class="card">
              <div class="card-header bg-primary">
                <h3 class="text-white">Create Data Kelas</h3>
              </div>
              <div class="card-body">
                <!-- Form Tambah Data Dosen -->
              <form action="" method="post">
                    <div class="mb-1">
                    <select class="form-select" name="id_dosen">
                        <option selected>Dosen Pembimbing</option>
                        <?php foreach($tb_dosen as $dosen) : ?>
                          <option value="<?php echo $dosen['id_dosen']; ?>"><?php echo $dosen['nama_dosen']; ?></option>
                        <?php endforeach; ?>
                   </select>
                    </div>
                    <div class="mb-1">
                        <input type="text" class="form-control" name="kode_kelas" id="kode_kelas" placeholder="Kode Kelas">
                    </div>
                    <div class="mb-1">
                        <input type="text" class="form-control" name="hari" id="hari" placeholder="Hari">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="pukul" id="pukul" placeholder="Pukul">
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