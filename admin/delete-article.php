<?php
include('login-check.php');
session_start();
$id = $_GET['id'];
$sql = "DELETE FROM tbl_ponuda WHERE id = $id";
$conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error($conn));
$db_select = mysqli_select_db($conn, 'pc_shop') or (mysqli_error($conn));
$rezultat = mysqli_query($conn, $sql);
if ($rezultat == TRUE) {
    $_SESSION['article-deleted'] = 'Uspješno ste obrisali proizvod!';
    header('location:http://localhost/pcshop/admin/manage-ponuda.php');
} else {
    $_SESSION['article-deleted'] = 'Greška! Niste uspjeli obrisati proizvod.';
    header('location:http://localhost/pcshop/admin/manage-ponuda.php');
}
?>