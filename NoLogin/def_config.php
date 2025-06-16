<?php
    $db_server = "localhost";
    $db_username = "ryan_firmansyah";
    $db_password = "admin123";
    $db_name = "employee_thing";
    $conn = mysqli_connect($db_server, 
                           $db_username, 
                           $db_password, 
                           $db_name);
    if($conn){
        $sql = "SET ROLE 'admin'";
        mysqli_query($conn, $sql);
    }
    else{
        echo"username / password salah";
    }
?>