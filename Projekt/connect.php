<?php

$db_conf = array( 'host' => 'localhost',
    'port' => '3306',
    'user' => 'root',
    'pass' => '',
    'db' => 'dbo',
    'db_type' => 'mysql',
    'encoding' => 'utf-8');

try

{

    $dane = $db_conf['db_type'] .
        ':host=' . $db_conf['host'] .
        ';port=' . $db_conf['port'] .
        ';encoding=' . $db_conf['encoding'] .
        ';dbname=' . $db_conf['db'];


    // opcje, tutaj ustawienie trybu reagowania na błędy
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    // tworzymy obiekt klasy PDO inicjując tym samym połączenie
    $pdo = new PDO($dane, $db_conf['user'],  $db_conf['pass'], $options);

    // w przypadku błędu, poniższe się już nie wykona:
    define('DB_CONNECTED', true);

    //echo '<h1>Connection success!</h1>';
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////echo '<img src="img/connection.gif" alt="Połączono z bazą." width="25" align="right">';

    // łapiemy ewentualny wyjątek:
} catch(PDOException $e)

{
/////////////////////////////////////////////////////////////////////////////////////////////////////////	echo '<img src="img/error.gif" alt="Błąd" width="25" align="right">';
    //komunikaty błędu
    die('Unable to connect: ' . $e->getMessage());
}

?>