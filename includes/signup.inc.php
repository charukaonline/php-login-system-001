<?php

include_once 'dbh.inc.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $uni = mysqli_real_escape_string($conn, $_POST['uni']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    $cpass = mysqli_real_escape_string($conn, $_POST['cpass']);


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $emptyInput = emptyInputSignup($name, $uni, $email, $uname, $pass, $cpass);
    $invalidUname = invalidUname($uname);
    $invalidEmail = invalidEmail($email);
    $passMatch = passMatch($pass, $cpass);
    $unameExists = unameExists($conn, $uname, $uni, $email);

    if ($emptyInput !== false) {
        header("Location:../signup.php?error=emptyInput");
        exit();
    }
    if ($invalidUname !== false) {
        header("Location:../signup.php?error=invalidUname");
        exit();
    }
    if ($invalidEmail !== false) {
        header("Location:../signup.php?error=invalidEmail");
        exit();
    }
    if ($passMatch !== false) {
        header("Location:../signup.php?error=passwordsNotMatching");
        exit();
    }
    if ($unameExists !== false) {
        header("Location:../signup.php?error=unameTaken");
        exit();
    }
    createUser($conn, $name, $uni, $email, $uname, $pass);
} else {
    header("Location: ../signup.php?error=signupError");
    exit();
}
