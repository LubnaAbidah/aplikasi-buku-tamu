        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active"><a href="index.php?menu=5">Pengunjung Tahun Ini</a></li>
        </ol>
<!-- memanggil function dengan switch case dan memproteksi halaman dengan session-->
            <?php if(!isset($_SESSION['username'])){ header("location:login.php"); } ?>
            <?php
            $a = !empty($_GET['a']) ? $_GET['a'] : "reset";
            $id_tamu = !empty($_GET['id']) ? $_GET['id'] : " ";

            $a = @$_GET["a"];
            $sql = @$_POST["sql"];

            switch ($sql) {
              case "detail": sql_detail(); break;
              case "insert": sql_insert(); break;
              case "update": sql_update(); break;
              case "delete": sql_delete(); break;
            }

            switch ($a) {
                case "reset" :  curd_read();   break;
                case "tambah":  curd_create(); break;
                case "edit"  :  curd_update($id_tamu); break;
                case "hapus"  :  curd_delete($id_tamu); break;
                case "detail" : curd_detail($id_tamu); break;
                default : curd_read(); break;
            }
              mysqli_close($kdb);
            ?>
                       <?php function curd_read()
                        {
                          $hasil = sql_select();
                          $i=1;
                          ?>
                                                  <!-- Mencetak (Read) Data -->
                                            <div class="card mb-3">
                                              <div class="card-header">
                                                <i class="fas fa-table"></i>
                                                Pengunjung Tahun Ini</div>
                                              <div class="card-body">
                                                <a href="index.php?menu=5&a=tambah" class="btn btn-secondary btn-sm">
                                                  <span class=" fas fa-user-plus"></span> Tambah Data Tamu
                                                </a>
                                                <hr>
                                                <div class="table-responsive">
                                                  <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                                    <thead>
                                                      <tr>
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">Nama</th>
                                                        <th class="border-0">Alamat</th>
                                                        <th class="border-0">Kabupaten</th>
                                                        <th class="border-0">Instansi</th>
                                                        <th class="border-0">Keperluan</th>
                                                        <th class="border-0">Yang Ditemui</th>
                                                        <th class="border-0">No Telepon</th>
                                                        <th class="border-0">Tanggal Kunjung</th>
                                                        <th class="border-0">Waktu Kunjung</th>
                                                        <th class="border-0">Aksi</th>
                                                      </tr>
                                                    </thead>
                                                    <tfoot>
                                                      <tr>
                                                         <th class="border-0">#</th>
                                                        <th class="border-0">Nama</th>
                                                        <th class="border-0">Alamat</th>
                                                        <th class="border-0">Kabupaten</th>
                                                        <th class="border-0">Instansi</th>
                                                        <th class="border-0">Keperluan</th>
                                                        <th class="border-0">Yang Ditemui</th>
                                                        <th class="border-0">No Telepon</th>
                                                        <th class="border-0">Tanggal Kunjung</th>
                                                        <th class="border-0">Waktu Kunjung</th>
                                                        <th class="border-0">Aksi</th>
                                                      </tr>
                                                    </tfoot>
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
                                                        <td><a class="btn btn-sm btn-outline-dark href="href="index.php?menu=5&a=detail&id=<?php echo intval($baris['id_tamu']); ?>"> <span class="fab fa-fw fas fa-eye" aria-hidden="true"></span></a>
                                                          <a class="btn btn-sm btn-outline-dark href="href="index.php?menu=5&a=edit&id=<?php echo intval($baris['id_tamu']); ?>"> <span class="fab fa-fw fas fa-pencil-alt" aria-hidden="true"></span></a>
                                                          <a class="btn btn-sm btn-outline-dark href="href="index.php?menu=5&a=hapus&id=<?php echo intval($baris['id_tamu']); ?>"> <span class="fab fa-fw fas fa-trash" aria-hidden="true"></span></a></td>
                                                    </tr>
                                                           <?php
                                                             $i++;
                                                            }
                                                          mysqli_free_result($hasil);
                                                        }
                                                         ?>
                                                </tbody>
                                              </table>
                                          </div> 
                                          </div> 

                        <!-- Akhir Read Data- -->

<!-- Menampilkan form Create Data- -->

