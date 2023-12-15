<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" href="../gambar/bpom.png" type="image/x-icon">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login
    <?php 
 $kdb = koneksidatabase();
    $result="select nm_website from identitas_web";
      $sqli = mysqli_query($kdb,$result);
      $data2=mysqli_fetch_assoc($sqli); ?>
          <?php echo $data2['nm_website'];?>

  </title>
  <style type="text/css">
    
      body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
      background: url(../gambar/bg2.jpg) no-repeat center center fixed;
      -webkit-background-size: 100% 100%;
      -moz-background-size: 100% 100%;
      -o-background-size: 100% 100%;
      background-size: 100% 100%;
 
    }

  </style>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login 
<?php $result="select nm_website from identitas_web";
      $sqli = mysqli_query($kdb,$result);
      $data2=mysqli_fetch_assoc($sqli); ?>
          <?php echo $data2['nm_website'];?>
      </div>
      <div class="card-body">
        <center><img class="logo-img" src="../gambar/logox.png" alt="logo"><hr>
        <div class="alert alert-primary" role="alert">Ketikan Username dan Password untuk Login</div>
        </center>
        <form  action="ceklogin.php?op=in" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="username" name="username" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
              <label for="username">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required">
              <label for="password">Password</label>
            </div>
          </div>
          <button class="btn btn-primary btn-block" type="submit" >Login</button>
        </form>
        <br>
        <div class="text-center">
          <buton  onclick="sweet()" class="btn btn-warning btn-sm btn-block" href="#">Lupa Password</a>
        </div>
      </div>
    </div>
  </div>

<script>
  function sweet() {

swal("Silahkan menghubungi administrator database untuk mereset password ");
}


</script>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

   <?php
    function koneksidatabase()
{
    include('../koneksi.php');
    return $kdb;
}
?>

</body>

</html>
