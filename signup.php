<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login system by CNK</title>

    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="header.css">
</head>

<script language="javascript" type="text/javascript">
    function signup_validation() {
        if (document.signup.name.value == "" || document.signup.uni.value == "" || document.signup.email.value == "" ||
            document.signup.uname.value == "" || document.signup.pass.value == "" || document.signup.cpass.value == "") {
            alert("Please recheck your details!");
        }
    }
</script>

<body>

    <?php include_once 'header.php'; ?>

    <div class="signup-form">
        <h1>Sign up</h1><br>
        <form id="signup" name="signup" action="/includes/signup.inc.php" method="POST">

            <input type="text" id="name" name="name" placeholder="Full Name">
            <input type="text" id="uni" name="uni" placeholder="University">
            <select id="year" name="year">
                <option value="1st year">1st Year</option>
                <option value="2nd year">2nd Year</option>
                <option value="3rd year">3rd Year</option>
                <option value="4th year">4th Year</option>
            </select>
            <input type="text" id="email" name="email" placeholder="Email Address">
            <input type="text" id="uname" name="uname" placeholder="Username">
            <input type="password" id="pass" name="pass" placeholder="Password">
            <input type="password" id="cpass" name="cpass" placeholder="Confirm Password">

            <button name="submit" type="submit" onclick="signup_validation()">Register</button>

        </form><br>
        <p>Already have an account? <a href="/login.php">Login</a></p>
    </div>
    <?php include_once 'footer.php'; ?>
</body>

</html>