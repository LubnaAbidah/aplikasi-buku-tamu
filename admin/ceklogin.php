
<?php
session_start();
include "../koneksi.php";

$username= mysqli_escape_string($kdb, $_POST['username']); //anti Mysql injection
$password= mysqli_escape_string($kdb, md5($_POST['password']));

$op = mysqli_escape_string($kdb,$_GET['op']);
if($op=="in"){
    $cek = mysqli_query($kdb,"SELECT * FROM staf WHERE username='$username' and password='$password'" );
    if(mysqli_num_rows($cek)==1){
        $c = mysqli_fetch_array($cek);
        $_SESSION['username'] = $c['username'];
         echo "<script>alert('Login berhasil  ". $_SESSION['username'] .", Anda dapat mengedit data buku tamu');window.location = 'index.php'</script>"; 
           
    }else{
     echo "<script>alert('Maaf! Login gagal. Anda tidak berhak mengakses halaman ini.');window.location = 'login.php'</script>";
    }
}else if($op=="out"){
    unset($_SESSION['username']);
    session_destroy();
    header("location:login.php");
}
?>