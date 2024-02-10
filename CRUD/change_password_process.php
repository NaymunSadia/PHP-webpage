<?php
    if(isset($_GET['verify_token'])) {
        $code = $_GET['verify_token'];

        $conn = new mySqli('localhost', 'root', '', 'register');
        if($conn->connect_error) {
            die('Could not connect to the database');
        }

        $verifyQuery = $conn->query("SELECT * FROM form WHERE verify_token = '$code' and created_at >= NOW() - Interval 1 DAY");

        if($verifyQuery->num_rows == 0) {
            header("Location: Signin.php");
            exit();
        }

        if(isset($_POST['change'])) {
            $email = $_POST['email'];
            $new_password = $_POST['new_password'];

            $changeQuery = $conn->query("UPDATE form SET pass = '$new_password' WHERE email = '$email' and 
            verify_token = '$code' and created_at >= NOW() - INTERVAL 1 DAY");

            if($changeQuery) {
                header("Location: success.php");
            }
        }
        $conn->close();
    }
    else {
        header("Location: Signin.php");
        exit();
    }
?>
