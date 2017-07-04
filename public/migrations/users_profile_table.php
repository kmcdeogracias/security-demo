<?php
    // http://0.0.0.0:8003/migrations/users_profile_table.php
    
    // DB connection
    require "../conf/db.php";

    // Query
    $query = "CREATE TABLE users_profile (
            user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            address VARCHAR(50) NOT NULL,
            nickname VARCHAR(255) NOT NULL,
            gender VARCHAR(50) NOT NULL
        )";

    if ($conn->query($query) === TRUE) {
        echo "Users profile table created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
?>
