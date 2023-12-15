<?php
session_start();
if(!isset($_SESSION['username'])){ header("location:login.php"); }
    $menu = !empty($_GET['menu']) ? $_GET['menu'] : "1";
    $kdb = koneksidatabase();
?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" href="../gambar/bpom.png" type="image/x-icon">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  
  <title>Admin 
<?php $result="select nm_website, nm_instansi from identitas_web";
      $sqli = mysqli_query($kdb,$result);
      $datax=mysqli_fetch_assoc($sqli); ?>
          <?php echo $datax['nm_website'];?>
  </title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
 <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
    <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      // Sembunyikan alert validasi kosong
      $("#kosong").hide();
    });
    </script>


</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.php">Buku Tamu</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <div class="input-group-append">
          
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="index.php?menu=8">Profil</a>
          <a class="dropdown-item" href="index.php?menu=9">Pengaturan</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li  <?php if($menu==1) { echo 'class="nav-item active"'; } else { echo 'class="nav-item"'; } ?>>
        <a class="nav-link" href="index.php?menu=1">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link">
          <span>Daftar Pengunjung</span></a>
      </li>
      <li  <?php if($menu==6) { echo 'class="nav-item active"'; } else { echo 'class="nav-item"'; } ?>>
        <a class="nav-link" href="index.php?menu=6">
          <i class="fas fa-user-plus"></i>
          <span>Tambah Pengunjung</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-user-circle"></i>
          <span>Pengunjung</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="index.php?menu=2">Pengunjung Hari Ini</a>
          <a class="dropdown-item" href="index.php?menu=3">Pengunjung Kemarin</a>
          <a class="dropdown-item" href="index.php?menu=4">Pengunjung Bulan Ini</a>
          <a class="dropdown-item" href="index.php?menu=5">Pengunjung Tahun Ini</a>
          <a class="dropdown-item" href="index.php?menu=7">Pengunjung Periode</a>
        </div>
      </li>

      <li class="nav-item active">
        <a class="nav-link">
          <span>Informasi Web</span></a>
      </li>        
       <li <?php if($menu==11) { echo 'class="nav-item active"'; } else { echo 'class="nav-item"'; } ?>>
        <a class="nav-link" href="index.php?menu=11">
          <i class="fas fa-fw fa-info-circle"></i>
          <span>Identitas Web</span></a>
      </li>
      <li <?php if($menu==10) { echo 'class="nav-item active"'; } else { echo 'class="nav-item"'; } ?>>
        <a class="nav-link" href="index.php?menu=10">
          <i class="fas fa-fw fa-eye"></i>
          <span>Profil Web</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link">
          <span>Pengaturan dan Backup</span></a>
      </li>        
      <li <?php if($menu==13) { echo 'class="nav-item active"'; } else { echo 'class="nav-item"'; } ?>>
        <a class="nav-link" href="index.php?menu=13">
          <i class="fas fa-fw fa-database"></i>
          <span>Backup Database</span></a>
      </li>
      <li <?php if($menu==9) { echo 'class="nav-item active"'; } else { echo 'class="nav-item"'; } ?>>
        <a class="nav-link" href="index.php?menu=9" >
          <i class="fas fa-fw fa-cog mr-2"></i>
          <span>Pengaturan</span></a>
      </li>
      <li <?php if($menu==14) { echo 'class="nav-item active"'; } else { echo 'class="nav-item"'; } ?>>
        <a class="nav-link" href="index.php?menu=14" >
          <i class="fas fa-fw fa-info-circle"></i>
          <span>Penggunaan Aplikasi</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <?php
                    switch($menu)
                    {
                        case('1'): include_once('dashboard.php'); break;
                        case('2'): include_once('daftar_pengunjung.php'); break;
                        case('3'): include_once('pengunjung_kemarin.php'); break;
                        case('4'): include_once('pengunjung_bulanan.php'); break;
                        case('5'): include_once('pengunjung_tahun.php'); break;
                        case('6'): include_once('tambah_tamu.php'); break;
                        case('7'): include_once('pengunjung_periode.php'); break;
                        case('8'): include_once('profil.php'); break;
                        case('9'): include_once('pengaturan.php'); break;
                        case('10'): include_once('edit_profil_web.php'); break;
                        case('11'): include_once('edit_identitas_web.php'); break;
                        case('12'): include_once('form.php'); break;
                        case('13'): include_once('backup_database.php'); break;
                         case('14'): include_once('cara_penggunaan.php'); break;
                        default:   include_once('dashboard.php'); break;
                    }
                ?>

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>&copy; <?php   print(date("Y")); ?> Credit By :<a href="#"> <?php echo $datax['nm_instansi'];?></a></span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin ingin Logout?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Logout" di bawah ini jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="ceklogin.php?op=out">Logout</a>
        </div>
      </div>
    </div>
  </div>


  <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
  <script src="../bootstrap-3.4.1-dist/js/highcharts.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
  <script type="text/javascript" src="bootstrap-3.4.1-dist/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
  <script src="bootstrap-3.4.1-dist/js/dataTables.bootstrap.min.js"></script>
  <script src="js/bootstrap-datetimepicker.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: "yyyy-mm-dd hh:ii:ss"
    });
</script>  
 <?php
    function koneksidatabase()
{
    include('../koneksi.php');
    return $kdb;
}

    ?>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#example').DataTable( {
           dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ], 
            "language" :{
              "lengthMenu": "Menampilkan _MENU_  baris per halaman",
              "zeroRecords": "Maaf, Data Tidak Ditemukan",
              "info": "Halaman _PAGE_ dari total _PAGES_ halaman",
              "infoEmpty" : "Data Tidak Ada",
              "search" : "Pencarian",
              "infoFiltered" : "(menampilkan _MENU_ dari _MAX_ total data)",
              "paginate" : {
                "previous" : "Sebelumnya",
                "next" : "Selanjutnya"
              }

            }
        } );
        $('#example2').DataTable( {
            "language" :{
              "lengthMenu": "Menampilkan _MENU_  baris per halaman",
              "zeroRecords": "Maaf, Data Tidak Ditemukan",
              "info": "Halaman _PAGE_ dari total _PAGES_ halaman",
              "infoEmpty" : "Data Tidak Ada",
              "search" : "Pencarian",
              "infoFiltered" : "(menampilkan dari _MAX_ total data)",
            },
            "paging" : false,
            "info" : false,
        } );
        $('#example3').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ], 
             "processing": true,
    "serverSide": true,
    "ajax": "../server_processing.php",
      "language" :{
              "lengthMenu": "Menampilkan _MENU_  baris per halaman",
              "zeroRecords": "Maaf, Data Tidak Ditemukan",
              "info": "Halaman _PAGE_ dari total _PAGES_ halaman",
              "infoEmpty" : "Data Tidak Ada",
              "search" : "Pencarian",
              "infoFiltered" : "(menampilkan dari _MAX_ total data)",
            },
        } );

  $(document).ready(function () {
        var tomorrow = new Date();
        $('#start_date').datepicker({
             format: 'yyyy-mm-dd',
            autoclose:true,
            endDate: "tomorrow",
            maxDate: tomorrow
        }).on('changeDate', function (ev) {
                $(this).datepicker('hide');
            });

        $('#end_date').datepicker({
             format: 'yyyy-mm-dd',
            autoclose:true,
            endDate: "tomorrow",
            maxDate: tomorrow
        }).on('changeDate', function (ev) {
                $(this).datepicker('hide');
            });


    });


    } );

  </script>
</body>

</html>
