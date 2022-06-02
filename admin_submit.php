<?php

    $connection = mysqli_connect('localhost', 'root', '', 'school_db');

    //Mengirim data login
    if(isset($_POST['send_login'])){
        $username = $_POST['username-teacher'];
        $password = $_POST['password-teacher'];
  
        $request = " select * from users where username = '$username' and password = '$password'";
        mysqli_query($connection, $request);
  
        header('location:admin.php'); 
  
    }else{
       echo 'something went wrong please try again!';
    }
    //Mengirim data guru
    if(isset($_POST['send_data_guru'])){
        $name = $_POST['name-teacher'];
        $id = $_POST['nip-teacher'];
        $username = $_POST['username-teacher'];
        $password = $_POST['password-teacher'];
        $role = 'GURU';
  
        $request = " insert into users(id, nama, username, password, role) values('$id','$name','$username','$password','$role') ";
        mysqli_query($connection, $request);
  
        echo "<script>alert('Berhasil submit!'); window.location.href='admin.php';</script>";
  
    }else{
        echo 'something went wrong please try again!';
    }

     //Mengirim data siswa
     if(isset($_POST['send_data_siswa'])){
        $name = $_POST['name-student'];
        $id = $_POST['ni-student'];
        $username = $_POST['username-student'];
        $password = $_POST['password-student'];
        $role = 'SISWA';
  
        $request = " insert into users(id, nama, username, password, role) values('$id','$name','$username','$password','$role') ";
        mysqli_query($connection, $request);

        $mata_pelajaran1 = 'biologi';
        $mata_pelajaran2 = 'fisika';
        $mata_pelajaran3 = 'kimia';
        $mata_pelajaran4 = 'matematika';
        $nilai = -99;

        $request = " insert into nilai_siswa(id_siswa, mata_pelajaran, nilai) values('$id','$mata_pelajaran1', '$nilai') ";
        mysqli_query($connection, $request);
        $request = " insert into nilai_siswa(id_siswa, mata_pelajaran, nilai) values('$id','$mata_pelajaran2', '$nilai') ";
        mysqli_query($connection, $request);
        $request = " insert into nilai_siswa(id_siswa, mata_pelajaran, nilai) values('$id','$mata_pelajaran3', '$nilai') ";
        mysqli_query($connection, $request);
        $request = " insert into nilai_siswa(id_siswa, mata_pelajaran, nilai) values('$id','$mata_pelajaran4', '$nilai') ";
        mysqli_query($connection, $request);
        echo "<script>alert('Berhasil submit!'); window.location.href='admin.php';</script>";
  
    }else{
        echo 'something went wrong please try again!';
    }

?>