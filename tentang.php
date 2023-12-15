
	                    <div class="list-group">
	                        
	                            <div class="list-group-item list-group-item-info">
	                                <div class="row">
	                                    <div class="col-md-4">
	                                        <div class="text-center">
	                                            <img src="./gambar/bpom.png" >
	                                            </div>
	                                        </div>
	                                        <div class="col-md-8">
	                                            <div class="user-avatar-info">
	                                                <div class="m-b-20">
	                                                    <div class="user-avatar-name">
	                                                        <h2 class="mb-1">Tentang Aplikasi 
	                                                        	<?php $result="select nm_website from identitas_web";
			                                            $sqli = mysqli_query($kdb,$result);
			                                            $data2=mysqli_fetch_assoc($sqli); ?>
	                                                        	<?php echo $data2['nm_website'];?> 
	                                                        </h2>
	                                                    </div>
	                                               
	                                                </div>
	                                                 <?php $result="select * from profil_web";
			                                            $sqli = mysqli_query($kdb,$result);
			                                            $data=mysqli_fetch_assoc($sqli); ?>
			                                         
			                                           
	                                                <div class="user-avatar-address">
	                                                    <p class="border-bottom pb-3">
	                                                        <span class="glyphicon glyphicon-calendar"></span> <?php echo $data['md_dt_profil'];?> 
	                                                        <i class="far fa-calendar-times"></i> <?php echo $data['md_tm_profil'];?> 
	                                                    </p>
	                                                    <div class="mt-3">
	                                                        <a class="badge badge-light">Solid</a> 
	                                                        <a class="badge badge-light">Loyal</a> 
	                                                        <a class="badge badge-light">Tangguh</a>
	                                                        <a class="badge badge-light">Pantang Menyerah</a>
	                                                    </div>
	                                                    <hr>
	                                                    
	                                                    	<?php echo $data['isi_profil'];?> 
	                                                    
	                                                </div>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="list-group-item active">
	                                 <div class="row">
	                                	<h4>
	                                    <div class="col-md-12">  &copy; <?php   print(date("Y")); ?> Created By : <?php echo $data['credit_by'];?>  </div>
	                                </div>
	                                	</h4>
	                                </div>
	                            </div>
