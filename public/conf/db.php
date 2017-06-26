<?php
    $server_name = "mysql";
    $username = "root";
    $password = "password";
    $db_name = "storm";

    // Create connection
    $conn = new mysqli($server_name, $username, $password, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
