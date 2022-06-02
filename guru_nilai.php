<?php
include 'dbconnect.php';
session_start();

/*if(!isset($_SESSION["send_login"])){
    header("Location: ./login.php");
    exit;
}*/
$id = $_GET["id"];
$querySiswa = "select nama from users where id = '$id' ";
$resultSiswa = $conn->query($querySiswa);
$rowSiswa = $resultSiswa->fetch_assoc();

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
        <div class="flex-container">
            <header>
                <h1>Submisi BigIO</h1>
            </header>
            <main>
                <div class="content">
                    <div class="card-nilai">
                        <h2>Siswa: <?php echo $rowSiswa["nama"] ?></h2>
                        <h2>Isi nilai</h2>
                        <label for="choose-course"><b>Pilih Mata Pelajaran: </b></label>
                        <form id="teacher-data" action="guru_nilai_submit.php?id=<?php echo $id ?>" method="post">
                            <select id="mata_pelajaran" name="mata_pelajaran">
                                <option value="biologi" >Biologi</option>
                                <option value="fisika" >Fisika</option>
                                <option value="kimia" >Kimia</option>
                                <option value="matematika" >Matematika</option>
                            </select>
                            <br>
                            <label for="input-subject-value"><b>Nilai</b></label><br>
                            <input type="number" placeholder="Masukkan nilai" id="nilai" name="nilai" min="0" max="100"><br>
                            <div class="buttons"><input type="submit" value="Submit" class="btn" name="input-nilai"></div>
                        </form>
                    </div>
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
                                    <th>NIP</th>
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