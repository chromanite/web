<?php 
    session_start();
    include_once '/iindex.php';

    if (!isset($_SESSION['username'])) {
        $_SESSION['username'] = "guest";
        $_SESSION['admin'] = -1;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="/assets/css/index.css">
    <title>Index site</title>
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

    <?php
        $sql = "SELECT id, title, post, author FROM forum";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class='table-fill'>";
            echo "<thead>";
            echo "<th class='text-left'>ID</th><th class='text-left'>Title</th><th class='text-left'>Author</th><th class='text-left'>Link</th>";
            echo "<tbody class='table-hover'>";
            echo "</thead>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td class='text-left'>" . $row['id'] . "</td><td class='text-left'>" . $row['title'] . "</td><td class='text-left'>" . $row['author'] . "</td><td class='text-left'><a href='/forum/forums.php?id=" . $row['id'] . "'>Go to post</a></td></tr>";
            }
        } else {
            echo "No new threads/topics";
        }
    ?>
    
    
</body>
</html>
