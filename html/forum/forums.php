<?php
    session_start();
    include_once '/iindex.php';

    if (isset($_GET['id'])) {
        $sql = "SELECT * FROM forum WHERE id=" . $_GET['id'];
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

    } else {
        header("Location: /index.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="/assets/css/forums.css">
    <title>Thread <?php echo $_GET['id'] ?></title>
</head>
<body>
<nav id="main-menu">
     <ul class="nav-bar">
        <?php
            if ($_SESSION['admin'] == 1) {
                echo "<li class='nav-button-home'><a href='/admin.php'>Admin Panel</a></li>";
            }

            if ($_SESSION['admin'] == 1 || $_SESSION['admin'] == 0) {
                echo "<li class='nav-button-services'><a href='/forum/create.php'>Create thread</a></li>";
                echo "<li class='nav-button-products'><a href='/logout.php'>Logout</a></li>";
            }
    
            if ($_SESSION['admin'] == -1) {
                echo "<li class='nav-button-home'><a href='/login.php'>Login</a></li>";
            }
        ?>
     </ul>
</nav>

    <table>
        <tr>
            <td>
                <h1>Title: <?php echo $row['title'] ?></h1>
                <h4>Post: <?php echo $row['post'] ?></h4>
                <p>Author: <?php echo $row['author'] ?></p>
                <?php
                    if ($row['file'] != null) {
                        echo "<p>File: <a href='./uploads/" . $row['file'] . "'>" . $row['file'] . "</a></p>";
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td>Name</td>
            <td>Comment</td>
        </tr>
        <?php
            $conn = new mysqli($servername, $username, $password, $db_name);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $sql = "SELECT name, comments FROM comments WHERE fid=" . $_GET['id'];
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row['name'] . "</td><td>" .$row['comments'] . "</td></tr>";
                }
            }
        ?>
    </table>

    <form action="/forum/comments.php" method="POST">
        <table>
            <tr>
                <td>
                    <input type="text" name="name" placeholder="Name">
                </td>
            </tr>
            <tr>
                <td>
                    <textarea name="comments" placeholder="Comment" style="resize: none;width: 366px; height: 65px;"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="fid" value="<?php echo $_GET['id'] ?>">
                    <input type="submit" name="submit" value="Submit">
                </td>
            </tr>
        </table>
    </form>

</body>
</html>
