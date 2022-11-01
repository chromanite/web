<?php
    include_once '../../iindex.php';

    $sql = "DELETE FROM new_threads WHERE id = " . $_POST['id'];

    $conn->query($sql);
    $conn->close();
    header("Location: /admin/threads/threads.php");
?>
