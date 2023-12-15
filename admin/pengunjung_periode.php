        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active"><a href="index.php?menu=7">Pengunjung Per Periode</a></li>
        </ol>
<!-- memanggil function dengan switch case dan memproteksi halaman dengan session-->
            <?php if(!isset($_SESSION['username'])){ header("location:login.php"); } ?>
                <?php
            $a = !empty($_GET['a']) ? $_GET['a'] : "reset";
            $id_tamu = !empty($_GET['id']) ? $_GET['id'] : " ";

            $a = @$_GET["a"];
            $sql = @$_POST["sql"];

            switch ($sql) {
            
              case "insert": sql_insert(); break;
              case "update": sql_update(); break;
              case "delete": sql_delete(); break;
            }

            switch ($a) {
               
               
                case "edit"  :  curd_update($id_tamu); break;
                case "hapus"  :  curd_delete($id_tamu); break;
                case "detail" : curd_detail($id_tamu); break;
              
            }
             // mysqli_close($kdb);
            ?>

                                            <div class="card mb-3">
                                              <div class="card-header">
                                                <i class="fas fa-table"></i>
                                                Pengunjung Per Periode</div>
                                              <div class="card-body">
                                                                <hr>
                                                                  <form method=POST action=''>   
                                                                              
                                                                                <div class="input-daterange">
                                                                                  <div class="row">
                                                                                   <div class="col-md-6">
                                                                                    Tanggal Awal
                                                                                    <input type="text" name="start_date" id="start_date" class="form-control">  
                                                                                    </div>

                                                                                     <div class="col-md-6">
                                                                                    Tanggal Akhir
                                                                                    <input type="text" name="end_date" id="end_date" class="form-control"> 
                                                                                    </div> 
                                                                                  
                                                                                  </div>
                                                                                <br>
                                                                                <button class='btn btn-primary'>
                                                                                  <i class="fas fa-search"></i> Cari</button>
                                                                            <a href="index.php?menu=7" class='btn btn-success'>
                                                                              <i class="fas fa-sync-alt"></i> Clear</a>
                                                                          


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
                                                                  <th>Tanggal & Waktu Kunjung</th>
                                                                  <th>Nama</th>
                                                                  <th>Alamat</th>
                                                                  <th>Kabupaten</th>
                                                                  <th>Instansi</th>
                                                                  <th>Keperluan</th>
                                                                  <th>Yang Ditemui</th>
                                                                  <th>No Telepon</th>
                                                                  <th>No</th>
                                                                <th>#</th>  
                                                                 
                                                              </tr>
                                                          </thead>
                                                          <tbody>
                                                                   <?php

                                                                   $sql="select * from tamu where date(tanggal_waktu) BETWEEN '$tglawal' AND '$tglakhir' order by id_tamu DESC";
                                                    $hasil = mysqli_query($kdb, $sql);
                                                    $i=1;
                                                      while($baris=mysqli_fetch_array($hasil)){

                                                         echo "
                                                         <tr>
                                                         <td>$baris[tanggal_waktu]</td>
                                                         <td>$baris[nama]</td>
                                                         <td>$baris[alamat]</td>
                                                         <td>$baris[kabupaten]</td>
                                                         <td>$baris[instansi]</td>
                                                         <td>$baris[keperluan]</td>
                                                         <td>$baris[yang_ditemui]</td>
                                                         <td>$baris[no_telp]</td>
                                                         <td>$i</td>
                                                      ";
                                                      ?>
                                                      <td><a class="btn btn-sm btn-outline-dark" target="_blank" href="index.php?menu=7&a=detail&id=<?php echo intval($baris['id_tamu']); ?>"> <span class="fab fa-fw fas fa-eye" aria-hidden="true"></span></a>
                                                          <a class="btn btn-sm btn-outline-dark "target="_blank"href="index.php?menu=7&a=edit&id=<?php echo intval($baris['id_tamu']); ?>"> <span class="fab fa-fw fas fa-pencil-alt" aria-hidden="true"></span></a>
                                                          <a class="btn btn-sm btn-outline-dark "target="_blank"href="index.php?menu=7&a=hapus&id=<?php echo intval($baris['id_tamu']); ?>"> <span class="fab fa-fw fas fa-trash" aria-hidden="true"></span></a></td>
                                                    </tr>
                                                    <?php
                                                       $i++;
                                                    }
                                                        ?>
                                                              
                                                          </tbody>
                                                          <tfoot>
                                                              <tr>
                                                                  <th>Tanggal & Waktu Kunjung</th>
                                                                  <th>Nama</th>
                                                                  <th>Alamat</th>
                                                                  <th>Kabupaten</th>
                                                                  <th>Instansi</th>
                                                                  <th>Keperluan</th>
                                                                  <th>Yang Ditemui</th>
                                                                  <th>No Telepon</th>
                                                                  <th>No</th>
                                                                <th>#</th> 
                                                              </tr>
                                                          </tfoot>
                                                      </table>
                                          </div> 
                                          </div> 
                                        </div>
