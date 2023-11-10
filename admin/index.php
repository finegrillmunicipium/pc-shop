<?php
session_start();
include('login-check.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC Arena | Početna</title>
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

    <!-- Admin Panel -->
    <div class="panel">
        <h2>Admin Panel</h2>
        <div class="subpanel">
            <h3>Kategorije</h3>
            <div>
                <?php
                $sql1 = "SELECT * FROM tbl_kategorije";
                $conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error($conn));
                $db_select = mysqli_select_db($conn, 'pc_shop') or die(mysqli_error($conn));
                $rezultat1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
                $brojredova1 = mysqli_num_rows($rezultat1);
                echo $brojredova1;
                ?>
            </div>
        </div>
        <div class="subpanel">
            <h3>Ponuda</h3>
            <div>
                <?php
                $sql2 = "SELECT * FROM tbl_ponuda";
                $conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error($conn));
                $db_select = mysqli_select_db($conn, 'pc_shop') or die(mysqli_error($conn));
                $rezultat2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
                $brojredova2 = mysqli_num_rows($rezultat2);
                echo $brojredova2;
                ?>
            </div>
        </div>
        <div class="subpanel">
            <h3>Narudžbe</h3>
            <div>
                <?php
                $sql3 = "SELECT * FROM tbl_narudzba";
                $conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error($conn));
                $db_select = mysqli_select_db($conn, 'pc_shop') or die(mysqli_error($conn));
                $rezultat3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
                $brojredova3 = mysqli_num_rows($rezultat3);
                echo $brojredova3;
                ?>
            </div>
        </div>
        <div class="subpanel">
            <h3>Profit</h3>
            <div>
                <?php
                $sql4 = "SELECT SUM(ukupno) AS Ukupno FROM tbl_narudzba WHERE status = 'Dostavljeno'";
                $conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error($conn));
                $db_select = mysqli_select_db($conn, 'pc_shop') or die(mysqli_error($conn));
                $rezultat4 = mysqli_query($conn, $sql4) or die(mysqli_error($conn));
                $row = mysqli_fetch_assoc($rezultat4);
                $zarada = $row['Ukupno'];
                ?>
                <p>
                    <?php echo $zarada; ?> KM
                </p>
            </div>
        </div>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>