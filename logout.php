<?php

    include_once '/includes/dbh.inc.php';

    session_start();
    session_unset();
    session_destroy();

    header('location:/index.php');

?>