<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="assets/css/login.css">
    <title>Login</title>
    <script src="/assets/js/login.js"></script>
</head>
<body>
    <div class="login-box">
    <h2>Login</h2>
        <form name="login-form" method="POST">
            <div class="user-box">
                <input type="text" name="username">
                <label>Username: </label>
            </div>
            <div class="user-box">
                <input type="password" name="password">
                <label>Password: </label>
            </div>
            
            <button onclick="login()">
                <a>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Login
                </a>
            </button>

            <button style="padding-left: 20%;">
                <a href="./register.php">
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
            echo "Connected successfully";
                 
            $sql = "SELECT username, password, admin FROM credentials WHERE username = '" . $_POST['username'] . "'"; 

            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if (password_verify($_POST['password'], $row['password'])) {
                session_start();
                $_SESSION['username'] = $row['username'];
                $_SESSION['admin'] = $row['admin'];
                header("Location: /index.php");
            } else {
                echo "Wrong password";
            }
            
            $conn->close();
        }
    ?>
    
</body>
</html>