<?php  
    require 'conf/db.php';

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        
        // echo $query = "SELECT id, username, first_name, last_name FROM users where username = '" . $username . "'"; echo "<br />";
        // echo $query = "SELECT * FROM users WHERE id = $id";

        // prepare and bind
        // $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
        // $stmt = $conn->prepare("SELECT * FROM users WHERE id = (?)");
        // $stmt->bind_param("i", $id);
        
        // $stmt->execute();


        // $result = mysqli_query($conn, $query);

        // if (mysqli_num_rows($result) > 0) {
        //     # Output data of each row
        //     while($row = mysqli_fetch_assoc($result)) {
        //         echo "id: " . $row["id"] . ", username: " . $row["username"]. ", name: " . $row["first_name"]. " " . $row["last_name"]. "<br>";
        //     }
        // } else {
        //     echo "0 results";
        // }

        /* create a prepared statement */
        if ($stmt = $conn->prepare("SELECT username, first_name FROM users WHERE id=?")) {

                if (!$stmt->bind_param("i", $user_id)) {
                    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
                }
                $user_id = $id;
                
                $stmt->execute();

                $stmt->bind_result($user, $first_name);

                $stmt->fetch();

                printf("%i of username %s %s\n", $user_id, $user, $first_name);
            
            $stmt->close();
        }
    }

/*
    'x' OR users.first_name='melai'
*/    
?>    