</div>
                        <!-- Akhir Read Data- -->

 <?php 
function curd_update($id_tamu) 
{
global $kdb;
$hasil2 = sql_select_byid($id_tamu);
$row = mysqli_fetch_array($hasil2);

?>
                            <div class="card mb-3">
                            <div class="card-header">
                              <i class="fas fa-table"></i>
                              Edit Pengunjung </div>
                            <div class="card-body">
                                <form class="form-horizontal" method="post" action="index.php?menu=7&a=reset">
                                  <input type="hidden" name="sql" value="update" >
                                  <input type="hidden" name="id_tamux" value="<?php  echo $id_tamu; ?>" >
                                       <div class="form-group col-md-12">
                                            <label>Nama</label>
                                            <input class="form-control" type="text" name="nama" value="<?php echo trim($row["nama"]) ?>" >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Alamat</label>
                                            <input class="form-control" type="text" name="alamat" style="min-height:110px;" value="<?php echo trim($row["alamat"]) ?>" >
                                        </div>
                                         <div class="form-group col-md-12">
                                            <label>Instansi</label>
                                            <input class="form-control" type="text" name="instansi" value="<?php echo trim($row["instansi"]) ?>">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Kabupaten</label>
                                        
                                        <select class="form-control" id="kabupaten" name="kabupaten">
                                          <option value="Lampung Barat"
                                          <?php if(trim($row["kabupaten"])=='Lampung Barat') {echo "selected"; } else {echo ""; } ?>
                                          >Lampung Barat</option>
                                          <option value="Lampung Selatan"
                                           <?php if(trim($row["kabupaten"])=='Lampung Selatan') {echo "selected"; } else {echo ""; } ?>
                                           >Lampung Selatan</option>
                                          <option value="Lampung Tengah"
                                           <?php if(trim($row["kabupaten"])=='Lampung Tengah') {echo "selected"; } else {echo ""; } ?>
                                           >Lampung Tengah</option>
                                          <option value="Lampung Timur"
                                           <?php if(trim($row["kabupaten"])=='Lampung Timur') {echo "selected"; } else {echo ""; } ?>
                                           >Lampung Timur</option>
                                          <option value="Lampung Utara"
                                           <?php if(trim($row["kabupaten"])=='Lampung Utara') {echo "selected"; } else {echo ""; } ?>
                                           >Lampung Utara</option>
                                          <option value="Mesuji"  <?php if(trim($row["kabupaten"])=='Mesuji') {echo "selected"; } else {echo ""; } ?>
                                          >Mesuji</option>
                                          <option value="Pesawaran"  <?php if(trim($row["kabupaten"])=='Pesawaran') {echo "selected"; } else {echo ""; } ?>
                                          >Pesawaran</option>
                                          <option value="Pesisir Barat"  <?php if(trim($row["kabupaten"])=='Pesisir Barat') {echo "selected"; } else {echo ""; } ?>
                                          >Pesisir Barat</option>
                                          <option value="Pringsewu" <?php if(trim($row["kabupaten"])=='Pringsewu') {echo "selected"; } else {echo ""; } ?>
                                          >Pringsewu</option>
                                          <option value="Tanggamus" <?php if(trim($row["kabupaten"])=='Tanggamus') {echo "selected"; } else {echo ""; } ?>
                                          >Tanggamus</option>
                                          <option value="Tulang Bawang" <?php if(trim($row["kabupaten"])=='Tulang Bawang') {echo "selected"; } else {echo ""; } ?>
                                          >Tulang Bawang</option>
                                          <option value="Tulang Bawang Barat" <?php if(trim($row["kabupaten"])=='Tulang Bawang Barat') {echo "selected"; } else {echo ""; } ?>
                                          >Tulang Bawang Barat</option>
                                          <option value="Way Kanan" <?php if(trim($row["kabupaten"])=='Way Kanan') {echo "selected"; } else {echo ""; } ?>
                                          >Way Kanan</option>
                                          <option value="Kota Bandar Lampung" <?php if(trim($row["kabupaten"])=='Kota Bandar Lampung') {echo "selected"; } else {echo ""; } ?>
                                          >Kota Bandar Lampung</option>
                                          <option value="Kota Metro" <?php if(trim($row["kabupaten"])=='Kota Metro') {echo "selected"; } else {echo ""; } ?>
                                          >Kota Metro</option>
                                        </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Yang Ditemui</label>
                                            <input class="form-control" type="text" name="yang_ditemui" value="<?php echo trim($row["yang_ditemui"]) ?>" >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Keperluan</label>
                                            <input class="form-control" type="text" name="keperluan" value="<?php echo trim($row["keperluan"]) ?>" >
                                        </div>
                                        
                                        <div class="form-group col-md-12">
                                            <label>No Telepon</label>
                                            <input class="form-control" type="text" name="no_telp" value="<?php echo trim($row["no_telp"]) ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Tanggal dan Waktu Kunjung</label>
                                            <div class="col-md-6">
                                              <div class="input-append date form_datetime">
                                                  <input size="20" type="text" name="tanggal_waktu" value="<?php echo trim($row["tanggal_waktu"]) ?>" >
                                                  <span class="add-on"><i class="icon-th"></i></span>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"></label>
                                            <div class="col-sm-8">
                                                <input type="submit"  name="action" value="Simpan" class="btn btn-primary"  value="SIMPAN">
                                                <a href="index.php?menu=7&a=reset" class="btn btn-danger">Batal</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

<?php }?>
      <!-- Akhir create data -->

