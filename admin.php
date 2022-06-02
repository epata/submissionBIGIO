<?php 
include 'dbconnect.php';
session_start();
if(!isset($_SESSION["send_login"])){
    header("Location: ./login.php");
    exit;
}

$namauser = $_SESSION["username"] ; 

$queryNama = "select nama from users where username = '$namauser' ";
$resultNama = $conn->query($queryNama);
$rowNama = $resultNama->fetch_assoc();
$queryId = "select id from users where username = '$namauser' ";
$resultId = $conn->query($queryId);
$rowId = $resultId->fetch_assoc();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Application Web - Submisi BigIO</title>
        <link rel="stylesheet" type="text/css" href="styles/page.css">
    </head>
    <body>
        <div class="flex-container-admin">
            <header>
                <h1>Submisi BigIO</h1>
                <div class="button-logout">
                    <a href="logout.php" class="navbar__links">
                        <input type="submit" value="Logout" class="btn">
                    </a>
                </div>
            </header>
            <main class="admin-main">
                <div class="card-admin">
                    <h2>Data Guru</h2>
                        <form class="" action="admin_submit.php" method="post">
                            <div class="form">
                                <label for="name-teacher"><b>Nama</b></label><br>
                                <input type="text" placeholder="Masukkan nama" id="name-teacher" name="name-teacher"><br>
        
                                <label for="nip-teacher"><b>NIP</b></label><br>
                                <input type="number" placeholder="Masukkan no. induk" id="nip-teacher" name="nip-teacher"><br>

                                <label for="username-teacher"><b>Buat username</b></label><br>
                                <input type="text" placeholder="Masukkan username" id="username-teacher" name="username-teacher"><br>
        
                                <label for="password-teacher"><b>Buat password</b></label><br>
                                <input type="text" placeholder="Masukkan password" id="password-teacher" name="password-teacher"><br>
                                <div class="buttons">
                                    <input type="submit" value="Submit" class="btn" name="send_data_guru">
                                </div>
        
                            </div>
                        </form>
                </div>
                <div class="card-admin">
                    <h2>Data Siswa</h2>
                        <form class="" action="admin_submit.php" method="post">
                            <div class="form">
                                <label for="name-student"><b>Nama</b></label><br>
                                <input type="text" placeholder="Masukkan nama" id="name-student" name="name-student"><br>
        
                                <label for="ni-student"><b>No. Induk</b></label><br>
                                <input type="number" placeholder="Masukkan nip" id="ni-student" name="ni-student"><br>

                                <label for="username-student"><b>Buat username</b></label><br>
                                <input type="text" placeholder="Masukkan username" id="username-student" name="username-student"><br>
        
                                <label for="password-student"><b>Buat password</b></label><br>
                                <input type="text" placeholder="Masukkan password" id="password-student" name="password-student"><br>
        
                                <div class="buttons">
                                    <input type="submit" value="Submit" class="btn" name="send_data_siswa">
                                </div>
        
                            </div>
                        </form>
                </div>
                <aside>
                    <article class="card">
                        <h2>Profile</h2>
                        <img src="" alt="">
                        <section>
                            <table>
                                <tr>
                                    <th>Nama</th>
                                    <td><?php echo $rowNama["nama"] ?></td>
                                </tr>
                                <tr>
                                    <th>ID</th>
                                    <td><?php echo $rowId["id"] ?></td>
                                </tr>
                            </table>
                        </section>
                    </article>
                </aside>
            </main>
            <footer></footer>
        </div>
    </body>
</html>