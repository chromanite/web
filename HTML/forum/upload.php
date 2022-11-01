<?php
    session_start();
    if ($_SESSION['admin'] == -1) {
        header("Location: /index.php");
    }

	$servername = "localhost";
    $username = "phpmyadmin";
    $password = "user";
    $db_name = "phpmyadmin";

	$conn = new mysqli($servername, $username, $password, $db_name);

	if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

	if ($_FILES['uploaded_file']["error"] == 4 && $_FILES['uploaded_file']["size"] == 0) {
		$sql = "INSERT INTO new_threads (title, post, author, approval) VALUES ('$_POST[title]', '$_POST[post]', '$_POST[author]', 0)";

		if ($conn->query($sql)) {
			header("Location: /index.php");
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	} else {
		$path = "uploads/";
    	$path = $path . basename( $_FILES['uploaded_file']['name']);

        if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
            echo "The file ".  basename( $_FILES['uploaded_file']['name']). " has been uploaded";
	
			$path = substr($path, 8);
			$sql = "INSERT INTO new_threads (title, post, author, approval, file) VALUES ('$_POST[title]', '$_POST[post]', '$_POST[author]', 0, '$path')";

			if ($conn->query($sql)) {
				header("Location: /index.php");
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}

        } else {
            echo "There was an error uploading the file, please try again!";
        }
	}
?>
