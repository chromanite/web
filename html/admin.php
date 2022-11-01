<?php
    session_start();
    $servername = "localhost";
    $username = "phpmyadmin";
    $password = "user";
    $db_name = "phpmyadmin";

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
    <link rel="stylesheet" href="./assets/css/admin.css">
    <title>Admin Panel - Account Mgmt</title>
</head>
<body>
<nav id="main-menu">
    <ul class="nav-bar">
        <li class='nav-button-home'><a href='/admin.php'>Admin Panel</a></li>
        <li class='nav-button-services'><a href='/admin/threads/threads.php'>New unapproved threads</a></li>
        <li class='nav-button-products'><a href='/index.php'>Home page</a></li>
    </ul>
</nav>
    <table>
        <thead>
        <tr>
            <th>Username</th>
            <th>Password</th>
            <th>Admin status</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $conn = new mysqli($servername, $username, $password, $db_name);
    
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            echo "Connected to " . $db_name . " successfully";
    
            $sql = "SELECT username, password, admin FROM credentials";
            $result = $conn->query($sql);
            
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><strong>". $row['username'] ."</strong></td>";
                echo "<td>" . $row['password'] . "</td>";
                echo "<td>" . $row['admin'] . "</td>";
                echo "</tr>";

            }
        ?>
        </tbody>
    </table>
    
    <h2> Update user </h2>
    <h3> Enter new password in plaintext</h3>
    <form action="/admin/account/update.php" method=POST>
        <input type="text" name="username" placeholder="Username" required>
        <input type="text" name="password" placeholder="Password">
        <input type="text" name="admin" placeholder="Admin status">
        <input type="submit" value="Edit">
    </form>



    <h2> Delete user </h2>
    <h3> Enter the username to delete</h3>
    <form action="/admin/account/delete.php" method=POST>
        <input type="text" name="username" placeholder="Username" required>
        <input type="submit" value="Delete">
    </form>
</body>
</html>