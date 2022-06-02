<?php
include 'dbconnect.php';
//Sesi dimulai
session_start();

/*if(isset($_SESSION["send_login"])){
    //Cek apakah login sebagai admin
    if ($_SESSION["role"] == 'ADMIN'){
        header('Location: admin.php');
        exit();
    }
    //Cek apakah login sebagai guru
    else if ($_SESSION["role"] == 'GURU'){
        header('Location: guru.php');
        exit();
    }
    //Cek apakah login sebagai murid 
    else {
        header('Location: murid.php');
        exit();
    }
}*/

if (isset($_COOKIE['account'])) {
    header('Location: setsession.php');
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Application Web - Submisi BigIO</title>
        <link rel="stylesheet" type="text/css" href="styles/login.css">
    </head>
    <body>
        <header>
            <h1>Submisi BigIO</h1>
        </header>
        <main>
            <div class="container">
                <div class="loginbox">
                    <?php
                    if (isset($_GET["login-status"])){
                        if ($_GET["login-status"] == "failed") {
                            ?>
                            <p id="login-failed"> Username or password is incorrect. </p>
                        <?php
                        }
                    }
                    ?>
                    <form id="login-form" action="authentication.php" method="post">
                        <div class="input">
                            <label for="username">Username</label>
                            <input type="text" placeholder="Masukkan username Anda" id="username" name="username" required>
                        </div>

                        
                        <div class="input">
                            <label for="password">Password</label>
                            <input type="password" placeholder="Masukkan password Anda" id="password" name="password" required><br>
                        </div>

                        <div class="buttons">
                            <input type="submit" value="Submit" class="btn" name="send_login">
                        </div>
                    </form>
                </div>

            </div>
        </main>
        <aside></aside>
        <footer></footer>
    </body>
</html>