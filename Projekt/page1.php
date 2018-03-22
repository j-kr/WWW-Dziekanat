<?php
include_once('connect.php');
session_start();
//?>

<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<title>Dziekanat</title>-->
<!--<meta charset="UTF-8">-->
<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--<!--===============================================================================================-->-->
<!--<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>-->
<!--<!--===============================================================================================-->-->
<!--<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">-->
<!--<!--===============================================================================================-->-->
<!--<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">-->
<!--<!--===============================================================================================-->-->
<!--<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">-->
<!--<!--===============================================================================================-->-->
<!--<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">-->
<!--<!--===============================================================================================-->-->
<!--<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">-->
<!--<!--===============================================================================================-->-->
<!--<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">-->
<!--<!--===============================================================================================-->-->
<!--<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">-->
<!--<!--===============================================================================================-->-->
<!--<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">-->
<!--<!--===============================================================================================-->-->
<!--<link rel="stylesheet" type="text/css" href="css/util.css">-->
<!--<link rel="stylesheet" type="text/css" href="css/main.css">-->
<!--<!--===============================================================================================-->-->
<!--<link rel="stylesheet" href="css/w3.css">-->
<!--<body>-->

<!-- Navbar (sit on top)-->
<!--<div class="w3-top">-->
<!--    <div class="w3-bar w3-white w3-wide w3-padding w3-card">-->
<!--        <a href="#home" class="w3-bar-item"><b>Imię, Nazwisko</b> nr. indeksu</a>-->
<!--        <!-- Float links to the right. Hide them on small screens -->-->
<!--        <div class="w3-right w3-hide-small">-->
<!--            <div class="container-login100-form-btn">-->
<!--                <div class="wrap-login100-form-btn">-->
<!--                    <div class="login100-form-bgbtn"></div>-->
<!--            <a href="#projects" class="wrap-login100-form-btn w3-bar-item w3-button" style="color: white">Indeks</a>-->
<!--            <a href="#about" class="wrap-login100-form-btn w3-bar-item w3-button" style="color: white">Profil</a>-->
<!--            <a href="#about" class="wrap-login100-form-btn w3-bar-item w3-button" style="color: white">Opcje</a>-->
<!--            <a href="logout.php" class="wrap-login100-form-btn w3-bar-item w3-button" style="color: white">Wyloguj</a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<!--<!-- Header -->-->
<!--<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">-->
<!--    <br>-->
<!--    <img class="w3-image" src="images/logo2.jpg" alt="Architecture" width="1500" height="800">-->
<!--    <div class="w3-display-middle w3-margin-top w3-center">-->
<!--    </div>-->
<!--</header>-->

<!--<!-- Page content -->-->

<!--<br>-->

<!--</body>-->
<!--</html>-->



<?php


if(@$_SESSION['zalogowany'] == false) {

    ?>

    <script>

        setTimeout(function () {
            window.location.href = 'login.php'; // the redirect goes here

        }, 1);

    </script>

    <?php
}

$u=$_SESSION['id_uzytkownik'];
$stmt = $pdo -> query ('SET NAMES utf8');
$stmt = $pdo->query('SELECT * from person WHERE person.id="'.$u.'"');

foreach($stmt as $row){
echo '<form method="post" action="page1.php">';
    echo 'Hasło: <input type="password" name="haslo" value="12345" /><br><br><br>';
    echo 'Imie: <input type="text" name="imie" value="'.$row['username'].'" /><br><br>';
    echo 'Nazwisko: <input type="text" name="nazwisko" value="'.$row['surename'].'" /><br><br>';
    echo 'E-mail: <input type="text" name="email" value="'.$row['email'].'" /><br><br>';
//    echo 'Uprawnienie: <select name="uprawnienie">';
//        echo '<option value="Klient" selected>Klient</option>';
//        echo '<option value="Administrator">Administrator</option>';
//        echo '</select><br><br>';
    }

    echo '<input type="submit" value="Zatwierdź"/>';
  echo '<input type="hidden" name="edytuj_ktory" value="'.$u.'" />';

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
    try {
    $haslo_m = md5($_POST['haslo']);
    $imie_m= $_POST['imie'];
    $nazwisko_m = $_POST['nazwisko'];
    $email_m = $_POST['email'];
//    $upraw_m = $_POST['uprawnienie'];

    $ktory = $_POST['edytuj_ktory'];

    $stmt1 = $pdo -> prepare("UPDATE person SET username='".$imie_m."', surename='".$nazwisko_m."', email='".$email_m."', password='".$haslo_m."' where id=".$ktory." ");

    $stmt1 -> execute();

    //echo $stmt1->rowCount().' rekordów zedytowanych pomyślnie!';
    echo "<script language='javascript'>alert('Zedytowano pomyślnie! ');</script>";
    //echo '<a href="index.php">Wróć</a>';
    }
    catch(PDOException $e)
    {
    echo "<br>" . $e->getMessage();
    }
    }
    ?>