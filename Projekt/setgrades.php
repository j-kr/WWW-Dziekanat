<?php
include_once('connect.php');
session_start();

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
$stmt = $pdo->query('SELECT id, username, surename, slevel FROM person WHERE id="'.$u.'"');
foreach($stmt as $row){

    $sec = $row['slevel'];
}

?>

<!DOCTYPE html>
<html>
<title>Dziekanat</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<link rel="stylesheet" href="css/w3.css">
<link href="details.css" type="text/css" rel="stylesheet" />
<body>


<div class="w3-top">
    <div class="w3-bar w3-white w3-wide w3-padding w3-card">
        <a href="#home" class="w3-bar-item"><b><?php echo $row['username']." ". $row['surename']; ?></b> <?php echo "nr.id: ".$row['id']; ?></a>
        <!-- Float links to the right. Hide them on small screens -->
        <div class="w3-right w3-hide-small">
            <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                    <div class="login100-form-bgbtn"></div>
                    <a href="index.php" class="wrap-login100-form-btn w3-bar-item w3-button" style="color: white">Strona główna</a>
                    <a href="profile.php" class="wrap-login100-form-btn w3-bar-item w3-button" style="color: white">Profil</a>
                    <a href="setgrades.php" class="wrap-login100-form-btn w3-bar-item w3-button" style="color: white">Wystaw oceny</a>
                    <a href="options.php" class="wrap-login100-form-btn w3-bar-item w3-button" style="color: white">Zmień dane</a>
                    <a href="logout.php" class="wrap-login100-form-btn w3-bar-item w3-button" style="color: white">Wyloguj</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
    <br>
    <img class="w3-image" src="images/logo2.jpg" alt="Architecture" width="1500" height="800">
    <div class="w3-display-middle w3-margin-top w3-center">
    </div>
</header>

<!-- Page content -->
<br>
<div class="w3-container w3-padding-32 w3-card" id="about">

    <?php

    if($sec=="1"){

    ?>

    <center>
        <h1>Wystaw oceny</h1>
        <br><br>

    </center>
</div>

<?php
}else{
    echo "<p>Nie jesteś nauczycielem!</p>";
}
?>


</body>
</html>

