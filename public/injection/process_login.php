<?php
    require '../conf/db.php';

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    if (isset($_POST['username']) && isset($_POST['password'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        // $username =  mysqli_real_escape_string($conn, $username);
        // $password =  mysqli_real_escape_string($conn, $password);

        $hashed_pw = md5($password);

        echo $query = "SELECT * FROM users WHERE username = '$username' AND password= '$hashed_pw'";

        $result = mysqli_query($conn, $query) or die('Query fails: ' . mysqli_error($conn));
        $count = $result->num_rows;

        echo "<br/>";
        if ($count > 0) {
            echo "Welcome!";
        } else {
            echo "Invalid credentials";
        }
    }

    // DESC: Inject bypass login

    // INPUT: melai' OR 1=1; #
    // Knows the username, not the password
    // QUERY: SELECT * FROM users WHERE username = 'melai' OR 1=1; #' AND password= 'd41d8cd98f00b204e9800998ecf8427e'

    // INPUT: ' OR 1=1; #
    // QUERY: SELECT * FROM users WHERE username = '' OR 1=1; #' AND password= 'd41d8cd98f00b204e9800998ecf8427e'

    // INPUT: ' or 1; #
    // QUERY: SELECT * FROM users WHERE username = '' or 1; #' AND password= 'd41d8cd98f00b204e9800998ecf8427e'

    // INPUT: x' or ''='' #
    // QUERY: SELECT * FROM users WHERE username = 'x' or ''='' #' AND password= 'd41d8cd98f00b204e9800998ecf8427e'
?>
