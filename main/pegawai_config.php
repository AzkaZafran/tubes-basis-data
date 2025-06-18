<?php
    session_start();

    $db_server = "localhost";
    $db_username = $_SESSION["username"];
    $db_password = $_SESSION["password"];
    $db_name = "employee_thing";
    $conn = "";

    $conn = mysqli_connect($db_server, 
                           $db_username, 
                           $db_password, 
                           $db_name);

    if($conn){
        $sql = "SET ROLE 'pegawai'";
        if(mysqli_query($conn, $sql)){
            $_SESSION["role"] = 'pegawai';
            echo"masuk sebagai pegawai";
        }
        else{
            echo"pengguna ini tidak memiliki peran pegawai";
            header("pegawailogin.php");
        }
    }
    else{
        echo"username / password salah";
    }
?>