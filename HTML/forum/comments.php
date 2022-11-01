<?php
    $servername = "localhost";
    $username = "phpmyadmin";
    $password = "user";
    $db_name = "phpmyadmin";

    $conn = new mysqli($servername, $username, $password, $db_name);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    if (isset($_POST['submit'])) {
        
        $sql = "INSERT INTO comments (fid, name, comments) VALUES (" . $_POST['fid'] . ", '" . $_POST['name'] . "', '" . $_POST['comments'] . "')";
        $result = $conn->query($sql);
        
        if ($result) {
            header("Location: /forum/forums.php?id=" . $_POST['fid']);
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        die("Error: No data sent");
    }
?>
