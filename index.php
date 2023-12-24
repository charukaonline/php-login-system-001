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
        <h1>Hello welcome,
            <?php
            if (isset($_SESSION["username"])) {
                echo $_SESSION["username"];
            } else {
                echo "Guest";
            }
            ?></h1>
        <p>A technology geek and a computer science undergraduate at University of Plymouth.</p>
    </div>

    <?php include_once 'footer.php'; ?>
</body>

</html>