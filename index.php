<?php

    $menu = !empty($_GET['menu']) ? $_GET['menu'] : "1";
    $kdb = koneksidatabase();
?>
<?php
if($menu==1) {
	$result="select set_intval from identitas_web";
      $sqli = mysqli_query($kdb,$result);
      $datax=mysqli_fetch_assoc($sqli);

$page = $_SERVER['PHP_SELF'];

$sec = "". $datax['set_intval'] .""; 
?>
<!DOCTYPE html>
    <head>
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
<?php } ?>
	<link rel="icon" href="./gambar/bpom.png" type="image/x-icon">
	<title><?php  $result="select nm_website, nm_instansi from identitas_web";
			$sqli = mysqli_query($kdb,$result);
			$datax=mysqli_fetch_assoc($sqli); ?>
	        <?php echo $datax['nm_website'];?> </title>
	<link rel="stylesheet" type="text/css" href="bootstrap-3.4.1-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-3.4.1-dist/css/buttons.bootstrap.min.css">
	  <link rel="stylesheet" type="text/css" href="./login/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
	  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css">
	<script src="bootstrap-3.4.1-dist/js/jquery3.min.js"></script>
	<script src="http://www.google.com/recaptcha/api.js"></script>
	<script src="bootstrap-3.4.1-dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
    <script src="bootstrap-3.4.1-dist/js/highcharts.js"></script>
	</head>
	<body>

		<nav class="navbar  navbar-inverse">
			<div class="container">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="index.php?menu=1" >
			     	<?php $result="select nm_website from identitas_web";
			$sqli = mysqli_query($kdb,$result);
			$data2=mysqli_fetch_assoc($sqli); ?>
	        <?php echo $data2['nm_website'];?> 
			      </a>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
			        <li <?php if($menu==10) { echo 'class="active"'; } else { echo 'class=""'; } ?>>
			        <a href="index.php?menu=10" ><span class="glyphicon glyphicon-info-sign"></span>
			        Cara Pendaftaran</a></li>
			        <li <?php if($menu==7) { echo 'class="active"'; } else { echo 'class=""'; } ?>>
			        <a href="index.php?menu=7"><span class="glyphicon glyphicon-question-sign"></span>
			        Tentang</a></li>
			        <li <?php if($menu==6) { echo 'class="active"'; } else { echo 'class=""'; } ?>>
			        <a href="index.php?menu=6" ><span class="glyphicon glyphicon-briefcase"></span>
			        Kontak</a></li>
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
		</nav>


		

					<div class="col-md-3">
						<div class="alert alert-info back-widget-set text-center">
							<a href="index.php?menu=1">
							 <img src="gambar/logo.png" style="max-height:200px;" />
							</a>
                            <hr>
                           
                           <h4>Jumlah Pengunjung Hari Ini :
                           <?php $result="select COUNT(id_tamu) as total FROM tamu WHERE DATE(tanggal_waktu) = DATE(NOW())";
                                            $sqli = mysqli_query($kdb,$result);
                                            $data=mysqli_fetch_assoc($sqli);
                                         
                                            echo $data['total'];?>
                           <br>

                           Jumlah Pengunjung Kemarin : 
                           <?php $result="select COUNT(id_tamu) as total2 FROM tamu WHERE DATE(tanggal_waktu) >= DATE(NOW()) - INTERVAL 1 DAY and DATE(tanggal_waktu) < DATE(NOW())";
                                            $sqli = mysqli_query($kdb,$result);
                                            $data=mysqli_fetch_assoc($sqli);
                                         
                                            echo $data['total2'];?>
                                                        </h4>
                            
                            <hr>
                        <!--   <a href="index.php?menu=8" type="button" class="btn btn-success btn-lg" aria-label="Left Align">
							  <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                              Pendaftaran Pengunjung
							</a> -->

                        </div>

            <div class="list-group">
              <a class="list-group-item list-group-item-info">
                Dashboard
              </a>
              <a href="index.php?menu=1" <?php if($menu==1) { echo 'class=" list-group-item  active"'; } else { echo 'class="list-group-item"'; } ?>>
              	<span class="glyphicon glyphicon-signal"></span> 
                Dashboard Statistik Pengunjung</a>
            </div>
			<div class="list-group">
			  <a  class="list-group-item list-group-item-info">
			    Menu
			  </a>
			   <a href="index.php?menu=2" <?php if($menu==2) { echo 'class=" list-group-item active "'; } else { echo 'class="list-group-item"'; } ?>>
			   	<span class="glyphicon glyphicon-list-alt"></span>
               Daftar Pengunjung Hari Ini</a>
			   <a href="index.php?menu=3" <?php if($menu==3) { echo 'class=" list-group-item active"'; } else { echo 'class="list-group-item"'; } ?>>
			   	<span class="glyphicon glyphicon-th-list"></span>
                Daftar Pengunjung Kemarin</a>
                <a href="index.php?menu=4" <?php if($menu==4) { echo 'class=" list-group-item active"'; } else { echo 'class="list-group-item"'; } ?>>
                <span class="glyphicon glyphicon-th-large"></span>
                Daftar Pengunjung Bulan Ini</a>
                <a href="index.php?menu=5" <?php if($menu==5) { echo 'class=" list-group-item active"'; } else { echo 'class="list-group-item"'; } ?>>
                <span class="glyphicon glyphicon-th"></span>
                Daftar Pengunjung Tahun Ini</a>
                  <a href="index.php?menu=9" <?php if($menu==9) { echo 'class=" list-group-item active"'; } else { echo 'class="list-group-item"'; } ?>>
                <span class="glyphicon glyphicon-calendar"></span>
                Daftar Pengunjung Per Periode</a>
			</div>

		</div>


		<div class="col-md-9">
                    <?php
                    switch($menu)
                    {
                        case('1'): include_once('dashboard.php'); break;
                        case('2'): include_once('daftar_pengunjung.php'); break;
                        case('3'): include_once('pengunjung_kemarin.php'); break;
                        case('4'): include_once('pengunjung_bulan.php'); break;
                        case('5'): include_once('pengunjung_tahun.php'); break;
                        case('6'): include_once('kontak.php'); break;
                        case('7'): include_once('tentang.php'); break;
                        case('8'): include_once('tambah_tamu.php'); break;
                        case('9'): include_once('pengunjung_periode.php'); break;
                        case('10'): include_once('cara_pendaftaran.php'); break;
                        default:   include_once('daftar_pengunjung.php'); break;
                    }
                ?>

	   </div>

	<footer>
    <div class="col-md-12 alert alert-info">
     	<div class="container">
	        <p class="pull-right">Created By : Lubna. A | <a href="#">Back to top</a></p>
	        <p>&copy; <?php   print(date("Y")); ?> Credit By  <a href="#"><?php echo $datax['nm_instansi'];?></a>
	    </div>
    </div>
