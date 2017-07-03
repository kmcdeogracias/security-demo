<?php

	require '../conf/db.php';

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

	session_start();

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
        		$_SESSION["username"] = $row["username"];

        		header("Location:welcome.php");
        	}
        }
	}

    include 'login_form.php';
?>