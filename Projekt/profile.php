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


//$stmt1 = $pdo->query('SELECT * FROM person join student on person.id=student.personid WHERE person.id="'.$u.'" ');
//foreach($stmt1 as $row){
//    echo $row['username'];echo "<br>";
//    echo $row['surename'];echo "<br>";
//    echo $row['personid'];echo "<br>";
//    echo $row['email'];echo "<br>";
//    echo $row['pesel'];echo "<br>";
//    echo $row['acyear'];echo "<br>";
//    echo $row['styear'];
//}
//$stmt1 = $pdo->query('SELECT * FROM person WHERE id="'.$u.'"');
//foreach($stmt1 as $row){
//    echo $row['username'];
//    echo $row['surename'];
//    echo $row['id'];
//    echo $row['email'];
//    echo $row['pesel'];
//}
//
//if($row['slevel']== "0")
//{
//    $stmt2 = $pdo->query('SELECT * FROM person join student on person.id=student.personid');
//    foreach($stmt2 as $row){
//        echo "<br>";
//        echo $row['acyear'];
//        echo $row['styear'];
//
//    }
//}

//$stmt = $pdo->query('SELECT * FROM person join student on person.id=student.personid WHERE person.slevel=0');
//
//foreach($stmt as $row){
//    if($row[person.id]==)
//}
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
                        <a href="register.php" class="wrap-login100-form-btn w3-bar-item w3-button" style="color: white">Zarejestruj</a>
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
<center>
    <h1>Informacje o użytkowniku</h1>
    <br><br>
    <table>
        <tr>
            <td>Imię:</td>
            <td> </td>
            <td><?php echo $row['username'];?></td>
            <td> </td>
        </tr>
        <tr>
            <td>Nazwisko:</td>
            <td> </td>
            <td><?php echo $row['surename'];?></td>
            <td> </td>
        </tr>
        <tr>
            <td>Numer:</td>
            <td> </td>
            <td><?php echo $row['id'];?></td>
            <td> </td>
        </tr>
        <tr>
            <td>PESEL:</td>
            <td> </td>
            <td><?php echo $row['pesel'];?></td>
            <td> </td>
        </tr>
        <tr>
            <td>E-mail::</td>
            <td> </td>
            <td><?php echo $row['email'];?></td>
            <td> </td>
        </tr>

        <?php
        if($sl == "0") {
            $stmt3 = $pdo->query('SET NAMES utf8');
            $stmt3 = $pdo->query('SELECT * FROM student WHERE personid="' . $u . '" ');
            foreach ($stmt3 as $row) {

            }


            ?>
            <tr>
                <td>Rok akademicki:</td>
                <td></td>
                <td><?php echo $row['acyear']; ?></td>
                <td></td>
            </tr>
            <tr>
                <td>Rok studiów:</td>
                <td></td>
                <td><?php echo $row['styear']; ?></td>
                <td></td>
            </tr>
            <?php
        }else if($sl == "1")
        {
            $stmt4 = $pdo->query('SET NAMES utf8');
            $stmt4 = $pdo->query('SELECT * FROM teacher WHERE personid="' . $u . '" ');
            foreach ($stmt4 as $row) {
                $sid = $row['subjectid'];
            }

        $stmt5 = $pdo -> query ('SET NAMES utf8');
        $stmt5 = $pdo->query('select  subject.id as "sid", subject.sname as "sname", subject.typeid, type.id, type.tname as "tname" from subject JOIN type on subject.typeid = type.id WHERE subject.id="' . $sid . '" ');

        foreach($stmt5 as $row) {
        }
            ?>
            <tr>
                <td>Przedmiot:</td>
                <td></td>
                <td><?php echo $row['sname'].', '.$row['tname']; ?></td>
                <td></td>
            </tr>
        <?php
        }
        ?>
    </table>

</center>
</div>
</body>
</html>


