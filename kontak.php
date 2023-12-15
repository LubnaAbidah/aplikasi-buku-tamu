
	                    <div class="list-group">
	                        <?php $result="select * from identitas_web";
								$sqli = mysqli_query($kdb,$result);
								$data=mysqli_fetch_assoc($sqli); ?>
						       
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
	                                                        <h2 class="mb-1"> <?php echo $data['nm_instansi'];?>
	                                                        </h2>
	                                                    </div>
	                                               
	                                                </div>
	                                                <!--  <div class="float-right"><a href="#" class="user-avatar-email text-secondary">www.henrybarbara.com</a></div> -->
	                                                <div class="user-avatar-address">
	                                                    <p class="border-bottom pb-3">
	                                                        <span class="d-xl-inline-block d-block mb-2"><i class="fa fa-map-marker-alt mr-2 text-primary "></i><?php echo $data['alamat_instansi'];?>, <?php echo $data['kode_pos'];?></span>
	                                                    </p>
	                                                    <div class="mt-3">
	                                                        <a class="badge badge-light">Solid</a> 
	                                                        <a class="badge badge-light">Loyal</a> 
	                                                        <a class="badge badge-light">Tangguh</a>
	                                                        <a class="badge badge-light">Pantang Menyerah</a>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="list-group-item active">
	                                	 <div class="row">
	                                	<h4>
	                                    <div class="col-md-4"> <i class="fab fa-twitter-square"></i> <?php echo $data['twitter'];?></div>
	                                    <div class="col-md-4"> <i class="fab fa-instagram"></i> <?php echo $data['instagram'];?></div>
	                                    <div class="col-md-4"><i class="fab fa-facebook-square "></i> <?php echo $data['fb'];?></div>
	                                    <div class="col-md-4"> <i class="fab fa-youtube"></i> <?php echo $data['url'];?></div>
	                                    <div class="col-md-4"> <i class="fas fa-envelope"></i> <?php echo $data['email'];?></div>
	                                    <div class="col-md-4"> <i class="fas fa-phone"></i> <?php echo $data['telepon'];?></div>
	                                </div>
	                                	</h4>
	                                </div>
	                            </div>
