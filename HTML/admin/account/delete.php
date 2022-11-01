<?php
    $servername = "localhost";
    $username = "phpmyadmin";
    $password = "user";
    $db_name = "phpmyadmin";

    $conn = new mysqli($servername, $username, $password, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM credentials WHERE username = '" . $_POST['username'] . "'";
    $result = $conn->query($sql);

    $conn->close();
    header("Location: /admin.php");
?>