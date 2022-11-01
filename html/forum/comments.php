<?php
    include_once '/iindex.php';

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
