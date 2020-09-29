<?php
session_start();
session_destroy();

echo "<script> alert ('Anda Log  Out'); window.location='index.php'; </script>";
?>