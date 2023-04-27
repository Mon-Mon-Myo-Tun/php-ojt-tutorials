<?php
    $servername = "localhost";
    $username = "root";
    $password = "Mmmt@14898";
    $dbname = "crud";
    $error="Error creating table: ";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if(!$conn)
    {
        die(mysqli_connect_error($conn));
    }

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "CREATE TABLE IF NOT EXISTS `posts` (
      `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `title` varchar(255) NOT NULL,
      `content` text NOT NULL,
      `is_published` tinyint(1) NOT NULL DEFAULT '0',
      `created_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
      `updated_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
    
    if ($conn->query($sql) === FALSE) {
        echo  $error. $conn->error;
    } 
   
?>
