<?php
    include_once "config.php";
    session_start();
    if ( mysqli_connect_errno() ) {
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    if ( !isset($_POST['username'], $_POST['password']) ) {
        exit('Isi Data Username dan Password');
    }
    else {
        if ($stmt = $mysqli->prepare('SELECT username, password FROM user WHERE username = ?')) {
            $stmt->bind_param('s', $_POST['username']);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $stmt->bind_result($username,$password);
                $stmt->fetch();
                if (substr(md5($_POST['password']),0,30) == $password) {
                    session_regenerate_id();
                    $_SESSION['loggedin'] = TRUE;
                    $_SESSION['name'] = $_POST['username'];
                    header('Location: index.php');
                } else {
                    echo 'Username dan/atau password salah!';
                }
            } else {
                echo 'Username dan/atau password salah!';
            }
            $stmt->close();
        }
    }
?>