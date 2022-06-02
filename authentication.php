<?php
include 'dbconnect.php';



if(!isset($_POST['send_login'])) {
    header('Location: login.php');
} else {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $select_account = "select username, password, role, COUNT(*) from users where username='$username'";
    $query = $conn->query($select_account);
    foreach ($query as $row) {
        if ($row['COUNT(*)'] > 0) {
            if ($password == $row['password']){
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $row['role'];
                $_SESSION['send_login'] = true;
                //Cek apakah login sebagai admin
                if ($_SESSION["role"] == 'ADMIN'){
                    header('Location: admin.php');
                    exit();
                } else if ($_SESSION["role"] == 'GURU'){ 
                    //Cek apakah login sebagai guru
                    header('Location: guru.php');
                    exit();
                } else { 
                    //Cek apakah login sebagai murid 
                    header('Location: murid.php');
                    exit();
                }
            }
        }
        session_start();
        header('Location: login.php?login-status=failed');
        exit();
        break;
    }
}

?>
