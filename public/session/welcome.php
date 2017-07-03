<?php
    require 'session_ini.php';
	
    if (isset($_SESSION["username"])) {
?>

	<h3>Welcome <?=$_SESSION["username"]?></h3>
	<form method="POST" action="comment.php">
		<p><textarea name="comment" placeholder="Enter your comment here" rows="10" cols="50"></textarea></p>
		<p><input type="submit"></p>
	</form>
	<p><a href="logout.php">LOGOUT</a></p>

<?php
	
	} else {
        header("location:login.php");
    }

?>