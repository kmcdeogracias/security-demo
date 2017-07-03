<?php
    require 'session_ini.php';
	require '../conf/db.php';

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

	if (isset($_POST["username"]) && isset($_POST["password"])) {
		$username = $_POST["username"];
        $password = $_POST["password"];

        $hashed_password = md5($password);
        $query = "SELECT * from `users`
            WHERE `username` = '$username'
            AND `password` = '$hashed_password'";

        $result = mysqli_query($conn, $query);
        if ($result->num_rows) {
        	while ($row = mysqli_fetch_array($result)) {
                session_regenerate_id(true);
        		$_SESSION["username"] = $row["username"];
                header("location:welcome.php");
        	}
        } else {
            echo "Invalid credentials";
        }
	} else {
        include 'login_form.php';
    }
?>