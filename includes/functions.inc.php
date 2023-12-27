<?php

include_once 'dbh.inc.php';

//signup page functions

function emptyInputSignup($name,$uni, $email, $uname, $pass, $cpass)
{

    if (empty($name) || empty($uni) || empty($email) || empty($uname) || empty($pass) || empty($cpass)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUname($uname)
{

    if (!preg_match("/^[a-zA-Z0-9]*$/", $uname)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function passMatch($pass, $cpass)
{

    if ($pass !== $cpass) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function unameExists($conn, $uname, $email)
{

    $sql = "SELECT * FROM users WHERE uname = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $uname, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $uni, $email, $uname, $pass)
{

    $sql = "INSERT INTO users (name, uni, email, uname, pass) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../signup.php?error=stmtfailed");
        exit();
    }
    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $name, $uni, $email, $uname, $hashedPass);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../login.php");
    exit();
}

//login page functions

function emptyInputLogin($uname, $pass)
{

    if (empty($uname) || empty($pass)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $uname, $pass)
{

    $unameExists = unameExists($conn, $uname, $uname);

    if ($unameExists == false) {
        header("Location:../login.php?error=wronglogin");
        exit();
    }

    $passHashed = $unameExists["pass"];
    $checkPass = password_verify($pass, $passHashed);

    if ($checkPass == false) {
        header("Location:../login.php?error=wronglogin");
        exit();
    } else if ($checkPass == true) {
        session_start();
        $_SESSION["userid"] = $unameExists["id"];
        $_SESSION["useruname"] = $unameExists["uname"];
        $_SESSION["username"] = $unameExists["name"];
        $_SESSION["useruni"] = $unameExists["uni"];
        header("Location:../index.php");
        exit();
    }
}