<!-- Menampilkan detail data -->

 <?php 
function curd_detail($id_tamu) 
{
global $kdb;
$hasil2 = sql_select_byid($id_tamu);
$row = mysqli_fetch_array($hasil2);

?>

</form>

        <div class="card">
                        <div class="card-header">
                            Detail Data Pengunjung
                        </div>
                        <div class="card-body p-0">

                            <form role="form">
                                        <div class="form-group col-md-12">
                                            <label>Nama</label>
                                            <input class="form-control" type="text" value="<?php echo trim($row["nama"]) ?>" disabled/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Alamat</label>
                                            <input class="form-control" type="text" style="min-height:110px;" value="<?php echo trim($row["alamat"]) ?>" disabled/>
                                        </div>
                                         <div class="form-group col-md-12">
                                            <label>Instansi</label>
                                            <input class="form-control" type="text" value="<?php echo trim($row["instansi"]) ?>" disabled/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Kabupaten</label>
                                            <input class="form-control" type="text" value="<?php echo trim($row["kabupaten"]) ?>" disabled/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Yang Ditemui</label>
                                            <input class="form-control" type="text" value="<?php echo trim($row["yang_ditemui"]) ?>" disabled/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Keperluan</label>
                                            <input class="form-control" type="text" value="<?php echo trim($row["keperluan"]) ?>" disabled/>
                                        </div>
                                        
                                        <div class="form-group col-md-12">
                                            <label>No Telepon</label>
                                            <input class="form-control" type="text" value="<?php echo trim($row["no_telp"]) ?>" disabled/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Tanggal Kunjung</label>
                                            <input class="form-control" type="text" value="<?php echo trim(tanggal_indo($row["tanggal"])) ?>" disabled/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Waktu Kunjung</label>
                                            <input class="form-control" type="text" value="<?php echo trim($row["waktu"]) ?>" disabled/>
                                        </div>
                                        <a href="index.php?menu=7&a=reset"style="color:white;" class="btn btn-danger btn-md col-md-12">
                                          <span class="fas fa-angle-double-left"></span>KEMBALI</a></p>

                                    </form>
                                  </div>
                            </div>
                        </div>
               
<?php } ?>

  </div>

  <!-- akhir detail data -->

  <!-- menampilkan hapus data -->

