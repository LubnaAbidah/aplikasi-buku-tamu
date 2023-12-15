<?php
 include('../koneksi.php');

       $delete = mysqli_escape_string($kdb,$_GET['delete']);
if($delete=="ok"){
    $cek = mysqli_query($kdb,"DELETE FROM tamu" );
           echo "<script>alert('Semua data tamu berhasil dihapus.');window.location = 'index.php'</script>";

            }else{
           echo "<script>alert('Gagal menghapus data.');window.location = 'index.php?menu=13'</script>";
                
         }
        
        ?>