</footer>



	<script type="text/javascript" src="bootstrap-3.4.1-dist/js/jquery.dataTables.min.js"></script>
	<script src="bootstrap-3.4.1-dist/js/dataTables.bootstrap.min.js"></script>


	<script type="text/javascript">
			$(document).ready(function() {
		    $('#example').DataTable( {
		      /*  dom: 'Bfrtip',
		        buttons: [
		            'copy', 'csv', 'excel', 'pdf', 'print'
		        ], */
		        "language" :{
		        	"lengthMenu": "Menampilkan _MENU_  baris per halaman",
		        	"zeroRecords": "Maaf, Data Tidak Ditemukan",
		        	"info": "Halaman _PAGE_ dari total _PAGES_ halaman",
		        	"infoEmpty" : "Data Tidak Ada",
		        	"search" : "Pencarian",
		        	"infoFiltered" : "(menampilkan dari _MAX_ total data)",
		        	"paginate" : {
		        		"previous" : "Sebelumnya",
		        		"next" : "Selanjutnya"
		        	}

		        }
		    } );
		    $('#example2').DataTable( {
		      /*  dom: 'Bfrtip',
		        buttons: [
		            'copy', 'csv', 'excel', 'pdf', 'print'
		        ], */
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
		} );

	</script>
	<script type="text/javascript" language="javascript" class="init">

$(function() {
  var oTable = $('#examplex').DataTable({
    
    "processing": true,
		"serverSide": true,
		"ajax": "server_processing.php",
		  "language" :{
		        	"lengthMenu": "Menampilkan _MENU_  baris per halaman",
		        	"zeroRecords": "Maaf, Data Tidak Ditemukan",
		        	"info": "Halaman _PAGE_ dari total _PAGES_ halaman",
		        	"infoEmpty" : "Data Tidak Ada",
		        	"search" : "Pencarian",
		        	"infoFiltered" : "(menampilkan dari _MAX_ total data)",
		        },
 

  });

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



});




	</script>
    <?php
    function koneksidatabase()
{
    include('koneksi.php');
    return $kdb;
}

    ?>
	</body>
</html>