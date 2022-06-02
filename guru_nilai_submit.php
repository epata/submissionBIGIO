<?php
include 'dbconnect.php';
session_start();

/*if(!isset($_SESSION["send_login"])){
    header("Location: ./login.php");
    exit;
}*/
$id = $_GET["id"];
$mata_pelajaran = $_POST["mata_pelajaran"];
$nilai = $_POST["nilai"];
if (isset($_POST['input-nilai'])) {
    $request = " update nilai_siswa set nilai = '$nilai' where id_siswa = '$id' and mata_pelajaran = '$mata_pelajaran' ";
    mysqli_query($conn, $request);
    echo "<script>alert('Berhasil submit!'); window.location.href='guru.php';</script>";
}

?>