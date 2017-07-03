<?php
    session_start();

    if (isset($_SESSION["username"])) {
        echo "<p>Welcome " . $_SESSION["username"] . "</p>";
        echo "<a href=logout.php>Logout</a>";

    } else {
        header("location:login.php");
    }
?>