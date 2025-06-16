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
        $sql = "SET ROLE 'admin'";
        if(mysqli_query($conn, $sql)){
            echo"masuk sebagai admin";
        }
        else{
            echo"pengguna ini tidak memiliki peran admin";
            header("adminlogin.php");
        }
    }
    else{
        echo"username / password salah";
    }
?>