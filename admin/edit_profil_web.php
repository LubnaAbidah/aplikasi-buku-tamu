 <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active"><a href="index.php?menu=10">Edit Profil Web</a></li>
        </ol>
<?php 
if(isset($_POST['submit'])){
    $isi_profil = $_POST['isi_profil'];
    $credit_by = $_POST['credit_by'];
    $id = 1;
 
    // query update data
    $sql = "UPDATE profil_web SET isi_profil = '$isi_profil', credit_by = '$credit_by', md_dt_profil = date(NOW()) , md_tm_profil = time(NOW())  WHERE id_profil = $id";
    
   if ($kdb->query($sql) === TRUE) {
      echo '<div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Profil web berhasil di rubah</div>';
} else {
      echo '<div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Gagal merubah Profil Web</div>"';
   
}
} ?>


         <?php if(!isset($_SESSION['username'])){ header("location:login.php"); } 
         $id = mysqli_query($kdb, "SELECT * FROM profil_web");
            while ($r = mysqli_fetch_array($id)){ ?>

<div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-eye"></i>
            Edit Profil Web</div>
          <div class="card-body">
        
        <form class="form-horizontal" method="post" action="index.php?menu=10">
            <div class="form-group">
                <label class="col-sm-2 control-label">Isi Profil Web</label>
                <div class="col-sm-8">
                    <textarea  class="ckeditor" id="ckedtor" name="isi_profil" type="text" style="min-height:110px;"  class="form-control" placeholder="Isikan Profil Aplikasi" required>
                    <?php echo trim($r['isi_profil']); ?>
                </textarea>
                </div>
            </div>
			<div class="form-group">
                <label class="col-sm-2 control-label">Created By</label>
                <div class="col-sm-6">
                    <input type="text" name="credit_by" class="form-control"  value="<?php echo trim($r['credit_by']); ?>" placeholder="Credit By" required>
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