<?php
session_start();
include '../koneksi.php';
// if($_SESSION['status_admin'] != true){
// echo '<script>window.location="../../login_admin.php"</script>';
// }


$mahasiswa = mysqli_query($conn, "SELECT * FROM tb_mahasiswa 
                         INNER JOIN tb_jurusan ON tb_mahasiswa.id_jurusan = tb_jurusan.id_jurusan
                         INNER JOIN tb_kelas ON tb_mahasiswa.id_kelas = tb_kelas.id_kelas
                         WHERE id_mahasiswa = '".$_GET['id_mahasiswa']."' ");
        if(mysqli_num_rows($mahasiswa) == 0){
            echo '<script>window.location="mahasiswa.php"</script>';
        }
        $mhs = mysqli_fetch_object($mahasiswa);


if(isset($_POST['submit'])){

  // data inputan dari form
  $nama_mahasiswa 	        = $_POST['nama_mahasiswa'];
  $id_jurusan 		= $_POST['id_jurusan'];
  $id_kelas 	        = $_POST['id_kelas'];
  $username 		= $_POST['username'];
  $email 		= $_POST['email'];
  $password 		= $_POST['password'];

  // query update data kelas
  $update = mysqli_query($conn, "UPDATE tb_mahasiswa SET 
              nama_mahasiswa = '".$nama_mahasiswa."',
              id_jurusan = '".$id_jurusan."',
              id_kelas = '".$id_kelas."',
              username = '".$username."',
              email = '".$email."',
              password = '".$password."'
              WHERE id_mahasiswa = '".$mhs->id_mahasiswa."' ");

  if($update){
    echo '<script>alert("Ubah data berhasil")</script>';
    echo '<script>window.location="mahasiswa.php"</script>';
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
    <title>Edit Data Mahasiwa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body class="bg-light">
  
  <div class="container-fluid">
      <div class="container">

      <div class="row mt-5">
          <div class="col-lg-8 offset-lg-2">
          <div class="card">
              <div class="card-header bg-primary">
                <h3 class="text-white">Edit Data Mahasiwa</h3>
              </div>
              <div class="card-body">
                <!-- Form Tambah Data Dosen -->
              <form action="" method="post">
                    <div class="mb-1">
                        <input type="text" class="form-control" name="nama_mahasiswa" id="nama_mahasiswa" placeholder="Nama Mahassiwa" value="<?php echo $mhs->nama_mahasiswa ?>">
                    </div>
                    <div class="mb-1">
                        <input type="number" class="form-control" name="stb" id="stb" placeholder="No. Stanbuk" value="<?php echo $mhs->stb ?>">
                    </div>
                    <div class="mb-1">
                        <select class="form-select" name="id_jurusan">
                            <option value="<?php echo $mhs->id_jurusan ?>"><?php echo $mhs->jurusan ?></option>
                                <?php
                            $jurusan = mysqli_query($conn, "SELECT * FROM tb_jurusan");
                            while($jur = mysqli_fetch_array($jurusan)){
                            ?>
                            <option value="<?php echo $jur['id_jurusan'] ?>"><?php echo $jur['jurusan'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-1">
                        <select class="form-select" name="id_kelas">
                                <option value="<?php echo $mhs->id_kelas ?>"><?php echo $mhs->kode_kelas ?></option>
                                    <?php
                                $kelas = mysqli_query($conn, "SELECT * FROM tb_kelas");
                                while($kel = mysqli_fetch_array($kelas)){
                                ?>
                                <option value="<?php echo $kel['id_kelas'] ?>"><?php echo $kel['kode_kelas'] ?></option>
                                <?php } ?>
                        </select>
                    </div>
                    <div class="mb-1">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $mhs->username ?>">
                    </div>
                    <div class="mb-1">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $mhs->email ?>">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $mhs->password ?>">
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