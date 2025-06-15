<?php
    $db_server = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "employee_thing";
    $conn = "";

    $conn = mysqli_connect($db_server, 
                           $db_username, 
                           $db_password, 
                           $db_name);
    
    if($conn){
        echo"You are connected" . "<br>";
    }
    else{
        echo"could not connect" . "<br>";
    }
?>