<?php
    require 'session_ini.php';
	
    if (isset($_SESSION["logged_in"])) {
		$user_id = $_SESSION["user_id"];
?>

		<h3>Welcome <?=$_SESSION["username"]?></h3>
		<p><a href="view_points.php?user_id=<?=$user_id?>">VIEW POINTS</a></p>
		<p><a href="logout.php">LOGOUT</a></p>

<?php
	
	} else {
        header("location:login.php");
    }

?>