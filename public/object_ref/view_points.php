<?php
    require 'session_ini.php';
    require '../conf/db.php';

    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    
    if (isset($_SESSION["logged_in"])) {
        $sess_user_id = $_SESSION["user_id"];
        $user_id = isset($_GET["user_id"]) ? $_GET["user_id"] : null;

        if ($user_id != $sess_user_id) {
            echo "Access denied";
        } else {

            if ($user_id) {
                $query = "SELECT `points` from `points`
                WHERE `user_id` = $user_id";

                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                $num_res = mysqli_num_rows($result);

                if ($num_res > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
    ?>
                        <h4>My Points:</h4><p><?=$row['points']?></p>
    <?php
                    }
                }
            } else {
                return ;
            }
        }
    } else {
        header("location:login.php");
    }

?>