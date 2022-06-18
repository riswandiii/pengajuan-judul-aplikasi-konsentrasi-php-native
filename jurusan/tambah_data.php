    <!-- Proses Tambah Data Jurusan -->
    <?php
        session_start();
        include '../koneksi.php';

					if(isset($_POST['submit'])){

						// menampung inputan dari form
						  $jurusan 	= $_POST['jurusan'];
							$jurusan = mysqli_query($conn, "INSERT INTO tb_jurusan VALUES('', '$jurusan')");

							if($jurusan){
								echo '<script>alert("Tambah data berhasil")</script>';
								echo '<script>window.location="jurusan.php"</script>';
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
    <title>Create Data Jurusan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body class="bg-light">
  
  <div class="container-fluid">
      <div class="container">

      <div class="row mt-5">
          <div class="col-lg-8 offset-lg-2">
          <div class="card">
              <div class="card-header bg-primary">
                <h3 class="text-white">Create Data Jurusan</h3>
              </div>
              <div class="card-body">
                <!-- Form Tambah Data Dosen -->
              <form action="" method="post">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="Nama Jurusan">
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