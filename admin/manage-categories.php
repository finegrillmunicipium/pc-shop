<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC Arena | Izmjeni kategorije</title>
    <!-- Google Font Titillium Web -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <!-- Navigation Bar -->
    <nav>
        <div class="navbar">
            <span class="pcshop-title">PC Arena</span>
            <ul>
                <li><a href="index.php">Početna</a></li>
                <li><a href="manage-admin.php">Admin</a></li>
                <li><a href="manage-categories.php">Kategorije</a></li>
                <li><a href="manage-ponuda.php">Ponuda</a></li>
                <li><a href="manage-orders.php">Narudžbe</a></li>
                <li><a href="logout.php">Odjava</a></li>
            </ul>
        </div>
    </nav>

    <!-- Categories Table -->
    <div class="main-content">
        <h3>Lista kategorija</h3>
        <a href="add-category.php" class="btn-add">Dodaj kategoriju</a>
        <br>
        <?php
        session_start();
        include('login-check.php');
        if (isset($_SESSION['category-added'])) {
            echo $_SESSION['category-added'];
            unset($_SESSION['category-added']);
        }
        if (isset($_SESSION['image-uploaded'])) {
            echo $_SESSION['image-uploaded'];
            unset($_SESSION['image-uploaded']);
        }
        if (isset($_SESSION['category-deleted'])) {
            echo $_SESSION['category-deleted'];
            unset($_SESSION['category-deleted']);
        }
        if (isset($_SESSION['category-not-found'])) {
            echo $_SESSION['category-not-found'];
            unset($_SESSION['category-not-found']);
        }
        if (isset($_SESSION['category-updated'])) {
            echo $_SESSION['category-updated'];
            unset($_SESSION['category-updated']);
        }
        ?>
        <table>
            <tr>
                <td>Redni broj</td>
                <td>Naziv kategorije</td>
                <td>Fotografija</td>
                <td>Objavljena kategorija</td>
                <td>Aktivna kategorija</td>
                <td>Opcije</td>
            </tr>
            <tr></tr>
            <?php
            $sql = "SELECT * FROM tbl_kategorije";
            $conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error($conn));
            $db_select = mysqli_select_db($conn, 'pc_shop') or (mysqli_error($conn));
            $rezultat = mysqli_query($conn, $sql);
            if ($rezultat == TRUE) {
                $brojredova = mysqli_num_rows($rezultat);
                $rednibroj = 1;
                if ($brojredova > 0) {
                    while ($rows = mysqli_fetch_assoc($rezultat)) {
                        $id = $rows['id'];
                        $naziv_kategorije = $rows['naziv'];
                        $foto_naziv = $rows['foto_naziv'];
                        $objavljeno = $rows['objavljeno'];
                        $aktivno = $rows['aktivno'];
            ?>
                        <tr>
                            <td><?php echo $rednibroj++; ?></td>
                            <td><?php echo $naziv_kategorije; ?></td>
                            <td>
                                <img src="http://localhost/pcshop/images/<?php echo $foto_naziv; ?>" width="190px">
                            </td>
                            <td><?php echo $aktivno; ?></td>
                            <td><?php echo $objavljeno; ?></td>
                            <td>
                                <a href="http://localhost/pcshop/admin/update-category.php?id=<?php echo $id; ?>" class="btn-update">Izmijeni kategoriju</a>
                                <a href="http://localhost/pcshop/admin/delete-category.php?id=<?php echo $id; ?>&foto_naziv=<?php echo $foto_naziv; ?>" class="btn-delete">Obriši kategoriju</a>
                            </td>
                        </tr>
                        <tr>
                <?php
                    }
                } else {
                }
            }
                ?>
        </table>
    </div>

    <!-- Footer -->
    <footer>
        <ul class="icons">
            <li><a href="#"><ion-icon name="logo-whatsapp"></ion-icon></a></li>
            <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
            <li><a href="#"><ion-icon name="logo-instagram"></ion-icon></a></li>
        </ul>
        <ul class="menu">
            <li><a href="#">Početna</a></li>
            <li><a href="#">Kategorije</a></li>
            <li><a href="#">Ponuda</a></li>
            <li><a href="#">Kontakt</a></li>
        </ul>
        <div class="footer-copyright">
            <p>Copyright &copy; All Rights Reserved | Designed by Aleksandar Radić</p>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>