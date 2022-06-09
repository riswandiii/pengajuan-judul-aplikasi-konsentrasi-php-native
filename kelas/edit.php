<?php
session_start();
include '../koneksi.php';
// if($_SESSION['status_admin'] != true){
// echo '<script>window.location="../../login_admin.php"</script>';
// }


$kelas = mysqli_query($conn, "SELECT * FROM tb_kelas 
                         INNER JOIN tb_dosen ON tb_kelas.id_dosen = tb_dosen.id_dosen 
                         WHERE id_kelas = '".$_GET['id_kelas']."' ");
        if(mysqli_num_rows($kelas) == 0){
            echo '<script>window.location="kelas.php"</script>';
        }
        $kel = mysqli_fetch_object($kelas);


if(isset($_POST['submit'])){

  // data inputan dari form
  $id_dosen 	        = $_POST['id_dosen'];
  $kode_kelas 		= $_POST['kode_kelas'];
  $hari 	        = $_POST['hari'];
  $pukul 		= $_POST['pukul'];

  // query update data kelas
  $update = mysqli_query($conn, "UPDATE tb_kelas SET 
              id_dosen = '".$id_dosen."',
              kode_kelas = '".$kode_kelas."',
              hari = '".$hari."',
              pukul = '".$pukul."'
              WHERE id_kelas = '".$kel->id_kelas."' ");

  if($update){
    echo '<script>alert("Ubah data berhasil")</script>';
    echo '<script>window.location="kelas.php"</script>';
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
    <title>Edit Data Kelas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body class="bg-light">
  
  <div class="container-fluid">
      <div class="container">

      <div class="row mt-5">
          <div class="col-lg-8 offset-lg-2">
          <div class="card">
              <div class="card-header bg-primary">
                <h3 class="text-white">Edit Data Kelas</h3>
              </div>
              <div class="card-body">
                <!-- Form Tambah Data Dosen -->
              <form action="" method="post">
                    <div class="mb-1">
                    <select class="form-select" name="id_dosen">
                        <option value="<?php echo $kel->id_dosen ?>"><?php echo $kel->nama_dosen ?></option>
                            <?php
                        $dosen = mysqli_query($conn, "SELECT * FROM tb_dosen");
                        while($dos = mysqli_fetch_array($dosen)){
                        ?>
                        <option value="<?php echo $dos['id_dosen'] ?>"><?php echo $dos['nama_dosen'] ?></option>
                        <?php } ?>
                    </select>
                    </div>
                    <div class="mb-1">
                        <input type="text" class="form-control" name="kode_kelas" id="kode_kelas" placeholder="Kode Kelas" value="<?php echo $kel->kode_kelas ?>">
                    </div>
                    <div class="mb-1">
                        <input type="text" class="form-control" name="hari" id="hari" placeholder="Hari" value="<?php echo $kel->hari ?>">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="pukul" id="pukul" placeholder="Pukul" value="<?php echo $kel->kode_kelas ?>">
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