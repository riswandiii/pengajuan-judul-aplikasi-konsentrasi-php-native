<?php
session_start();
  include '../koneksi.php';
  // if($_SESSION['status_admin'] != true){
  // echo '<script>window.location="../../login_admin.php"</script>';
// }

  $dosen = mysqli_query($conn, "SELECT * FROM tb_dosen 
                      WHERE id_dosen = '".$_GET['id_dosen']."' ");
      if(mysqli_num_rows($dosen) == 0){
          echo '<script>window.location="dosen.php"</script>';
      }
      $dos = mysqli_fetch_object($dosen);

  // Prose update data dosen
  if(isset($_POST['submit'])){

    // data inputan dari form
    $nid_dosen 		= $_POST['nid_dosen'];
    $username 	        = $_POST['username'];
    $email 		= $_POST['email'];
    $password 		    = $_POST['password'];

    // query update data dosen
    $updateDosen = mysqli_query($conn, "UPDATE tb_dosen SET 
                nid_dosen = '".$nid_dosen."',
                username = '".$username."',
                email = '".$email."',
                password = '".$password."'
                WHERE id_dosen = '".$dos->id_dosen."' ");

    if($updateDosen){
      echo '<script>alert("Ubah data dosen berhasil")</script>';
      echo '<script>window.location="dosen.php"</script>';
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
    <title>Edit Data Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body class="bg-light">
  
  <div class="container-fluid">
      <div class="container">

      <div class="row mt-5">
          <div class="col-lg-8 offset-lg-2">
          <div class="card">
              <div class="card-header bg-primary">
                <h3 class="text-white">Edit Data Dosen</h3>
              </div>
              <div class="card-body">
                <!-- Form Tambah Data Dosen -->
              <form action="" method="post">
                    <div class="mb-1">
                        <input type="number" class="form-control" name="nid_dosen" id="nid_dosen" placeholder="Nid Dosen" value="<?php echo $dos->nid_dosen ?>">
                    </div>
                    <div class="mb-1">
                        <input type="text" class="form-control" name="nama_dosen" id="nama_dosen" placeholder="Nama Dosen" value="<?php echo $dos->nama_dosen ?>">
                    </div>
                    <div class="mb-1">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $dos->username ?>">
                    </div>
                    <div class="mb-1">
                        <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $dos->password ?>">
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $dos->email ?>">
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