<?php function curd_delete($id_tamu) 
{
global $kdb;
$hasil2 = sql_select_byid($id_tamu);
$row = mysqli_fetch_array($hasil2);

?>
          <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Penghapusan Data Tamu </div>
          <div class="card-body">

              <br>
              <form action="index.php?menu=7&a=reset" method="post">
              <input type="hidden" name="sql" value="delete" >
              <input type="hidden" name="id_tamux" value="<?php  echo $id_tamu; ?>" >
              <h4> Anda yakin akan menghapus data Tamu <b> <?php echo $row['nama'];?> </b>
              dari instansi <b><?php echo $row['instansi'];?> </b> pada tanggal dan waktu <b> <?php echo $row['tanggal_waktu'];?> </b>  </h4>
              <p><input type="submit" name="action" value="Delete" class="btn btn-primary btn-lg" >
              <a href="index.php?menu=7&a=reset"style="color:white;" class="btn btn-danger btn-lg">Batal</a></p>
              </form>

          </div>
          </div>
<?php } ?>

  <!-- akhir hapus data -->



<!--- function CRUD -->
<?php


function sql_select_byid($id_tamu)
{
    global $kdb;
    $sql = " select *, date(tanggal_waktu) as tanggal, time(tanggal_waktu) as waktu from tamu where id_tamu = ".$id_tamu; 
    $hasil2 = mysqli_query($kdb, $sql) or die(mysql_error());
    return $hasil2;
}
function sql_update()
{
  global $kdb;
  global $_POST;
  $sql  = " update  `tamu` set `nama` = '".$_POST["nama"]."', kabupaten = '".$_POST["kabupaten"]."', instansi = '".$_POST["instansi"]."', alamat = '".$_POST["alamat"]."', keperluan = '".$_POST["keperluan"]."', yang_ditemui = '".$_POST["yang_ditemui"]."', tanggal_waktu = '".$_POST["tanggal_waktu"]."'  where id_tamu = ".$_POST["id_tamux"];
  mysqli_query($kdb, $sql) or die( mysql_error());
                if($sql){
           echo "<script>alert('Data anda berhasil di ubah!');window.location = 'index.php?menu=7'</script>";

            }else{
                echo '<div class="alert alert-warning">Gagal meengedit data!</div>';
            }
}

function sql_delete()
{
  global $kdb;
  global $_POST;
  $sql  = " delete from `tamu` where id_tamu = ".$_POST["id_tamux"];
  mysqli_query($kdb, $sql) or die( mysql_error());
       if($sql){
           echo "<script>alert('Data anda berhasil di hapus!');window.location = 'index.php?menu=7'</script>";

            }else{
                echo '<div class="alert alert-warning">Gagal meenghapus data!</div>';
            }
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
      </div>
      <!-- akhir function -->

