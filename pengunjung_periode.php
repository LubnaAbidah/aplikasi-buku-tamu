

   <div class="panel panel-info">
                        <div class="panel-heading">
                            Data Pengunjung Per Periode
                        </div>
                        <div class="panel-body">
                <hr>
<form method=POST action=''>   
		        <div class="row">
		        	<div class="input-daterange">
		        		
		        		<div class="col-md-4">
		        			Tanggal Awal
		        			<input type="text" name="start_date" id="start_date" class="form-control">	
		        		</div>
		        		
		        		<div class="col-md-4">
		        			Tanggal Akhir
		        			<input type="text" name="end_date" id="end_date" class="form-control">	
		        		</div>
		        	</div>
		        	<br>
		        	<button class='btn btn-primary'><span class='glyphicon glyphicon-search'></span> Cari</button>
					<a href="index.php?menu=9" class='btn btn-success'><span class='glyphicon glyphicon-refresh'></span> Clear</a>
		        </div>


</form>
		        <hr>
  <div class="table-responsive">

<?php
$tglawal= @$_POST["start_date"];
$tglakhir= @$_POST["end_date"];
?>
<h3 color="red">Data Pengunjung Periode <?php echo $tglawal ?> s/d <?php echo $tglakhir?></h3>
<table id="example" class="table table-striped table-bordered"  style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Kabupaten</th>
                <th>Instansi</th>
                <th>Keperluan</th>
                <th>Yang Ditemui</th>
                <th>No Telepon</th>
                <th>Tanggal & Waktu Kunjung</th>
               
            </tr>
        </thead>
        <tbody>
                 <?php

                 $sql="select * from tamu where date(tanggal_waktu) BETWEEN '$tglawal' AND '$tglakhir' order by id_tamu DESC  ";
	$hasil = mysqli_query($kdb, $sql);
  $i=1;
    while($baris=mysqli_fetch_array($hasil)){

       echo "
       <tr>
       <td>$i</td>
			 <td>$baris[nama]</td>
			 <td>$baris[alamat]</td>
			 <td>$baris[kabupaten]</td>
			 <td>$baris[instansi]</td>
			 <td>$baris[keperluan]</td>
			 <td>$baris[yang_ditemui]</td>
			 <td>$baris[no_telp]</td>
			 <td>$baris[tanggal_waktu]</td>
		</tr>";
     $i++;
	}
      ?>
            
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Kabupaten</th>
                <th>Instansi</th>
                <th>Keperluan</th>
                <th>Yang Ditemui</th>
                <th>No Telepon</th>
                <th>Tanggal & Waktu Kunjung</th>
              
            </tr>
        </tfoot>
    </table>
  </div>

   </div>
    </div>
 
