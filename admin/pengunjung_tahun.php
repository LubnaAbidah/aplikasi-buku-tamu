        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active"><a href="index.php?menu=5">Pengunjung Tahun Ini</a></li>
        </ol>
<!-- memanggil function dengan switch case dan memproteksi halaman dengan session-->
            <?php if(!isset($_SESSION['username'])){ header("location:login.php"); } ?>

                                            <div class="card mb-3">
                                              <div class="card-header">
                                                <i class="fas fa-table"></i>
                                                Pengunjung Tahun Ini</div>
                                              <div class="card-body">
                                                <div class="table-responsive">
                                                  <table class="table table-bordered" id="example3" width="100%" cellspacing="0">
                                                    <thead>
                                                      <tr>
                                                        <th class="border-0">Nama</th>
                                                        <th class="border-0">Alamat</th>
                                                        <th class="border-0">Kabupaten</th>
                                                        <th class="border-0">Instansi</th>
                                                        <th class="border-0">Keperluan</th>
                                                        <th class="border-0">Yang Ditemui</th>
                                                        <th class="border-0">No Telepon</th>
                                                        <th class="border-0">Tanggal & Waktu  Kunjung</th>
                                                        
                                                      </tr>
                                                    </thead>
                                                    <tfoot>
                                                      <tr>
                                                        <th class="border-0">Nama</th>
                                                        <th class="border-0">Alamat</th>
                                                        <th class="border-0">Kabupaten</th>
                                                        <th class="border-0">Instansi</th>
                                                        <th class="border-0">Keperluan</th>
                                                        <th class="border-0">Yang Ditemui</th>
                                                        <th class="border-0">No Telepon</th>
                                                        <th class="border-0">Tanggal & Waktu Kunjung</th>
                                                       
                                                      </tr>
                                                    </tfoot>
                                              </table>
                                          </div> 
                                          </div> 
                                        </div>

                        <!-- Akhir Read Data- -->


