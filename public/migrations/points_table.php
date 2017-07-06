<?php
    // http://0.0.0.0:8003/migrations/points_table.php
    
    // DB connection
    require "../conf/db.php";

    // Query
    $query = "CREATE TABLE points (
            user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            points VARCHAR(255) NOT NULL
        )";

    if ($conn->query($query) === TRUE) {
        echo "Points table created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
?>
