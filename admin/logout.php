<?php
    session_start();
    session_destroy();
    header('location:'.'http://localhost/pcshop/admin/login.php');
?>