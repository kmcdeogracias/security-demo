<?php
    // http://0.0.0.0:8003/migrations/users_table.php

    // DB connection
    require "../conf/db.php";

    // Query
    $query = "CREATE TABLE users (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL,
            password VARCHAR(255) NOT NULL,
            first_name VARCHAR(50) NOT NULL,
            last_name VARCHAR(50) NOT NULL
        )";

    if ($conn->query($query) === TRUE) {
        echo "Users table created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
?>