<?php function curd_create() { ?>
          <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Tambah Pengunjung </div>
          <div class="card-body">
              <form class="form-horizontal" method="post" action="index.php?menu=5&a=reset">
                <input type="hidden" name="sql" value="insert" >
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Nama Lengkap</label>
                          <div class="col-sm-4">
                              <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                          </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="kabupaten">Kabupaten</label>
                         <div class="col-sm-4">
                        <select class="form-control" id="kabupaten" name="kabupaten">
                          <option value="Lampung Barat">Lampung Barat</option>
                          <option value="Lampung Selatan">Lampung Selatan</option>
                          <option value="Lampung Tengah">Lampung Tengah</option>
                          <option value="Lampung Timur">Lampung Timur</option>
                          <option value="Lampung Utara">Lampung Utara</option>
                          <option value="Mesuji">Mesuji</option>
                          <option value="Pesawaran">Pesawaran</option>
                          <option value="Pesisir Barat">Pesisir Barat</option>
                          <option value="Pringsewu">Pringsewu</option>
                          <option value="Tanggamus">Tanggamus</option>
                          <option value="Tulang Bawang">Tulang Bawang</option>
                          <option value="Tulang Bawang Barat">Tulang Bawang Barat</option>
                          <option value="Way Kanan">Way Kanan</option>
                          <option value="Kota Bandar Lampung">Kota Bandar Lampung</option>
                          <option value="Kota Metro">Kota Metro</option>
                        </select>
                         </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Instansi</label>
                          <div class="col-sm-4">
                              <input type="text" name="instansi" class="form-control" placeholder="instansi">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Alamat</label>
                          <div class="col-sm-8">
                              <input name="alamat" type="text" style="min-height:110px;" class="form-control" placeholder="Alamat" required>
                          </div>
                      </div>
                <div class="form-group">
                          <label class="col-sm-2 control-label">Keperluan</label>
                          <div class="col-sm-6">
                              <input type="text" name="keperluan" class="form-control" placeholder="Keperluan" required>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Yang Ditemui</label>
                          <div class="col-sm-6">
                              <input type="text" name="yang_ditemui" class="form-control" placeholder="Yang Ditemui" required>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">No Telepon</label>
                          <div class="col-sm-6">
                              <input type="number" name="no_telp" class="form-control" placeholder="No Telepon" required>
                          </div>
                      </div>
                            <div class="form-group">
                                <label class="control-label">Tanggal dan Waktu Kunjung</label>
                                <div class="col-md-6">
                                  <div class="input-append date form_datetime">
                                      <input size="20" type="text" name="tanggal_waktu">
                                      <span class="add-on"><i class="icon-th"></i></span>
                                  </div>
                                </div>
                            </div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label"></label>
                          <div class="col-sm-8">
                              <input type="submit"  name="action" value="Simpan" class="btn btn-primary"  value="SIMPAN">
                              <a href="index.php?menu=5&a=reset" class="btn btn-danger">Batal</a>
                          </div>
                      </div>
                  </form>
              </div>
          </div>

<?php }?>
      <!-- Akhir create data -->

<!-- Menampilkan form Update Data- -->

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
                                <form class="form-horizontal" method="post" action="index.php?menu=5&a=reset">
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
                                                <a href="index.php?menu=5&a=reset" class="btn btn-danger">Batal</a>
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
                                        <a href="index.php?menu=5&a=reset"style="color:white;" class="btn btn-danger btn-md col-md-12">
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
              <form action="index.php?menu=5&a=reset" method="post">
              <input type="hidden" name="sql" value="delete" >
              <input type="hidden" name="id_tamux" value="<?php  echo $id_tamu; ?>" >
              <h4> Anda yakin akan menghapus data Tamu <b> <?php echo $row['nama'];?> </b>
              dari instansi <b><?php echo $row['instansi'];?> </b> pada tanggal dan waktu <b> <?php echo $row['tanggal_waktu'];?> </b>  </h4>
              <p><input type="submit" name="action" value="Delete" class="btn btn-primary btn-lg" >
              <a href="index.php?menu=5&a=reset"style="color:white;" class="btn btn-danger btn-lg">Batal</a></p>
              </form>

          </div>
          </div>
<?php } ?>

  <!-- akhir hapus data -->



<!--- function CRUD -->
<?php
function sql_select()
{
  global $kdb;
  $sql = " select *, date(tanggal_waktu) as tanggal, time(tanggal_waktu) as waktu FROM tamu WHERE YEAR(tanggal_waktu) = YEAR(NOW()) order by id_tamu DESC";
  $hasil = mysqli_query($kdb, $sql) or die(mysql_error());
  return $hasil;
}
function sql_insert()
{
  global $kdb;
  global $_POST;
 $sql  = " insert into `tamu` (`nama`, `kabupaten`,`instansi`,`alamat`,`keperluan`,`yang_ditemui`,`no_telp`, `tanggal_waktu`) values ( '".$_POST["nama"]."', '".$_POST["kabupaten"]."',  '".$_POST["instansi"]."', '".$_POST["alamat"]."','".$_POST["keperluan"]."','".$_POST["yang_ditemui"]."','".$_POST["no_telp"]."', '".$_POST["tanggal_waktu"]."')";
  mysqli_query($kdb, $sql) or die(mysql_error());
              if($sql){
           echo "<script>alert('Data anda berhasil di simpan!');window.location = 'index.php?menu=5'</script>";

            }else{
                echo '<div class="alert alert-warning">Gagal menyimpan data!</div>';
            }
}

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
           echo "<script>alert('Data anda berhasil di ubah!');window.location = 'index.php?menu=5'</script>";

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
           echo "<script>alert('Data anda berhasil di hapus!');window.location = 'index.php?menu=2'</script>";

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