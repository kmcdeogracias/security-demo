<?php
    // DB connection
    require '../conf/db.php';

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['first_name']) && isset($_POST['last_name'])) {
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $hashed_pw = md5($password);
        
        $error = false;

        if (!$error) {
            $query = "INSERT INTO `users` (username, password, first_name, last_name) VALUES ('$username', '$hashed_pw', '$first_name', '$last_name')";

            $result = mysqli_multi_query($conn, $query) or die('Query fails: ' . mysqli_error($conn));
            if ($result) {
                echo "User successfully created :)";
            }
        } else {
            echo "User creation failed :(";
        }
    } else {
        header("location:registration.php");
    }

    // DESC: Inject drop statement during INSERT query

    // INPUT: x'); DROP TABLE users_profile; #
    
    // QUERY: INSERT INTO `users` (username, password, first_name, last_name) VALUES ('email@example.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Juan', 'x'); DROP TABLE users_profile; #')

?>