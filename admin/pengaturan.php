<ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active"><a href="index.php?menu=9">Ubah Password</a></li>
        </ol>

		<?php
	
	
	//proses jika tombol rubah di klik
	if(isset($_POST['submit'])){
		//membuat variabel untuk menyimpan data inputan yang di isikan di form
		$password_lama			= $_POST['password_lama'];
		$password_baru			= $_POST['password_baru'];
		$konfirmasi_password	= $_POST['konfirmasi_password'];
		
		//cek dahulu ke database dengan query SELECT
		//kondisi adalah WHERE (dimana) kolom password adalah $password_lama di encrypt m5
		//encrypt -> md5($password_lama)
		$password_lama	= md5($password_lama);
		$cek 			= $kdb->query("SELECT password FROM staf WHERE password='$password_lama'");
		
		if($cek->num_rows){
			//kondisi ini jika password lama yang dimasukkan sama dengan yang ada di database
			//membuat kondisi minimal password adalah 5 karakter
			if(strlen($password_baru) >= 5){
				//jika password baru sudah 5 atau lebih, maka lanjut ke bawah
				//membuat kondisi jika password baru harus sama dengan konfirmasi password
				if($password_baru == $konfirmasi_password){
					//jika semua kondisi sudah benar, maka melakukan update kedatabase
					//query UPDATE SET password = encrypt md5 password_baru
					//kondisi WHERE id user = session id pada saat login, maka yang di ubah hanya user dengan id tersebut
					$password_baru 	= md5($password_baru);
					$username 		= $_SESSION['username']; //ini dari session saat login
					
					$update 		= $kdb->query("UPDATE staf SET password='$password_baru' WHERE username='$username'");
					if($update){
						//kondisi jika proses query UPDATE berhasil
						echo '<div class="alert alert-success alert-dismissible" role="alert">
  								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Password berhasil di rubah</div>';
					}else{
						//kondisi jika proses query gagal
						echo '<div class="alert alert-danger alert-dismissible" role="alert">
  								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Gagal merubah password</div>';
					}					
				}else{
					//kondisi jika password baru beda dengan konfirmasi password
					echo '<div class="alert alert-danger alert-dismissible" role="alert">
  								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Konfirmasi password tidak cocok</div>';
				}
			}else{
				//kondisi jika password baru yang dimasukkan kurang dari 5 karakter
				echo '<div class="alert alert-danger alert-dismissible" role="alert">
  								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Minimal password baru adalah 5 karakter</div>';
			}
		}else{
			//kondisi jika password lama tidak cocok dengan data yang ada di database
			echo '<div class="alert alert-danger alert-dismissible" role="alert">
  								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Password lama tidak cocok</div>';
		}
	}
	?>

<div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-gear"></i>
            Pengaturan Ubah Password </div>
          <div class="card-body">
              <form class="form-horizontal" method="post" action="">
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Password Lama</label>
                          <div class="col-sm-4">
                              <input class="form-control" type="password" name="password_lama" required>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Password Baru</label>
                          <div class="col-sm-4">
                              <input class="form-control" type="password" name="password_baru" required>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Konfirmasi Password</label>
                          <div class="col-sm-4">
                              <input class="form-control" type="password" name="konfirmasi_password" required>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label"></label>
                          <div class="col-sm-8">
                              <input type="submit"  name="submit" value="Ubah" class="btn btn-primary"  >
                              <a href="index.php?menu=1" class="btn btn-danger">Batal</a>
                          </div>
                      </div>
                  
              </div>
          </div>


	