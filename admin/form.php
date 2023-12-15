<?php

if(!isset($_SESSION['username'])){ header("location:login.php"); }
?>

  	<ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active"><a href="index.php?menu=12">Form Import Data</a></li>
        </ol>
 
    <!-- Content -->
    <div style="padding: 0 15px;">
      
      
      <h3>Form Import Data</h3>

      <div class="alert alert-info" role="alert">
        <h4 class="alert-heading"><span class="fas fa-fw fa-info-circle"></span> Informasi</h4>
        <p>1. Import data hanya dapat dapat didukung dengan <b>file Excel berekstensi .xlsx</b></p>
        <p>2. Sekali import data<b> tidak boleh melebihi 500 baris</b> excel sekali import</p>
        <p>3. Data yang terinput hanya di <b>sheet1 dalam Excel</b></p>
        <hr>
        <p class="mb-0">Format isian data yang import dapat diwonload dengan menekan <b>tombol download format</b> di bawah ini.</p>
      </div>

      <hr>
      
      <!-- Buat sebuah tag form dan arahkan action nya ke file ini lagi -->
      <form method="post" action="" enctype="multipart/form-data">
        <a href="Format.xlsx" class="btn btn-success">
          <span class="fas fa-fw fa-download"></span>
          Download Format
        </a><br><br>
        
        <!-- 
        -- Buat sebuah input type file
        -- class pull-left berfungsi agar file input berada di sebelah kiri
        -->
        <input type="file" name="file" class="pull-left">
        
        <button type="submit" name="preview" class="btn btn-success btn-sm">
          <span class="fas fa-fw fa-eye"></span> Preview
        </button>
        <!-- Buat sebuah tombol Cancel untuk kemabli ke halaman awal / view data -->
      <a href="index.php" class="btn btn-danger btn-sm pull-right">
        <span class="fas fa-fw fa-ban"></span> Cancel
      </a>
      </form>
      
      <hr>
      
    <!-- Buat Preview Data -->
      <?php
      // Jika user telah mengklik tombol Preview
      if(isset($_POST['preview'])){
        //$ip = ; // Ambil IP Address dari User
        $nama_file_baru = 'data.xlsx';
        
        // Cek apakah terdapat file data.xlsx pada folder tmp
        if(is_file('tmp/'.$nama_file_baru)) // Jika file tersebut ada
          unlink('tmp/'.$nama_file_baru); // Hapus file tersebut
        
        $tipe_file = $_FILES['file']['type']; // Ambil tipe file yang akan diupload
        $tmp_file = $_FILES['file']['tmp_name'];
        
        // Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
        if($tipe_file == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
          // Upload file yang dipilih ke folder tmp
          // dan rename file tersebut menjadi data{ip_address}.xlsx
          // {ip_address} diganti jadi ip address user yang ada di variabel $ip
          // Contoh nama file setelah di rename : data127.0.0.1.xlsx
          move_uploaded_file($tmp_file, 'tmp/'.$nama_file_baru);
          
          // Load librari PHPExcel nya
          require_once 'PHPExcel/PHPExcel.php';
          
          $excelreader = new PHPExcel_Reader_Excel2007();
          $loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file yang tadi diupload ke folder tmp
          $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
          
          // Buat sebuah tag form untuk proses import data ke database
          echo "<form method='post' action='import.php'>";
          
          // Buat sebuah div untuk alert validasi kosong
          echo "<div class='alert alert-danger' id='kosong'>
          Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
          </div>";
          
          echo "<table class='table table-bordered'>
          <tr>
            <th colspan='8' class='text-center'>Preview Data</th>
          </tr>
          <tr>
            <th>Tanggal Waktu</th>
            <th>Nama</th>
            <th>Kabupaten</th>
            <th>Instansi</th>
            <th>Alamat</th>
            <th>Keperluan</th>
            <th>Yang Ditemui</th>
            <th>No Telp</th>

            
          </tr>";
          
          $numrow = 1;
          $kosong = 0;
          foreach($sheet as $row){ // Lakukan perulangan dari data yang ada di excel
            // Ambil data pada excel sesuai Kolom
            $tanggal_waktu = $row['A']; 
            $nama = $row['B']; 
            $kabupaten = $row['C']; 
            $instansi = $row['D']; 
            $alamat = $row['E']; 
            $keperluan = $row['F']; 
            $yang_ditemui = $row['G'];
            $no_telp = $row['H'];
            
            
            // Cek jika semua data tidak diisi
            if(empty($tanggal_waktu) && empty($nama) && empty($kabupaten) && empty($instansi) && empty($alamat) && empty($keperluan) && empty($yang_ditemui) && empty($no_telp))
              continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
            
            // Cek $numrow apakah lebih dari 1
            // Artinya karena baris pertama adalah nama-nama kolom
            // Jadi dilewat saja, tidak usah diimport
            if($numrow > 1){
              // Validasi apakah semua data telah diisi
              $tanggal_waktu_td = ( ! empty($tanggal_waktu))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
              $nama_td = ( ! empty($nama))? "" : " style='background: #E07171;'"; // Jika tgl_lahir kosong, beri warna merah
              $kabupaten_td = ( ! empty($kabupaten))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
              $instansi_td = ( ! empty($instansi))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
              $alamat_td = ( ! empty($alamat))? "" : " style='background: #E07171;'"; // Jika Telepon kosong, beri warna merah
              $keperluan_td = ( ! empty($keperluan))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
              $yang_ditemui_td = ( ! empty($yang_ditemui))? "" : " style='background: #E07171;'"; // Jika datetime kosong, beri warna merah
              $no_telp_td = ( ! empty($no_telp))? "" : " style='background: #E07171;'"; // Jika datetime kosong, beri warna merah
              
              // Jika salah satu data ada yang kosong
              if(empty($tanggal_waktu) or empty($nama) or empty($kabupaten) or empty($instansi) or empty($alamat) or empty($keperluan) or empty($yang_ditemui) or empty($no_telp)){
                $kosong++; // Tambah 1 variabel $kosong
              }
              
              echo "<tr>";
              echo "<td".$tanggal_waktu_td.">".$tanggal_waktu."</td>";
              echo "<td".$nama_td.">".$nama."</td>";
              echo "<td".$kabupaten_td.">".$kabupaten."</td>";
              echo "<td".$instansi_td.">".$instansi."</td>";
              echo "<td".$alamat_td.">".$alamat."</td>";
              echo "<td".$keperluan_td.">".$keperluan."</td>";
              echo "<td".$yang_ditemui_td.">".$yang_ditemui."</td>";
              echo "<td".$no_telp_td.">".$no_telp."</td>";
              echo "</tr>";
            }
            
            $numrow++; // Tambah 1 setiap kali looping
          }
          
          echo "</table>";
          
          // Cek apakah variabel kosong lebih dari 0
          // Jika lebih dari 0, berarti ada data yang masih kosong
          if($kosong > 0){
          ?>  
            <script>
            $(document).ready(function(){
              // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
              $("#jumlah_kosong").html('<?php echo $kosong; ?>');
              
              $("#kosong").show(); // Munculkan alert validasi kosong
            });
            </script>
          <?php
          }else{ // Jika semua data sudah diisi
            echo "<hr>";
            
            // Buat sebuah tombol untuk mengimport data ke database
            echo "<button type='submit' name='import' class='btn btn-primary'><span class='glyphicon glyphicon-upload'></span> Import</button>";
          }
          
          echo "</form>";
        }else{ // Jika file yang diupload bukan File Excel 2007 (.xlsx)
          // Munculkan pesan validasi
          echo "<div class='alert alert-danger'>
          Hanya File Excel 2007 (.xlsx) yang diperbolehkan
          </div>";
        }
      }
      ?>
    </div>

  
