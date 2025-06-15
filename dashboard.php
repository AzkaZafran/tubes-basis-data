<?php
    session_start();
?>

<?php
    $db_server = "localhost";
    $db_username = $_SESSION["username"];
    $db_password = $_SESSION["password"];
    $db_name = "employee_thing";
    $conn = mysqli_connect($db_server, 
                           $db_username, 
                           $db_password, 
                           $db_name);
    if($conn){
        $sql = "SET ROLE 'admin'";
        mysqli_query($conn, $sql);
        $sql = "SELECT * FROM departemen";
        $result = mysqli_query($conn, $sql);

        $fetched_data = array();

        while($rows = mysqli_fetch_assoc($result)){
            array_push($fetched_data, 
                    array("id_departemen" => $rows["id_departemen"],
                            "nama_departemen" => $rows["nama_departemen"],
                            "lokasi" => $rows["lokasi"]));
        }

        foreach($fetched_data as $row){
            echo "{$row["id_departemen"]} \t{$row["nama_departemen"]} \t{$row["lokasi"]} <br>";
        }
    }
    else{
        echo"username / password salah";
    }

    mysqli_close($conn);
?>