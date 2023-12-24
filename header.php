<?php
session_start();
?>

<div class="header">

    <ul>
        <li><a class="active" href="/index.php">Home</a></li>
        <!-- <li><a href="#news">News</a></li>
        <li><a href="#contact">Contact</a></li> -->
        <li style="float:right">
            <?php
            if (isset($_SESSION["username"])) {
                echo '<a href="/logout.php">Logout</a>';
            } else {
                echo '<a href="/signup.php">Signup</a>';
            }
            ?>
        </li>
        <li style="float:right">
            <?php
            if (isset($_SESSION["username"])) {
                echo '<a href="#">' . $_SESSION["username"] . '</a>';
            } else {
                echo '<a href="/login.php">Login</a>';
            }
            ?>
        </li>
    </ul>

</div>