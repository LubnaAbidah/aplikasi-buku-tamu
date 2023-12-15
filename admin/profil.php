 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-user-circle"></i>
            Profil Admin dan Profil 
		        <?php $result="select nm_website from identitas_web";
		      $sqli = mysqli_query($kdb,$result);
		      $data2=mysqli_fetch_assoc($sqli); ?>
		          <?php echo $data2['nm_website'];?>
      	  </div>
          <div class="card-body">
          	 <?php $result="select * from staf";
			        $sqli = mysqli_query($kdb,$result);
			        $data1 =mysqli_fetch_assoc($sqli); ?>
			Username Anda : <br>
			<b><?php echo $data1['username'];?> </b>
			<hr>
          	  <?php $result="select * from profil_web";
			        $sqli = mysqli_query($kdb,$result);
			        $data=mysqli_fetch_assoc($sqli); ?>
            Tentang Web : <br>
            <?php echo $data['isi_profil'];?> 
            <hr>
            Credit By : <br>
            <?php echo $data['credit_by'];?>
          </div>
          <div class="card-footer small text-muted">Updated  <?php echo $data['md_dt_profil'];?>  at 
	        <i class="far fa-calendar-times"></i> <?php echo $data['md_tm_profil'];?> 
          </div>
        </div>

 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-info-circle"></i>
            Identitas 
		        <?php $result="select * from identitas_web";
		      $sqli = mysqli_query($kdb,$result);
		      $data3=mysqli_fetch_assoc($sqli); ?>
		          <?php echo $data3['nm_website'];?>
      	  </div>
          <div class="card-body">
            Nama Web : <br>
            <?php echo $data3['nm_website'];?> 
            <hr>
            Nama Instansi : <br>
            <?php echo $data3['nm_instansi'];?> 
            <hr>
             Alamat Instansi : <br>
            <?php echo $data3['alamat_instansi'];?> , Kode Pos:
            <?php echo $data3['kode_pos'];?> 
            <hr>
             <div class="col-md-4"> <i class="fab fa-twitter-square"></i> @BPOMLampung</div>
	                                    <div class="col-md-4"> <i class="fab fa-instagram"></i> BPOMLampung</div>
	                                    <div class="col-md-4"><i class="fab fa-facebook-square "></i> BBPOM Bandar Lampung</div>
	                                    <div class="col-md-4"> <i class="fab fa-youtube"></i> BBPOM Lampung</div>
	                                    <div class="col-md-4"> <i class="fas fa-envelope"></i> bbpomlampung@bpomri.go.id</div>
	                                    <div class="col-md-4"> <i class="fas fa-phone"></i> (0721)252212</div>

          </div>
        </div>