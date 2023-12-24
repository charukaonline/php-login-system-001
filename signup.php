<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login system by CNK</title>

    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="header.css">
</head>

<body>

    <?php include_once 'header.php'; ?>

    <div class="signup-form">
        <h1>Sign up</h1><br>
        <form action="/includes/signup.inc.php" method="POST">

            <input type="text" id="name" name="name" placeholder="Full Name">
            <input type="text" id="email" name="email" placeholder="Email Address">
            <input type="text" id="uname" name="uname" placeholder="Username">
            <input type="password" id="pass" name="pass" placeholder="Password">
            <input type="password" id="cpass" name="cpass" placeholder="Confirm Password">
            
            <button name="submit" type="submit">Register</button>

        </form><br>
        <p>Already have an account? <a href="/login.php">Login</a></p>
    </div>
    <?php include_once 'footer.php'; ?>
</body>

</html>