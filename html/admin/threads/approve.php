<?php
    $servername = "localhost";
    $username = "phpmyadmin";
    $password = "user";
    $db_name = "phpmyadmin";

    $conn = new mysqli($servername, $username, $password, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, title, post, author, file FROM new_threads WHERE id = " . $_POST['id'];

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $sql = "INSERT INTO forum (title, post, author, file) VALUES ('" . $row['title'] . "', '" . $row['post'] . "', '" . $row['author'] . "', '" . $row['file'] . "')";
            $conn->query($sql);
            $sql = "DELETE FROM new_threads WHERE id = " . $_POST['id'];
            $conn->query($sql);
        }
    }
    
    $conn->close();
    header("Location: /admin/threads/threads.php");
?>
