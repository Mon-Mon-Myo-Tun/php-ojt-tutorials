<?php

    $dbHost = "localhost";
    $dbUsername = "root";
    $dbPassword = "Mmmt@14898";
    $dbName = "register";
    $conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
