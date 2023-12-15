<?php

	/*-- folder tempat penyimpanan file backup database --*/
	$direktori = "./tmp/"; 
	$filename = $_GET['nama_file'];

	$file_extension = strtolower(substr(strrchr($filename,"."),1));

	switch($file_extension){
		case "sql": $ctype="application/sql"; break;
		default: $ctype="application/proses";
	}

	if ($file_extension=='php'){
		echo "<script>alert('Maaf, file tidak tersedia.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=dashboard'>";
		exit;
	}
	else{
		header("Content-Type: file");
		header("Pragma: private"); 
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private",false); 
		header("Content-Type: $ctype");
		header("Content-Disposition: attachment; filename=\"".basename($filename)."\";" );
		header("Content-Transfer-Encoding: binary");
		readfile("$direktori$filename");
		exit();   
	}
?>
