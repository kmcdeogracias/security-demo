<?php  
    require '../conf/db.php';

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        echo $query = "SELECT username, first_name, last_name FROM users WHERE id = $id"; echo "<br/>";

        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $num_res = mysqli_num_rows($result);
        echo 'Total number of results: ' . $num_res . '<br/>';

        if ($num_res > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                print_r($row);
            }
        }


        // Prepared Statement
        /*$query =  "SELECT username, first_name FROM users WHERE id=?";
        if ($stmt = $conn->prepare($query)) {

                if (!$stmt->bind_param("i", $user_id)) {
                    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
                }

                $user_id = $id;
                
                $stmt->execute();
                $stmt->bind_result($user, $first_name);
                $stmt->fetch();

                printf("%i of username %s %s\n", $user_id, $user, $first_name);
            
            $stmt->close();
        }*/
    }

    // DESC: Inject code via URL

    // INPUT: '' or '1'='1'
    // QUERY: SELECT username, first_name, last_name FROM users WHERE id = '' or '1'='1'

    // INPUT: '' or ''=''
    // QUERY: SELECT username, first_name, last_name FROM users WHERE id = '' or ''=''

    // INPUT: 'x' OR first_name='melai'
    // INPUT: 'x' OR firstname='melai'
    // INPUT: 'x' OR users.firstname='melai'
    // Guessing proper column names
    // QUERY: SELECT username, first_name, last_name FROM users WHERE id = 'x' OR first_name='melai'

    // 'x' OR first_name LIKE '%user%'

    //  1; INSERT INTO users (`username`, `password`, `first_name`, `last_name`) VALUES ('raph', md5('password'), 'Raph', 'Medina')
?>