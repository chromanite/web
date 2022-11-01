<?php
    session_start();
    if ($_SESSION['admin'] == 0 || $_SESSION['admin'] == -1) {
        header("Location: /index.php");
    }

    if (!isset($_SESSION['username'])) {
        header("Location: /login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="/assets/css/admin.css">
    <title>Admin Panel - Account Mgmt</title>
</head>
<body>
<nav id="main-menu">
<ul class="nav-bar">
        <li class='nav-button-home'><a href='/admin.php'>Admin Panel</a></li>
        <li class='nav-button-services'><a href='/admin.php'>Account Management</a></li>
        <li class='nav-button-products'><a href='/index.php'>Home page</a></li>
    </ul>
</nav>

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Thread/Topic title</th>
            <th>Post</th>
            <th>Author</th>
            <th>Files</th>
        </tr>
        </thead>
        <tbody>
        <?php
            include_once '../../iindex.php';
            
            echo "Connected to " . $db_name . " successfully";
    
            $sql = "SELECT * FROM new_threads";

            $result = $conn->query($sql);
            
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><strong>". $row['id'] ."</strong></td>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . $row['post'] . "</td>";
                    echo "<td>" . $row['author'] . "</td>";
                    
                    if ($row['file'] != null) {
                        echo "<td>" . $row['file'] . "</td>";
                    } else {
                        echo "<td> No files! </td>";
                    }
                    echo "</tr>";
                }
        ?>
        </tbody>
    </table>
        
    <h2> Approve thread/topic </h2>
    <h3> Enter ID number</h3>
    <form action="/admin/threads/approve.php" method=POST>
        <input type="text" name="id" placeholder="ID" required>
        <input type="submit" value="approve">
    </form>

    <h2> Reject thread/topic </h2>
    <h3> Enter ID number</h3>
    <form action="/admin/threads/reject.php" method=POST>
        <input type="text" name="id" placeholder="ID" required>
        <input type="submit" value="reject">
    </form>
</body>
</html>
