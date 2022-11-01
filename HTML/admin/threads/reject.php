<?php
    $servername = "localhost";
    $username = "phpmyadmin";
    $password = "user";
    $db_name = "phpmyadmin";

    $conn = new mysqli($servername, $username, $password, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM new_threads WHERE id = " . $_POST['id'];

    $conn->query($sql);
    $conn->close();
    header("Location: /admin/threads/threads.php");
?>
