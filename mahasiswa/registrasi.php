<!-- Proses Tambah Data Mahasiswa -->
<?php
        session_start();
        include '../koneksi.php';

        if(isset($_POST['submit'])){

          // menampung inputan dari form 
          $nama_mahasiswa 	= $_POST['nama_mahasiswa'];
          $stb 	= $_POST['stb'];
          $id_jurusan = $_POST['id_jurusan'];
          $id_kelas = $_POST['id_kelas'];
          $username 	= $_POST['username'];
          $email 	= $_POST['email'];
          $password 	= $_POST['password'];
          
          $mahasiswa = mysqli_query($conn, "INSERT INTO tb_mahasiswa VALUES('', '$nama_mahasiswa', '$stb', '$id_jurusan', '$id_kelas', '$username', '$email', '$password')");

            if($mahasiswa){
              echo '<script>alert("Tambah data berhasil")</script>';
              echo '<script>window.location="mahasiswa.php"</script>';
            }else{
              echo 'Gagal'.mysqli_error($conn);
            }

          }	

        //untuk menampilkan data dosen di form tambah 
        function jurusan($query){

          global $conn;
          
          $result = mysqli_query($conn, $query);
          
          $kotak = [];
          
          while($jurusan = mysqli_fetch_array($result)){
              $kotak [] = $jurusan;
          }
          return $kotak;
          }
        $tb_jurusan = jurusan("SELECT * FROM tb_jurusan");

        //untuk menampilkan data kelas di form tambah 
        function kelas($query){

            global $conn;
            
            $result = mysqli_query($conn, $query);
            
            $kotak = [];
            
            while($kelas = mysqli_fetch_array($result)){
                $kotak [] = $kelas;
            }
            return $kotak;
            }
          $tb_kelas = kelas("SELECT * FROM tb_kelas");


		?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Data Mahasiwa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body class="bg-light">
  
  <div class="container-fluid">
      <div class="container">

      <div class="row mt-5">
          <div class="col-lg-8 offset-lg-2">
          <div class="card">
              <div class="card-header bg-primary">
                <h3 class="text-white">Registrasi Mahasiswa</h3>
              </div>
              <div class="card-body">
                <!-- Form Tambah Data Dosen -->
              <form action="" method="post">
                    <div class="mb-1">
                        <input type="text" class="form-control" name="nama_mahasiswa" id="nama_mahasiswa" placeholder="Nama Mahasiswa">
                    </div>
                    <div class="mb-1">
                        <input type="number" class="form-control" name="stb" id="stb" placeholder="No. Stanbuk">
                    </div>
                    <div class="mb-1">
                            <select class="form-select" name="id_jurusan">
                                <option selected>---Jurusan---</option>
                                <?php foreach($tb_jurusan as $jur) : ?>
                                <option value="<?php echo $jur['id_jurusan']; ?>"><?php echo $jur['jurusan']; ?></option>
                                <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-1">
                            <select class="form-select" name="id_kelas">
                                        <option selected>---Kelas---</option>
                                        <?php foreach($tb_kelas as $kel) : ?>
                                        <option value="<?php echo $kel['id_kelas']; ?>"><?php echo $kel['kode_kelas']; ?></option>
                                        <?php endforeach; ?>
                            </select>
                    </div>
                    <div class="mb-1">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                    </div>
                    <div class="mb-1">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="password" id="password" placeholder="Password">
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