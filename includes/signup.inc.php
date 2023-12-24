<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $emptyInput = emptyInputSignup($name, $email, $uname, $pass, $cpass);
    $invalidUname = invalidUname($uname);
    $invalidEmail = invalidEmail($email);
    $passMatch = passMatch($pass, $cpass);
    $unameExists = unameExists($conn, $uname, $email);

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
    createUser($conn, $name, $email, $uname, $pass);

}
else {
    header("Location: ../signup.php?error=signupError");
    exit();
}