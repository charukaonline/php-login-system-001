<?php

if (isset($_POST['submit'])) {
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($uname, $pass) !==false) {
        exit();
    }

    loginUser($conn, $uname, $pass);
}
else {
    header("Location: ../login.php");
    exit();
}