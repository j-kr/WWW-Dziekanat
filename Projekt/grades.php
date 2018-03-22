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
                    <a href="grades.php" class="wrap-login100-form-btn w3-bar-item w3-button" style="color: white">Indeks</a>
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

    if($sec=="0"){

    ?>

    <center>
        <h1>Oceny</h1>
        <br><br>
        <table>
            <tr>
                <th>Ocena</th>
                <th>Rodzaj</th>
                <th>Przedmiot</th>
                <th>Typ</th>
                <th>Nauczyciel</th>
            </tr>
            <?php
            $stmt1 = $pdo->query('SET NAMES utf8');
            $stmt1 = $pdo->query('SELECT grade.id, grade.gradeval, teacher.personid as idt2, gtype.gtname, subject.sname, type.tname, person.id as ids2, person.username as pn2, person.surename as ps2 FROM grade JOIN gtype ON grade.gtypeid=gtype.id JOIN student ON grade.studentid=student.id JOIN teacher ON grade.teacherid=teacher.id JOIN subject ON grade.subjectid=subject.id JOIN faculty ON student.facultyid=faculty.id JOIN type ON subject.typeid=type.id JOIN person ON teacher.personid=person.id OR student.personid=person.id WHERE person.id="' . $u . '"');
            foreach ($stmt1 as $row) {

//    echo $row['gtname'];
//    echo "<br>";
//    echo $row['sname'];
//    echo "<br>";
//    echo $row['tname'];
//    echo "<br>";
//    echo $row['idt2'];
//    echo "<br>";
                $idt = $row['idt2'];
                $ids = $row['ids2'];
                $pn = $row['pn2'];
                $ps = $row['ps2'];
//    echo $row['gradeval'];
//    echo "<br>";

//    echo "<tr>
//           <td>".$row['gradeval']."</td>
//           <td>".$row['gtname']."</td>
//           <td>".$row['sname']."</td>
//           <td>".$row['tname']."</td>
//           <td>".$row['username']." ".$row['surename']."</td>
//       </tr>";
                ?>
                <tr>
                <td><?php echo $row['gradeval']; ?></td>
                <td><?php echo $row['gtname']; ?></td>
                <td><?php echo $row['sname']; ?></td>
                <td><?php echo $row['tname']; ?></td>

                <?php
                $stmt2 = $pdo->query('SET NAMES utf8');
                $stmt2 = $pdo->query('SELECT person.username, person.surename FROM person WHERE person.id="' . $idt . '"');
                foreach ($stmt2 as $row) {
//        echo $row['username'];
//        echo "<br>";
//        echo $row['surename'];
//        echo "<br>";
                    ?>
                    <td><?php echo $row['username'] . " " . $row['surename']; ?></td>
                    <?php
                    ?> </tr>
                    <?php
                }
            }
            ?>


            <!--        <table>-->
            <!--            <tr>-->
            <!--                <th></th>-->

            <!--            </tr>-->
            <!--            <tr>-->
            <!--                <td>Imię:</td>-->
            <!--                <td> </td>-->
            <!--                <td>--><?php //echo $row['username'];
            ?><!--</td>-->
            <!--                <td> </td>-->
            <!--            </tr>-->
            <!--            <tr>-->
            <!--                <td>Nazwisko:</td>-->
            <!--                <td> </td>-->
            <!--                <td>--><?php //echo $row['surename'];
            ?><!--</td>-->
            <!--                <td> </td>-->
            <!--            </tr>-->
            <!--            <tr>-->
            <!--                <td>Numer:</td>-->
            <!--                <td> </td>-->
            <!--                <td>--><?php //echo $row['id'];
            ?><!--</td>-->
            <!--                <td> </td>-->
            <!--            </tr>-->
            <!--            <tr>-->
            <!--                <td>PESEL:</td>-->
            <!--                <td> </td>-->
            <!--                <td>--><?php //echo $row['pesel'];
            ?><!--</td>-->
            <!--                <td> </td>-->
            <!--            </tr>-->
            <!--            <tr>-->
            <!--                <td>E-mail::</td>-->
            <!--                <td> </td>-->
            <!--                <td>--><?php //echo $row['email'];
            ?><!--</td>-->
            <!--                <td> </td>-->
            <!--            </tr>-->
            <!---->
            <!--            --><?php
            //            if($sl == "0") {
            //                $stmt3 = $pdo->query('SET NAMES utf8');
            //                $stmt3 = $pdo->query('SELECT * FROM student WHERE personid="' . $u . '" ');
            //                foreach ($stmt3 as $row) {
            //
            //                }
            //
            //
            //
            ?>
            <!--                <tr>-->
            <!--                    <td>Rok akademicki:</td>-->
            <!--                    <td></td>-->
            <!--                    <td>--><?php //echo $row['acyear'];
            ?><!--</td>-->
            <!--                    <td></td>-->
            <!--                </tr>-->
            <!--                <tr>-->
            <!--                    <td>Rok studiów:</td>-->
            <!--                    <td></td>-->
            <!--                    <td>--><?php //echo $row['styear'];
            ?><!--</td>-->
            <!--                    <td></td>-->
            <!--                </tr>-->
            <!--                --><?php
            //            }else if($sl == "1")
            //            {
            //                $stmt4 = $pdo->query('SET NAMES utf8');
            //                $stmt4 = $pdo->query('SELECT * FROM teacher WHERE personid="' . $u . '" ');
            //                foreach ($stmt4 as $row) {
            //                    $sid = $row['subjectid'];
            //                }
            //
            //                $stmt5 = $pdo -> query ('SET NAMES utf8');
            //                $stmt5 = $pdo->query('select  subject.id as "sid", subject.sname as "sname", subject.typeid, type.id, type.tname as "tname" from subject JOIN type on subject.typeid = type.id WHERE subject.id="' . $sid . '" ');
            //
            //                foreach($stmt5 as $row) {
            //                }
            //
            ?>
            <!--                <tr>-->
            <!--                    <td>Przedmiot:</td>-->
            <!--                    <td></td>-->
            <!--                    <td>--><?php //echo $row['sname'].', '.$row['tname'];
            ?><!--</td>-->
            <!--                    <td></td>-->
            <!--                </tr>-->
            <!--                --><?php
            //            }
            //
            ?>


        </table>
    </center>
</div>

<?php
}else{
        echo "<p>Nie jesteś uczniem!</p>";
}
?>


</body>
</html>

