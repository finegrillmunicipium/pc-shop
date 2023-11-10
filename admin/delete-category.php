<?php
include('login-check.php');
session_start();
$id = $_GET['id'];
$foto_naziv = $_GET['foto_naziv'];
$lokacija = '../images/'.$foto_naziv;
$ukloni = unlink($lokacija);
$sql = "DELETE FROM tbl_kategorije WHERE id = $id";
$conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error($conn));
$db_select = mysqli_select_db($conn, 'pc_shop') or (mysqli_error($conn));
$rezultat = mysqli_query($conn, $sql);
if ($rezultat == TRUE) {
    $_SESSION['category-deleted'] = 'Uspješno ste obrisali kategoriju!';
    header('location:http://localhost/pcshop/admin/manage-categories.php');
} else {
    $_SESSION['category-deleted'] = 'Greška! Niste uspjeli obrisati kategoriju.';
    header('location:http://localhost/pcshop/admin/manage-categories.php');
}
?>