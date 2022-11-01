<?php
    $servername = "localhost";
    $username = "phpmyadmin";
    $password = "user";
    $db_name = "phpmyadmin";

    $conn = new mysqli($servername, $username, $password, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['username']) && isset($_POST['admin']) && !isset($_POST['password'])) {
        
        $sql = "UPDATE credentials SET admin = '" . $_POST['admin'] . "' WHERE username = '" . $_POST['username'] . "'";
        $result = $conn->query($sql);
    }elseif (isset($_POST['username']) && isset($_POST['password']) && !isset($_POST['admin'])) {
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "UPDATE credentials SET password = '" . $pass . "' WHERE username = '" . $_POST['username'] . "'";
        $result = $conn->query($sql);
    }elseif (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['admin'])) {
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "UPDATE credentials SET password = '" . $pass . "', admin = '" . $_POST['admin'] . "' WHERE username = '" . $_POST['username'] . "'";
        $result = $conn->query($sql);
    }

    $conn->close();
    header("Location: /admin.php");
?>
