<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body class="bg-light">

  <div class="container-fluid">
      <div class="container">

      <div class="row mt-5 text-center">
          <div class="col-lg-4 offset-lg-4">
                <img src="img/logo.png" alt="" width="100" class="rounded-circle">
                <h3 class="d-inline">LOGIN DOSEN</h3>
          </div>
      </div>

      <!-- Form Login admin -->
      <div class="row mt-3">
          <div class="col-lg-4 offset-lg-4">
                <form action="" method="post">

                <div class="form-floating mb-1">
                    <input type="text" class="form-control" id="username" placeholder="Username" name="username">
                    <label for="username">Username</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    <label for="password">Password</label>
                </div>

                <div class="form-floating mb-2">
                  <button type="submit" name="submit" class="btn btn-success btn-lg w-100">LOGIN</button>
                </div>

                </form>
          </div>
      </div>
      <!-- End Form -->

      <div class="row mt-3">
          <div class="col-lg-4 offset-lg-4">
                <small class="d-block">Login Mahasiwa <a href="login_mahasiswa.php" class="text-decoration-none"> Mahasiswa</a></small>
                <small>Login Admin <a href="login_admin.php" class="text-decoration-none"> Admin</a></small>
          </div>
      </div>

      </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>