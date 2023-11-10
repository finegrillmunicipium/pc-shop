<?php
include('login-check.php');
session_start();
$id = $_GET['id'];
$sql = "DELETE FROM tbl_admin WHERE id = $id";
$conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error($conn));
$db_select = mysqli_select_db($conn, 'pc_shop') or (mysqli_error($conn));
$rezultat = mysqli_query($conn, $sql);
if ($rezultat == TRUE) {
    $_SESSION['admin_deleted'] = 'Uspješno ste obrisali admina!';
    header('location:http://localhost/pcshop/admin/manage-admin.php');
} else {
    $_SESSION['admin_deleted'] = 'Greška! Niste uspjeli obrisati admina.';
    header('location:http://localhost/pcshop/admin/add-admin.php');
}
?>