<?php

if(!isset($_SESSION['username'])){ header("location:login.php"); }
error_reporting(0);
?>

  	<ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active"><a href="index.php?menu=13">Backup Database</a></li>
        </ol>
        
 
    <!-- Content -->
    <div class="alert alert-info" role="alert">
        <h5 class="alert-heading"><span class="fas fa-fw fa-info-circle"></span> Informasi Cara Backup Database</h5>
        1. Lakukan <b>backup data SQL setiap setahun sekali pada akhir tahun </b><br>
        2. Lakukan backup data dengan <b>export data excel tiap bulannya pada menu "Pengunjung Per Periode"</b>.<br>
        3. Lakukan penghapusan data tamu secara berkala setiap setahun sekali pada akhir tahun.
       <b> Pastikan sebelum melakukan klik tombol "Hapus Semua Data", semua backup telah dilakukan seperti pada langkah poin 1 dan 2.</b><br>
        4. Lakukan import data excel bila diperlukan pada menu <b> "Dashboard" </b> <br>
        5. Jika diperlukan reset data, database struktur default dapat di download di bawah ini.<br>
        <hr>
        <p class="mb-0"><b>Backup data dalam bentuk SQL maupun Reset data dalam bentuk SQL dapat diserahkan pada Administrator Database apabila diperlukan. </b></p>
        <p class="mb-0">Cara penggunaan aplikasi lebih lanjut dapat dilihat di menu Penggunaan Aplikasi atau di link berikut. </p>
      </div>

       <form action="" method="post" name="postform" >
       <div class="alert alert-success" role="alert">
        <h5 class="alert-heading"><span class="fas fa-fw fa-save"></span>Backup Data SQL</h5>
        Untuk melakukan backup data dalam bentuk sql klik tombol berikut. Lakukan Backup Data SQL setiap sekali setahun pada akhir tahun.<hr>
        <button type='submit' class='btn btn-primary'  name='backup' onClick="return confirm('Anda yakin ingin melakukan backup database ?')"><span class="fas fa-fw fa-save"></span>Backup Database</button>
      </div>
       </form>
       <?php
        if(isset($_POST['backup'])){

          //membuat nama file
          $file = "buku_tamu_".date("d-m-Y").'.sql';

          //panggil fungsi dengan memberi parameter untuk koneksi dan nama file untuk backup
          $a = backup_tables("localhost","root","","buku_tamu",$file);
      ?>

          <div class="alert alert-primary" role="alert" align="center"><a style="cursor:pointer"  onClick="location.href='../admin/download_backup_data.php?nama_file=<?php echo $file; ?>'" title="Download">Backup database telah selesai. <font color="#0066FF">Download file database</font></a>
          </div>
          <div class="alert alert-danger" role="alert">
            <h5 class="alert-heading"><span class="fas fa-fw fa-exclamation-triangle"></span> Hapus Semua Data Tamu</h5>
            Lakukan penghapusan data tamu secara berkala setiap setahun sekali pada akhir tahun.
            Pastikan sebelum melakukan klik tombol "Hapus Semua Data", semua backup telah dilakukan.<hr>
            <a href="#" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger">
              <span class="fas fa-fw fa-exclamation-triangle"></span>
              Hapus Semua Data
            </a>
          </div>

      <?php
        }else{
          unset($_POST['backup']);
        }

        
        
        date_default_timezone_set("ASIA/JAKARTA");
        function backup_tables($host,$user,$pass,$name,$nama_file,$tables = '*')
        {
          //untuk koneksi database
          $connect = mysqli_connect($host,$user,$pass,$name);

          if($tables == '*')
          {
            $tables = array();
            $result = mysqli_query($connect, 'SHOW TABLES');
            while($row = mysqli_fetch_row($result))
            {
              $tables[] = $row[0];
            }
          }else{
            //jika hanya table-table tertentu
            $tables = is_array($tables) ? $tables : explode(',',$tables);
          }

          //looping dulu
          foreach($tables as $table)
          {
            $result = mysqli_query($connect, 'SELECT * FROM '.$table);
            $num_fields = mysqli_num_fields($result);

            //menyisipkan query drop table untuk nanti hapus table yang lama
            $return.= 'DROP TABLE '.$table.';';
            $row2 = mysqli_fetch_row(mysqli_query($connect, 'SHOW CREATE TABLE '.$table));
            $return.= "\n\n".$row2[1].";\n\n";

            for ($i = 0; $i < $num_fields; $i++)
            {
              while($row = mysqli_fetch_row($result))
              {
                //menyisipkan query Insert. untuk nanti memasukan data yang lama ketable yang baru dibuat. so toy mode : ON
                $return.= 'INSERT INTO '.$table.' VALUES(';
                for($j=0; $j<$num_fields; $j++)
                {
                  //akan menelusuri setiap baris query didalam
                  $row[$j] = addslashes($row[$j]);
                  $row[$j] = preg_replace("/\n/","/\\n/",$row[$j]);
                  if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                  if ($j<($num_fields-1)) { $return.= ','; }
                }
                $return.= ");\n";
              }
            }
            $return.="\n\n\n";
          }

          //simpan file di folder yang anda tentukan sendiri. kalo saya sech folder "DATA"
          $nama_file;

          $handle = fopen('../admin/tmp/'.$nama_file,'w+');
          fwrite($handle,$return);
          fclose($handle);
        }
      ?>

      <div class="alert alert-warning" role="alert">
        <h5 class="alert-heading"><span class="fas fa-fw fa-coins"></span>Export dan Import Data </h5>
        Lakukan import dan export data excel bila dibutuhkan dengan klik tombol berikut atau tombol import pada menu Dashboard dan tombol export pada menu Pengunjung Per Periode.<hr>
        <a href="index.php?menu=7" target="_blank" class="btn btn-link">
          <span class="fas fa-fw fa-upload"></span>
          Eksport Data
        </a>
        <a href="index.php?menu=12" target="_blank" class="btn btn-link">
          <span class="fas fa-fw fa-download"></span>
          Import Data
        </a>
      </div>

      

       <div class="alert alert-dark" role="alert">
        <h5 class="alert-heading"><span class="fas fa-fw fa-undo"></span> Reset Data</h5>
         Jika diperlukan reset data, database struktur default SQL dapat di download di bawah ini. Kemudian serahkan Reset Data SQL kepada Administrator Database untuk tindakan lebih lanjut.<hr>
        <a href="./tmp/tamu.sql" class="btn btn-info">
          <span class="fas fa-fw fa-undo"></span>
          Download Default Database
        </a>
      </div>

       <!-- Logout Modal-->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin ingin Menghapus Semua Data Tamu ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"><b>Pastikan semua data telah terbackup!!!</b> Kemudian hapus semua data tamu dengan klik tombol delete.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fas fa-fw fa-ban"></i> Cancel</button>
          <a class="btn btn-danger" href="hapus.php?delete=ok"><i class="fas fa-fw fa-exclamation-triangle"></i> Delete</a>
        </div>
      </div>
    </div>
  </div>

     