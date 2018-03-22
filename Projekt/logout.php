<?php
include_once('connect.php');
session_start();
$_SESSION['zalogowany'] = false;
?>
<script>

    setTimeout(function () {
        window.location.href = 'homepage.php'; // the redirect goes here

    }, 1);

</script>
