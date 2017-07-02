<?php
    require 'conf/db.php';

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    $sesh_user = $_SESSION["username"];
    if (isset($sesh_user)) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $username =  mysqli_real_escape_string($conn, $username);
        $password =  mysqli_real_escape_string($conn, $password);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // $query = "SELECT * from `users`
        //     WHERE `username` = '$username'
        //     LIMIT 1";
        //
        // $result = mysqli_query($conn, $query);
        //
        // if (mysqli_num_rows($result) > 0) {
        //     while($row = mysqli_fetch_assoc($result)) {
        //         if (password_verify($password, $row["password"])) {
        //             echo "Successfully logged in";
        //         } else {
        //             echo "Invalid username or password";
        //         }
        //     }
        // } else {
        //     echo "Invalid username or password";
        // }

        $hashed_password = md5($password);
        $query = "SELECT * from `users`
            WHERE `username` = '$username'
            AND `password` = '$hashed_password'";

        $result = mysqli_query($conn, $query);
        $count = $result->num_rows;

        if ($count > 0) {
            while ($row = mysqli_fetch_array($result, MYSQL_BOTH)) {
                session_start();
                $_SESSION["username"] = $row["username"];
                // echo "Welcome " . $_SESSION["username"];
            }
        } else {
            echo "Invalid username or password";
        }
    }

    if (isset($sesh_user])) {
    ?>
        <h1> Welcome <?=$sesh_user?></h1>
        <form method="GET" action="form.php">
            <textarea></textarea>
            <br><br>
            <input type="submit" value="Submit">
        </form>

    <?php
        } else { }
    }
?>
