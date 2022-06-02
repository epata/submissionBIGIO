<?php 
include 'dbconnect.php';
session_start();
if(!isset($_SESSION["send_login"])){
    header("Location: ./login.php");
    exit;
}

$namauser = $_SESSION["username"] ; 
$query = "select * from users where role = 'SISWA'";
$result = $conn->query($query);
$rows = array();
$index = 0;
while($row = mysqli_fetch_assoc($result)) {
    $rows[$index] = $row;
    $index++;
}
$nrows = count($rows);

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
                        <h2>Pilih murid:</h2>
                        <?php if($nrows > 0) : ?>
                        <?php for($i= 0 ; $i < $nrows ; $i++ ) : ?>
                                <div class="card">
                                    <div class="murid">
                                        <a href="guru_nilai.php?id=<?php echo $rows[$i]['id'] ?>">
                                            <p class="nama_murid"><?php echo $rows[$i]['username'] ?></p>
                                        </a>
                                    </div>
                                </div>
                        <?php endfor ; ?>
                        <?php else : ?>
                            <h2>Tidak ada murid pada basis data</h2>
                        <?php endif;?>
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
        </div>
    </body>
</html>