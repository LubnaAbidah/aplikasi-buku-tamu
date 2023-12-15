    <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active"><a href="index.php?menu=8">Pendaftaran Pengunjung</a></li>
        </ol>
<div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-gear"></i>
            Pendaftaran Pengunjung </div>
          <div class="card-body">
        <?php

        //jika di klik tombol kirim pesan menjalankan script di bawah ini
        if(isset($_POST['submit']))
        {
            $nama       = $_POST['nama'];
            $kabupaten  = $_POST['kabupaten'];
            $instansi   = $_POST['instansi'];
            $alamat     = $_POST['alamat'];
            $keperluan  = $_POST['keperluan'];
            $yang_ditemui = $_POST['yang_ditemui'];
            $no_telp    = $_POST['no_telp'];
            $input      = $kdb->query("INSERT INTO tamu(nama,kabupaten,instansi,alamat,keperluan,yang_ditemui,no_telp) VALUES('$nama','$kabupaten','$instansi','$alamat','$keperluan','$yang_ditemui','$no_telp')") or die($kdb->error);
            if($input){
           echo "<script>alert('Data Pengunjung berhasil di simpan!');window.location = 'index.php'</script>";

            }else{
                echo '<div class="alert alert-warning">Gagal menyimpan pesan!</div>';
            }
        }
        ?>
        <form class="form-horizontal" method="post" action="index.php?menu=6">
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
                <option value="Kota Bandar Lampung" selected>Kota Bandar Lampung</option>
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
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-8">
                    <input type="submit" name="submit" class="btn btn-primary"  value="SIMPAN">
                     <input type="reset" class="btn btn-danger" value="RESET">
                </div>
            </div>
        </form>
</div>
</div>
