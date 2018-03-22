<?php
/**
 * Created by PhpStorm.
 * User: Akira
 * Date: 2018-01-26
 * Time: 11:43
 */

include_once('connect.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Logowanie</title>
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
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">

					<span class="login100-form-title p-b-26">
						Dziekanat
					</span>
                <span class="login100-form-title p-b-48">
						<img src="images/logo.jpg" alt="Logo szkoły" height="100" width="100">
					</span>


                <form action="login.php" method="POST">
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">

                        <input class="input100" type="email" name="login"/>
                        <span class="focus-input100" data-placeholder="E-mail"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Enter password">
							<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                        <input class="input100" type="password" name="password"/>
                        <span class="focus-input100" data-placeholder="Hasło"></span>
                    </div>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" class="login100-form-btn">
                                Zaloguj
                            </button>
                        </div>
                    </div>
                </form>

        </div>
    </div>
</div>



<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>


<?php

@$login = $_POST['login'];
@$password = $_POST['password'];
$stmt = $pdo -> query ('SET NAMES utf8');
$stmt = $pdo->query('SELECT id, email, password, slevel FROM person');



foreach($stmt as $row)
{

if($login == $row['email'] and $password == $row['password']){
$_SESSION['zalogowany'] = true;
$_SESSION['id_uzytkownik'] = $row['id'];
$_SESSION['poziom_uprawnienia'] = $row['slevel'];
$_SESSION['uzytkownik'] = $login;
}

}
if (@$_SESSION['zalogowany'] == false and @$_POST['login']!=null){ echo "<script language='javascript'>alert('Niewłaściwy login lub hasło! ');</script>";}
$stmt->closeCursor();
if(@$_SESSION['zalogowany'] == true)
{
    ?>
<script>

    setTimeout(function () {
        window.location.href = 'index.php'; // the redirect goes here

    }, 1);

</script>

<?php


}
?>
