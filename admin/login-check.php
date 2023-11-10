<?php
if (!isset($_SESSION['user'])) {
    $_SESSION['not-logged-in'] = 'Ulogujte se kako biste imali pristup admin panelu!';
    header('location:http://localhost/pcshop/admin/login.php');
}
?>