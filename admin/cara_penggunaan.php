 <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active"><a href="index.php?menu=14">Cara Penggunaan Aplikasi</a></li>
  </ol>
   <?php if(!isset($_SESSION['username'])){ header("location:login.php"); } ?>
   <h5>Cara Pendaftaran</h5>
<?php

echo "<iframe src=\"tmp/Prosedur SOP Penggunaan Aplikasi.pdf\" width=\"100%\" style=\"height:500px\"></iframe>";

?>
<div class="col-md-6 float-left">
	 <a target="_blank" href="./tmp/Dokumentasi Sistem Aplikasi.pdf" class="btn btn-primary">
          <span class="fas fa-fw fa-download"></span>
          Download Dokumentasi Sistem Aplikasi
        </a>
</div>
 
<div class="col-md-6 float-right">
	 <a target="_blank" href="./tmp/Lembar Pengujian Aplikasi.pdf" class="btn btn-info">
          <span class="fas fa-fw fa-download"></span>
          Download Lembar Pengujian Aplikasi
        </a>
</div>
