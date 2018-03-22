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
    <title>Rejestracja</title>
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
?>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
					<span class="login100-form-title p-b-26">
						Rejestracja
					</span>
                <span class="login100-form-title p-b-48">
						<img src="images/logo.jpg" alt="Logo szkoły" height="100" width="100">
					</span>


                <form action="register.php" method="POST">
                    <div class="wrap-input100 validate-input" data-validate = "Podaj imię">

                        <input class="input100" type="text" name="username"/>
                        <span class="focus-input100" data-placeholder="Imię"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Podaj nazwisko">

                        <input class="input100" type="text" name="surename"/>
                        <span class="focus-input100" data-placeholder="Nazwisko"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "E-mail: a@b.c">

                        <input class="input100" type="email" name="email"/>
                        <span class="focus-input100" data-placeholder="E-mail"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Podaj PESEL">

                        <input class="input100" type="text" pattern="[0-9]{11}" name="pesel"/>
                        <span class="focus-input100" data-placeholder="PESEL"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Wprowadź hasło">
							<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                        <input class="input100" type="password" name="password"/>
                        <span class="focus-input100" data-placeholder="Hasło"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Wybierz poziom uprawnień">
                        <select name="slevel" onchange="java_script_:show(this.options[this.selectedIndex].value)" style="width:100%; border: 0px">
                            <option value="0" selected disabled>Wybierz poziom uprawnień</option>
                            <option value="0">Student</option>
                            <option value="1">Nauczyciel</option>
                            <option value="3">Administrator</option>
                        </select>
                    </div>
                    <div class="wrap-input100 validate-input" style="display:none;" id="nauczyciel" data-validate = "Wybierz przedmiot">

                        <select  name="sname" style="width:100%; border: 0px">

                            <?php
                            $stmt = $pdo -> query ('SET NAMES utf8');
                            $stmt = $pdo->query('select  subject.id as "sid", subject.sname as "sname", subject.typeid, type.id, type.tname as "tname" from subject JOIN type on subject.typeid = type.id ');

                            foreach($stmt as $row){

                                echo '<option value="'.$row['sid'].'">'.$row['sname'].', '.$row['tname'].'</option>';

                            }
                            ?>
                        </select>
                    </div>
                    <div class="wrap-input100 validate-input" style="display:none;" id="student" data-validate = "Wybierz rok nauki">

                        <input class="input100" type="number" min="1" max="3" name="styear"/>
                        <span class="focus-input100" data-placeholder="Rok"></span>
                    </div>



                    <div class="wrap-input100 validate-input" style="display:none;" id="student2" data-validate="Wybierz kierunek">
                        <select  name="fname" style="width:100%; border: 0px">

                        <?php
                    $stmt = $pdo->query('SELECT id, fname FROM faculty');

                    foreach($stmt as $row){

                        echo '<option value="'.$row['id'].'">'.$row['fname'].'</option>';

                    }
                    ?>
                        </select>
                    </div>

<div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" class="login100-form-btn">
                                Zarejestruj
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

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $stmt1 = $pdo -> prepare('INSERT INTO `person` (`username`, `surename`, `email`, `pesel`, `password`, `slevel`)	
	
	VALUES(
	:username,
	:surename,
	:email,
	:pesel,
	:password,
	:slevel)');

    $acyear = "2017/2018";
    $ilosc=0;

        @$stmt1 -> bindValue(':username', $_POST['username'], PDO::PARAM_STR);
        @$stmt1 -> bindValue(':surename', $_POST['surename'], PDO::PARAM_STR);
        @$stmt1 -> bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        @$stmt1 -> bindValue(':pesel', $_POST['pesel'], PDO::PARAM_STR);
        @$stmt1 -> bindValue(':password', $_POST['password'], PDO::PARAM_STR);
        @$stmt1 -> bindValue(':slevel', $_POST['slevel'], PDO::PARAM_STR);
        //@$stmt1 -> bindValue(':', $acyear, PDO::PARAM_STR);

        $ilosc += $stmt1 -> execute();

        $stmt1 -> closeCursor();	// 3

        if($_POST['slevel']== "0")
        {


            $stmt2 = $pdo->query('SELECT id, email, password FROM person');
            foreach($stmt2 as $row){
                if($row['email']==$_POST['email'] and $row['password']==$_POST['password'])
                {
                    $idp=$row['id'];
                }
            }

           // SELECT * FROM person join student on person.id=student.personid
            $stmt3 = $pdo -> prepare('INSERT INTO `student` (`styear`, `acyear`, `personid`, `facultyid`)	
	
	VALUES(
	:styear,
	:acyear,
	:personid,
	:facultyid
	)');



            $acyear = "2017/2018";
            $ilosc=0;

            @$stmt3 -> bindValue(':styear', $_POST['styear'], PDO::PARAM_STR);
            @$stmt3 -> bindValue(':acyear', $acyear, PDO::PARAM_STR);
            @$stmt3 -> bindValue(':personid', $idp, PDO::PARAM_STR);
            @$stmt3 -> bindValue(':facultyid', $_POST['fname'], PDO::PARAM_STR);


            $ilosc += $stmt3 -> execute();

            $stmt3 -> closeCursor();	// 3

        }


    if($_POST['slevel']== "1")
    {
        $stmt2 = $pdo->query('SELECT id, email, password FROM person');
        foreach($stmt2 as $row){
            if($row['email']==$_POST['email'] and $row['password']==$_POST['password'])
            {
                $idp2=$row['id'];
            }
        }

//        $stmt5 = $pdo->query('SELECT id, sname, typeid FROM subject');
//        foreach($stmt5 as $row){
//            if($row['typeid']==$_POST['sname'] and $row['sname']==$_POST[''])
//            {
//                $idp2=$row['id'];
//            }
//        }

        $stmt4 = $pdo -> prepare('INSERT INTO `teacher` (`personid`, `subjectid`)	
	
	VALUES(
	:personid,
	:subjectid)');


        @$stmt4 -> bindValue(':personid', $idp2, PDO::PARAM_STR);
        @$stmt4 -> bindValue(':subjectid', $_POST['sname'], PDO::PARAM_STR);

        $ilosc += $stmt4 -> execute();

        $stmt4 -> closeCursor();	// 3

    }


    if($ilosc > 0)
    {
        echo "<script language='javascript'>alert('Pomyślnie dodano! ');</script>";
    }
    else
    {
        echo "<script language='javascript'>alert('Wystąpił błąd dodawania! ');</script>";
    }


}



?>

<script>
    function show(aval) {
        if (aval == "0") {
            student.style.display='inline-block';

            student2.style.display='inline-block';

            nauczyciel.style.display='none';

            Form.fileURL.focus();
        }
        else if (aval == "1") {
            nauczyciel.style.display='inline-block';

            student.style.display='none';

            student2.style.display='none';

            Form.fileURL.focus();
        }
        else
            student.style.display='none';
        student2.style.display='none';
        nauczyciel.style.display='none';
    }
</script>