<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Login Admin</h2><br>
    <form action="adminlogin.php" method="post">
        <label>Username:</label><br>
        <input type="text" name="username"><br>
        <label>Password:</label><br>
        <input type="text" name="password"><br>
        <input type="submit" name="login" value="login"><br>
    </form>
</body>
</html>

<?php
    if(isset($_POST["login"])){
        if(!empty($_POST["username"]) && !empty($_POST["password"])){
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["password"] = $_POST["password"];
            include("admin_config.php");
            header("Location: dashboard_karyawan.php");
        }
        else{
            echo"username / password kosong";
        }
    }
?>