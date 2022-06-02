<?php 
include 'dbconnect.php';
session_start();
if(!isset($_SESSION["send_login"])){
    header("Location: ./login.php");
    exit;
}

$namauser = $_SESSION["username"] ; 
$query = "select * from nilai_siswa natural inner join users where username = '$namauser'";
$result = $conn->query($query);
$rows = array();
$index = 0;
while($row = mysqli_fetch_assoc($result)) {
    $rows[$index] = $row;
    $index++;
}
$nrows = count($rows);

$queryB = "select nilai from nilai_siswa natural inner join users where username = '$namauser' and mata_pelajaran = 'biologi'";
$resultB = $conn->query($queryB);
$rowB = $resultB->fetch_assoc();
$queryF = "select nilai from nilai_siswa natural inner join users where username = '$namauser' and mata_pelajaran = 'fisika'";
$resultF = $conn->query($queryF);
$rowF = $resultF->fetch_assoc();
$queryK = "select nilai from nilai_siswa natural inner join users where username = '$namauser' and mata_pelajaran = 'kimia'";
$resultK = $conn->query($queryK);
$rowK = $resultK->fetch_assoc();
$queryM = "select nilai from nilai_siswa natural inner join users where username = '$namauser' and mata_pelajaran = 'matematika'";
$resultM = $conn->query($queryM);
$rowM = $resultM->fetch_assoc();

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
                <div class="button-logout">
                    <a href="logout.php" class="navbar__links">
                        <input type="submit" value="Logout" class="btn">
                    </a>
                </div>
            </header>
            <main>
                <div class="content">
                    <div class="card">
                        <h2>Nilai Anda:</h2>
                        <section>
                            <table>
                                <tr>
                                    <th>Biologi</th>
                                    <td>
                                        <?php if($rowB["nilai"] == -99) : ?>
                                            <?php echo 'Nilai belum dimasukkan' ?>
                                        <?php else : ?>
                                            <?php echo $rowB["nilai"] ?>
                                        <?php endif;?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Fisika</th>
                                    <td>
                                        <?php if($rowF["nilai"] == -99) : ?>
                                            <?php echo 'Nilai belum dimasukkan' ?>
                                        <?php else : ?>
                                            <?php echo $rowF["nilai"] ?>
                                        <?php endif;?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Kimia</th>
                                    <td>
                                        <?php if($rowK["nilai"] == -99) : ?>
                                            <?php echo 'Nilai belum dimasukkan' ?>
                                        <?php else : ?>
                                            <?php echo $rowK["nilai"] ?>
                                        <?php endif;?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Matematika</th>
                                    <td>
                                        <?php if($rowK["nilai"] == -99) : ?>
                                            <?php echo 'Nilai belum dimasukkan' ?>
                                        <?php else : ?>
                                            <?php echo $rowK["nilai"] ?>
                                        <?php endif;?>
                                    </td>
                                </tr>
                            </table>
                        </section>
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
                                    <th>No. Induk</th>
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