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
$stmt1 = $pdo -> query ('SET NAMES utf8');
$stmt1 = $pdo->query('SELECT * FROM person WHERE person.id="'.$u.'" ');
foreach($stmt1 as $row) {
    $sl = $row['slevel'];
}

$w=0;
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

<!--<div class="limiter">-->
<!--<!--    <div class="container-login100">-->-->
<!--<!--        <div class="wrap-login100">-->-->
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
                    <?php
                    if($sl == "0") {

                        ?>
                        <a href="grades.php" class="wrap-login100-form-btn w3-bar-item w3-button" style="color: white">Indeks</a>

                        <?php
                    }else if($sl == "1") {

                        ?>
                        <a href="setgrades.php" class="wrap-login100-form-btn w3-bar-item w3-button" style="color: white">Wystaw oceny</a>

                        <?php
                    }else if($sl== "3") {
                        ?>
                        <a href="register.php" class="wrap-login100-form-btn w3-bar-item w3-button"
                           style="color: white">Zarejestruj</a>
                        <a href="delete.php" class="wrap-login100-form-btn w3-bar-item w3-button" style="color: white">Usuń</a>
                        <?php
                    }
                    ?>
                    <a href="options.php" class="wrap-login100-form-btn w3-bar-item w3-button" style="color: white">Zmień dane</a>
                    <a href="logout.php" class="wrap-login100-form-btn w3-bar-item w3-button" style="color: white">Wyloguj</a>
                </div>
            </div>
        </div>
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

<form action="options.php" method="POST">
<div class="w3-container w3-padding-32 w3-card" id="about">
    <center>
        <h1>Dokonaj zmiany danych</h1>
        <br><br>
        <table>
            <center>
            <?php
            if($row['slevel']=="3")
            {
                $l=0;
echo $u;
                ?>
                <div style="width: 350px;" class="wrap-input100 validate-input" data-validate="Wybierz użytkownika">
                    <select name="choose" onchange="java_script_:show(this.options[this.selectedIndex].value)" style="width:100%; border: 0px">
                        <?php
                      //  echo '<input type="hidden" name="edytuj_ktory" value="'.$u.'" />';
                        echo '<option value="'.$l.'" selected disabled>Wybierz użytkownika</option>';

                $stmt5 = $pdo -> query ('SET NAMES utf8');
$stmt5 = $pdo->query('SELECT * FROM person');
foreach($stmt5 as $row) {

    echo ' <option value="'.$row['id'].'">'.$row['username']." ".$row['surename'].'</option>';
}

$u=$_POST['choose'];

               // DO ZMIENNEJ $u ŚĆIĄGNĄĆ ID WYBRANEJ OSOBY !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 ?>
                    </select>
                </div>
                <br><br>

                <div style="width: 350px;" class="wrap-input100 validate-input" data-validate="Zmień poziom uprawnień">
                    <select name="slevel" onchange="java_script_:show(this.options[this.selectedIndex].value)" style="width:100%; border: 0px">
                        <option value="0" selected disabled>Zmień poziom uprawnień</option>
                        <option value="0">Student</option>
                        <option value="1">Nauczyciel</option>
                        <option value="3">Administrator</option>
                    </select>
                </div>
            </center>
 <?php
        }


 $stmt6 = $pdo -> query ('SET NAMES utf8');
$stmt6 = $pdo->query('SELECT * FROM person WHERE person.id="'.$u.'"');
foreach($stmt6 as $row2) {

}
                ?>


            <tr>
                <td><?php echo $u;?></td>
                <td> </td>
                <td><?php echo $row2['username'];?></td>
                <td> </td>
                <td> <div class="wrap-input100 validate-input" data-validate = "Zmień imię">

                            <input class="input100" type="text" name="imie" value="<?php echo $row2['username'];?>"/>
                            <span class="focus-input100" data-placeholder=""></span>
                        </div></td>
            </tr>
            <tr>
                <td>Nazwisko:</td>
                <td> </td>
                <td><?php echo $row2['surename'];?></td>
                <td> </td>
                <td><div class="wrap-input100 validate-input" data-validate = "Zmień nazwisko">

                        <input class="input100" type="text" name="nazwisko" value="<?php echo $row2['surename'];?>"/>
                        <span class="focus-input100" data-placeholder=""></span>
                    </div></td>
            </tr>
            <tr>
                <td>E-mail:</td>
                <td> </td>
                <td><?php echo $row2['email'];?></td>
                <td> </td>
                <td><div class="wrap-input100 validate-input" data-validate = "E-mail: a@b.c">

                        <input class="input100" type="email" name="email" value="<?php echo $row2['email'];?>"/>
                        <span class="focus-input100" data-placeholder=""></span>
                    </div></td>
            </tr>
            <tr>
                <td>Hasło:</td>
                <td> </td>
                <td>******</td>
                <td></td>
                <td><div class="wrap-input100 validate-input" data-validate="Wprowadź hasło">
							<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                        <input class="input100" type="password" name="haslo" value="12345"/>
                        <span class="focus-input100" data-placeholder=""></span>
                    </div></td>
            </tr>

        </table>

        <div class="w3-middle w3-hide-small" style="
    width: 150px;
">
            <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                    <div style="text-align:center" class="login100-form-bgbtn"></div>
                    <input class="wrap-login100-form-btn w3-bar-item w3-button" style="color: white" type="submit" value="Zatwierdź"/>
                    <?php
                    echo '<input type="hidden" name="edytuj_ktory" value="'.$u.'" />';
                    ?>
<!--                    <a href="options.php" class="wrap-login100-form-btn w3-bar-item w3-button" style="color: white">Zapisz zmiany</a>-->
                </div>
            </div>
        </div>

    </center>
    </form>

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

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    try {
        $haslo_m = ($_POST['haslo']);
        $imie_m= $_POST['imie'];
        $nazwisko_m = $_POST['nazwisko'];
        $email_m = $_POST['email'];
//    $upraw_m = $_POST['uprawnienie'];

        $ktory = $_POST['edytuj_ktory'];

        echo $haslo_m; echo "<br>";
        echo $imie_m; echo "<br>";
        echo $nazwisko_m; echo "<br>";
        echo $email_m; echo "<br>";
        echo $ktory; echo "<br>";

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

