<?php
    include_once '../../iindex.php';

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
