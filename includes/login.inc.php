<?php

include_once 'dbh.inc.php';

if (isset($_POST['submit'])) {
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

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