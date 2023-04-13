<?php
    $servername = "localhost";
    $username = "root";
    $password = "Mmmt@14898";
    $dbname = "crud";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if(!$conn)
    {
        die(mysqli_connect_error($conn));
    }
?>
