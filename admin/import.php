<?php

// Load file koneksi.php
include "../koneksi.php";

if(isset($_POST['import'])){ // Jika user mengklik tombol Import
	$nama_file_baru = 'data.xlsx';

	// Load librari PHPExcel nya
	require_once 'PHPExcel/PHPExcel.php';

	$excelreader = new PHPExcel_Reader_Excel2007();
	$loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file excel yang tadi diupload ke folder tmp
	$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

	$numrow = 1;
	foreach($sheet as $row){
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
			// Buat query Insert
			$query = "INSERT INTO tamu VALUES('','".$tanggal_waktu."','".$nama."','".$kabupaten."','".$instansi."','".$alamat."','".$keperluan."','".$yang_ditemui."','".$no_telp."')";

			// Eksekusi $query
			mysqli_query($kdb, $query);
		}

		$numrow++; // Tambah 1 setiap kali looping
	}
}

header("location:index.php?berhasil=$numrow");
?>
