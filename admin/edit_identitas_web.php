 <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active"><a href="index.php?menu=11">Edit Identitas Web</a></li>
        </ol>
<?php 
if(isset($_POST['submit'])){
    $nm_website = $_POST['nm_website'];
    $nm_instansi = $_POST['nm_instansi'];
    $alamat_instansi = $_POST['alamat_instansi'];
    $kode_pos = $_POST['kode_pos'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    $url = $_POST['url'];
    $fb = $_POST['fb'];
    $twitter = $_POST['twitter'];
    $instagram = $_POST['instagram'];
    $set_intval = $_POST['set_intval'];
    $id = 1;
 
    // query update data
    $sql = "UPDATE identitas_web SET nm_website = '$nm_website', nm_instansi = '$nm_instansi', alamat_instansi = '$alamat_instansi' , kode_pos = '$kode_pos', telepon = '$telepon', email= '$email', url = '$url', fb = '$fb', twitter = '$twitter', instagram = '$instagram', set_intval = '$set_intval' WHERE id_identitas = $id";
    
   if ($kdb->query($sql) === TRUE) {
    echo '<div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Identitas berhasil di rubah</div>';
} else {
  echo '<div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Gagal merubah Identitas Web </div>"';
   
}
}  ?>


         <?php if(!isset($_SESSION['username'])){ header("location:login.php"); } 
         $id = mysqli_query($kdb, "SELECT * FROM identitas_web");
            while ($r = mysqli_fetch_array($id)){ ?>

<div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-eye"></i>
            Edit Identitas Web</div>
          <div class="card-body">
        
        <form class="form-horizontal" method="post" action="index.php?menu=11">
           <div class="form-group">
                <label class="col-sm-2 control-label">Nama Web</label>
                <div class="col-sm-6">
                    <input type="text" name="nm_website" class="form-control" placeholder="Nama Web" value="<?php echo trim($r['nm_website']); ?>"  required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Nama Instansi</label>
                <div class="col-sm-6">
                    <input type="text" name="nm_instansi" class="form-control" placeholder="Nama Instansi" value="<?php echo trim($r['nm_instansi']); ?>"  required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Alamat Instansi</label>
                <div class="col-sm-8">
                    <textarea  class="ckeditor" id="ckedtor" name="alamat_instansi" type="text" style="max-height:10px;"  class="form-control" placeholder="Isikan Alamat Instansi" required>
                    <?php echo trim($r['alamat_instansi']); ?>
                </textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Kode Pos</label>
                <div class="col-sm-3">
                    <input type="text" name="kode_pos" class="form-control" placeholder="Kode Pos" value="<?php echo trim($r['kode_pos']); ?>"  required>
                </div>
            </div>
			     <div class="form-group">
                <label class="col-sm-2 control-label">Telepon</label>
                <div class="col-sm-6">
                    <input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo trim($r['telepon']); ?>"   required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-6">
                    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo trim($r['email']); ?>"  required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Credit By</label>
                <div class="col-sm-6">
                    <input type="text" name="url" class="form-control" placeholder="Credit By" value="<?php echo trim($r['url']); ?>"  required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Facebook</label>
                <div class="col-sm-6">
                    <input type="text" name="fb" class="form-control" placeholder="Facebook" value="<?php echo trim($r['fb']); ?>"  required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Twitter</label>
                <div class="col-sm-6">
                    <input type="text" name="twitter" class="form-control" placeholder="Twitter" value="<?php echo trim($r['twitter']); ?>"  required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Instagram</label>
                <div class="col-sm-6">
                    <input type="text" name="instagram" class="form-control" placeholder="Instagram" value="<?php echo trim($r['instagram']); ?>"  required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 control-label">Set Loader Time Index Per Second</label>
                <div class="col-sm-6">
                    <input type="number" name="set_intval" class="form-control" placeholder="Set Loader Time Index" value="<?php echo trim($r['set_intval']); ?>"  required> 
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-8">
                    <input type="submit" name="submit" class="btn btn-primary"  value="UBAH">
                     <a href="index.php?menu=1" class="btn btn-danger" >BATAL</a>
                </div>
            </div>
        </form>
    <?php } 
?>
</div>
</div>