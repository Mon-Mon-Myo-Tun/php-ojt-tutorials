<?php

    include "db.php";
    $sql = "SHOW TABLES LIKE 'users'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0)
    {
        $sql = "CREATE TABLE users (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            phone VARCHAR(255) NOT NULL,
            img VARCHAR(255),
            address TEXT NOT NULL,
            created_datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        if (!mysqli_query($conn, $sql)) {
            echo "Error creating table: " . mysqli_error($conn);
        } else 
        {
           
             echo "Table users created successfully";
        }
        
    } 
    
?>
