<?php
	session_start();
    include 'koneksi.php';
	  if($_SESSION['status_mahasiswa'] != true){
		echo '<script>window.location="login_mahasiswa.php"</script>';
	}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Mahasiswa</title>

    <style>
      html body {
        background-image: url('img/logo.png');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 600px;
      }

      #container-fluid {
        background-color: black;
        height: 600px;
        opacity: 0.9;
      }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body class="bg-light">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-success navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="#"><img src="img/logo.png" alt="" width="70" class="rounded-circle"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="dosen_konsentrasi.php">Dosen Konsentrasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="input_judul.php">Input judul</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="data_judul.php">Data Judul</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="data_judul_ulang.php">Data Judul Ulang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="data_revisi.php">Data Revisi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pengajuan_ulang.php">Pengajuan Ulang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">|| Log out</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid" id="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 mt-5">
          <h1 class="text-white">Welcome To Dashboard Mahasiswa!</h1>
      </div>
    </div>
  </div>
</div>
  
  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>