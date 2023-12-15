<?php
$a = !empty($_GET['a']) ? $_GET['a'] : "reset";
$id_tamu = !empty($_GET['id']) ? $_GET['id'] : " ";

$a = @$_GET["a"];
$sql = @$_POST["sql"];

switch ($sql) {
  case "detail": sql_detail(); break;
}

switch ($a) {
    case "reset" :  curd_read();   break;
    case "detail" : curd_detail($id_tamu); break;
    default : curd_read(); break;
}
  mysqli_close($kdb);

function curd_read()
{
  $hasil = sql_select();
  $i=1;
  ?>
   <div class="panel panel-info">
                        <div class="panel-heading">
                            Data Pengunjung Bulan Ini
                        </div>
                        <div class="panel-body">
  <div class="table-responsive">
<table id="example" class="table table-striped table-bordered"  style="width:100%">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Kabupaten</th>
                <th>Instansi</th>
                <th>Keperluan</th>
                <th>Yang Ditemui</th>
                <th>No Telepon</th>
                <th>Tanggal Kunjung</th>
                <th>Waktu Kunjung</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
                 <?php
      while($baris = mysqli_fetch_array($hasil))
      {
      ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $baris['nama']; ?></td>
                <td><?php echo $baris['alamat']; ?></td>
                <td><?php echo $baris['kabupaten']; ?></td>
                <td><?php echo $baris['instansi']; ?></td>
                <td><?php echo $baris['keperluan']; ?></td>
                <td><?php echo $baris['yang_ditemui']; ?></td>
                <td><?php echo $baris['no_telp']; ?></td>
                <td><?php echo tanggal_indo($baris['tanggal']); ?></td>
                <td><?php echo $baris['waktu']; ?></td>
                <td><a href="index.php?menu=4&a=detail&id=<?php echo intval($baris['id_tamu']); ?>" class="btn btn-success btn-sm">
          <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
        </a></td>
            </tr>
             <?php
       $i++;
      }
      ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Nomor</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Kabupaten</th>
                <th>Instansi</th>
                <th>Keperluan</th>
                <th>Yang Ditemui</th>
                <th>No Telepon</th>
                <th>Tanggal Kunjung</th>
                <th>Waktu Kunjung</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>
  </div>

   </div>
    </div>
    <?php
  mysqli_free_result($hasil);
}
 ?>

 <?php 
function curd_detail($id_tamu) 
{
global $kdb;
$hasil2 = sql_select_byid($id_tamu);
$row = mysqli_fetch_array($hasil2);

?>

</form>

        <div class="panel panel-info">
                        <div class="panel-heading">
                            Detail Data Pengunjung
                        </div>
                        <div class="panel-body">
                            <form role="form">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" type="text" value="<?php echo trim($row["nama"]) ?>" disabled/>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input class="form-control" type="text" style="min-height:110px;" value="<?php echo trim($row["alamat"]) ?>" disabled/>
                                        </div>
                                         <div class="form-group">
                                            <label>Instansi</label>
                                            <input class="form-control" type="text" value="<?php echo trim($row["instansi"]) ?>" disabled/>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Kabupaten</label>
                                            <input class="form-control" type="text" value="<?php echo trim($row["kabupaten"]) ?>" disabled/>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Yang Ditemui</label>
                                            <input class="form-control" type="text" value="<?php echo trim($row["yang_ditemui"]) ?>" disabled/>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Keperluan</label>
                                            <input class="form-control" type="text" value="<?php echo trim($row["keperluan"]) ?>" disabled/>
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <label>No Telepon</label>
                                            <input class="form-control" type="text" value="<?php echo trim($row["no_telp"]) ?>" disabled/>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Tanggal Kunjung</label>
                                            <input class="form-control" type="text" value="<?php echo trim(tanggal_indo($row["tanggal"])) ?>" disabled/>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Waktu Kunjung</label>
                                            <input class="form-control" type="text" value="<?php echo trim($row["waktu"]) ?>" disabled/>
                                        </div>

                                     
                                      

                                        <a href="index.php?menu=4&a=reset"style="color:white;" class="btn btn-danger btn-md col-md-12">
                                          <span class="glyphicon glyphicon-menu-left"></span>KEMBALI</a></p>
                                       

                                    </form>
                                  </div>
                            </div>
                        </div>
               
<?php } ?>

  </div>
    <?php


function sql_select()
{
  global $kdb;
  $sql = " select *, date(tanggal_waktu) as tanggal, time(tanggal_waktu) as waktu FROM tamu WHERE MONTH(tanggal_waktu) = MONTH(NOW()) order by id_tamu DESC ";
  $hasil = mysqli_query($kdb, $sql) or die(mysql_error());
  return $hasil;
}
function sql_select_byid($id_tamu)
{
    global $kdb;
    $sql = " select *, date(tanggal_waktu) as tanggal, time(tanggal_waktu) as waktu from tamu where id_tamu = ".$id_tamu; 
    $hasil2 = mysqli_query($kdb, $sql) or die(mysql_error());
    return $hasil2;
}
function sql_detail()
{
    global $kdb;
    global $_POST; 
    $sql  = " select * from `tamu` where id_tamu = ".$_POST["id_tamux"];        
    mysqli_query($kdb, $sql) or die( mysql_error()); 
}
function tanggal_indo($tanggal)
{
  $bulan = array (1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
      );
  $split = explode('-', $tanggal);
  return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}
?>

