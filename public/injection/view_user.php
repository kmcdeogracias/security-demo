<?php  
    require 'conf/db.php';

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        
        // echo $query = "SELECT id, username, first_name, last_name FROM users where username = '" . $username . "'"; echo "<br />";
        echo $query = "SELECT username, first_name, last_name FROM users WHERE id = $id"; echo "<br>";

        // prepare and bind
        // $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
        // $stmt = $conn->prepare("SELECT * FROM users WHERE id = (?)");
        // $stmt->bind_param("i", $id);
        
        // $stmt->execute();


        $result = mysqli_multi_query($conn, $query) or die(mysqli_error($conn));
        $num_res = mysqli_num_rows($result);
        echo 'Total number of results: ' . $num_res . '<br/>';

        if ($num_res > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                print_r($row);
            }
        }

        /* create a prepared statement */
        // if ($stmt = $conn->prepare("SELECT username, first_name FROM users WHERE id=?")) {

        //         if (!$stmt->bind_param("i", $user_id)) {
        //             echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
        //         }
        //         $user_id = $id;
                
        //         $stmt->execute();

        //         $stmt->bind_result($user, $first_name);

        //         $stmt->fetch();

        //         printf("%i of username %s %s\n", $user_id, $user, $first_name);
            
        //     $stmt->close();
        // }
    }

/*
    'x' OR users.first_name='melai'
*/    
?>    