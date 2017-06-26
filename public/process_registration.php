<?php
    require 'conf/db.php';

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['first_name']) && isset($_POST['last_name'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];

        $error = false;
        // if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        //     $error = true;
        // } else if (!ctype_alnum($first_name)) {
        //     $error = true;
        // } else if (!ctype_alnum($last_name)) {
        //     $error = true;
        // }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $hashed_password = md5($password);
        
        if (!$error) {
            echo $query = "INSERT INTO `users` (username, password, first_name, last_name) VALUES ('$username', '$hashed_password', '$first_name', '$last_name')";

            $success = false;
            $msg = null;

            try {
                $result = mysqli_query($conn, $query);

                if ($result) {
                    // echo $success = true;
                    // echo $msg = "User Created Successfully.";
                    echo 'SUCCESS';
                } else {
                    // echo $success = false;
                    print_r(mysqli_error($conn));
                }

            } catch (Exception $e) {
                print_r($e);
            }
        } else {
            echo 'Invalid input';
        }

    } else {
        echo $success = false;
    }
?>
