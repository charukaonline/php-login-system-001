<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login system by CNK</title>

    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="header.css">
</head>

<body>

    <?php include_once 'header.php'; ?>

    <div class="hero">
        <h1>Welcome,
            <?php
            if (isset($_SESSION["username"])) {
                echo $_SESSION["username"];
            } else {
                echo "Guest";
            }
            ?>
        </h1>
        <p>
            <?php
            if (isset($_SESSION["useruni"], $_SESSION["useryear"])) {
                echo $_SESSION["useryear"]. " student at " .$_SESSION["useruni"];
            } else {
                echo "Please login to show your details";
            }
            ?>
        </p>
    </div>

    <?php include_once 'footer.php'; ?>
</body>

</html>