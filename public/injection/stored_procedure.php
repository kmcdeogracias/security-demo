<?php
	/**
		STORED PROCEDURE
			- form of parameterized query
			- actual query and parameter are treated as separate entities
			- treats parameters as solely data without ambiguity
	**/
	require '../conf/db.php';

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

	/**
		Without using stored procedure
	**/  

	/*if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$query = "SELECT username, first_name, last_name FROM users WHERE id = $id";
		$result = mysqli_query($conn, $query) or die('Query fails: ' . mysqli_error($conn));

		$num_res = mysqli_num_rows($result);
        echo 'Total number of results: ' . $num_res . '<br/>';

        if ($num_res > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                var_dump($row);
            }
        }
	}*/

	/**
		Using stored procedure
	
		DELIMITER //
		
		CREATE PROCEDURE get_user_by_id(IN id INT)
		BEGIN
			SELECT username, first_name, last_name FROM users
			WHERE users.id = id;
		END //

		DROP PROCEDURE IF EXISTS get_user_by_id
	**/

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$id = mysqli_real_escape_string($conn, $id);

		echo $query = "CALL get_user_by_id('$id')"; echo '<br/>';
		$result = mysqli_query($conn, $query) or die('Query fails: ' . mysqli_error($conn));

		$num_res = mysqli_num_rows($result);
        echo 'Total number of results: ' . $num_res . '<br/>';

        if ($num_res > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                var_dump($row);
            }
        }
	}
?>