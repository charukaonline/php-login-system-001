<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login system by CNK</title>

    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="header.css">
</head>

<script language="javascript" type="text/javascript">
    function login_validation() {
        if (document.login.uname.value == "" || document.login.pass.value == "") {
            alert("Please recheck your details!");
        }
    }
</script>

<body>

    <?php include_once 'header.php'; ?>

    <div class="login-form">
        <h1>Login</h1><br>
        <form name="login" action="/includes/login.inc.php" method="POST">

            <input type="text" id="uname" name="uname" placeholder="Email or Username">
            <input type="password" id="pass" name="pass" placeholder="Password">
            <button name="submit" type="submit" onclick="login_validation()">Login</button>

        </form><br>
        <p>Don't have an account? <a href="/signup.php">Sign up</a></p>
    </div>
    <?php include_once 'footer.php'; ?>
</body>

</html>