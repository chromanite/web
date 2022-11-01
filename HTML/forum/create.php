<?php
    session_start();
    if ($_SESSION['admin'] == -1) {
        header("Location: /index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/create.css">
    <title>Create thread</title>
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
        ?>
     </ul>
</nav>

    <section id="container">
        <section id="form-container">
            <p id="description">Create a thread</p>
            <form action="upload.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <label for="name" id="name-label" class>Title:</label>
                <input type="text" name="title" placeholder="Thread title"><br><br>
            </div>
            <div class="row">
            
            </div>
            <div class="row">
                <label for="author" id="number-label">Author:</label>
                <input type="text" name="author"><br><br>
            </div>
        
            <div class="row">
                <label for="comments" id="comments-label">Post: </label>
                <textarea name="post" id="comments" placeholder="Thread post" style="width: 723px; height: 230px;"></textarea><br><br>
            </div>
            <div class="row">
                <input type="file" name="uploaded_file"><br><br>
                <button type="submit" id="submit" class="btn" name="submit"> Submit
            </div>
            </form>
        </section>
    </section>
</body>
</html>



