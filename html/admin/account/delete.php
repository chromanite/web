<?php
    include_once '../../iindex.php';

    $sql = "DELETE FROM credentials WHERE username = '" . $_POST['username'] . "'";
    $result = $conn->query($sql);

    $conn->close();
    header("Location: /admin.php");
?>