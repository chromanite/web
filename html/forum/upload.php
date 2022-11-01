<?php
    session_start();
    if ($_SESSION['admin'] == -1) {
        header("Location: /index.php");
    }

    include_once '/iindex.php';

    
	if (!empty($_FILES['uploaded_file']))
    {
        $path = "uploads/";
    	$path = $path . basename($_FILES['uploaded_file']['name']);

        if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
            echo "The file ".  basename($_FILES['uploaded_file']['name']). " has been uploaded";
	
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
    } else {
		$sql = "INSERT INTO new_threads (title, post, author, approval) VALUES ('$_POST[title]', '$_POST[post]', '$_POST[author]', 0)";

		if ($conn->query($sql)) {
			header("Location: /index.php");
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	
	}
?>
