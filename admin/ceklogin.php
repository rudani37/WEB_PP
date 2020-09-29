<?php
include 'fungsi.php';
$username = $_POST['username'];
$password = $_POST['password'];
$sql = query("Select * from admin where username='$username' and password='$password'");
if (mysql_num_rows($sql) > 0) {
    
    session_start();
    $_SESSION['username']='$username';
    $_SESSION['password']='$password';
    $_SESSION['level']="Admin";
    
    echo "<script>alert('Selamat datang $username'); window.location='index.php'; </script>";
/*}else {
    echo "<script>alert('Username Salah'); window.location='login.php'; </script>";

} else {
    echo "<script>alert('Password Salah'); window.location='login.php'; </script>";

    */
} else {
    echo "<script>alert('Username dan Password Salah'); window.location='login.php'; </script>";

}
?>
