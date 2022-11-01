<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="assets/css/login.css">
    <title>Register</title>
    <script src="assets/js/register.js"></script>
</head>
<body>
    <div class="login-box">
        <h2>Register</h2>
            <form name="login-form" method="POST">
                <div class="user-box">
                    <input type="text" name="username">
                    <label>Username: </label>
                </div>
                <div class="user-box">
                    <input type="password" name="password">
                    <label>Password: </label>
                </div>
                
                <button onclick="register()">
                    <a>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Register
                    </a>
                </button>
            </form>
        </div>

    <?php
        if (!isset($_POST['username']) || !isset($_POST['password']) || empty($_POST['username']) || empty($_POST['password'])) {
            die();
        } else {
            $servername = "localhost";
            $username = "phpmyadmin";
            $password = "user";
            $db_name = "phpmyadmin";

            $conn = new mysqli($servername, $username, $password, $db_name);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
            $sql = "INSERT INTO credentials (username, password, admin) VALUES ('" .  $_POST['username'] . "', '"  . $pass . "', 0)";
            
            if ($conn->query($sql)) {
                header("Location: /login.php");
                exit();
                $conn->close();
            } else {
                echo "ERROR: " . $sql . "<br>" . $conn->error;
            }
                        
            $conn->close();
        }
    ?>
</body>
</html>