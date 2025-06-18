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

    $sql = "SET ROLE '{$_SESSION['role']}'";
    if(mysqli_query($conn, $sql)){
        echo"masuk sebagai {$_SESSION['role']}";
    }

    $limit = 1000;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    $total_data = 500000;
    $total_pages = ceil($total_data / $limit);

    $sql = "SELECT * FROM gaji LIMIT $limit OFFSET $offset";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
    </style>
</head>
<body>

<h2>Dashboard Gaji</h2>
<a href="dashboard_karyawan.php">Karyawan</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="dashboard_kehadiran.php">Kehadiran</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="dashboard_gaji.php">Gaji</a><br>
<button><a href="?page=<?= (($page - 1) < 1) ? $page : ($page - 1) ?>">&lt;&lt;prev</a></button>
<?= $page ?>
<button><a href="?page=<?= (($page + 1) > $total_pages) ? $page : ($page + 1) ?>">next&gt;&gt;</a></button>

<table>
    <tr>
        <th>ID Gaji</th>
        <th>ID Karyawan</th>
        <th>Gaji Pokok</th>
        <th>Tunjangan</th>
        <th>Potongan</th>
        <th>Tanggal Pembayaran</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?= htmlspecialchars($row['id_gaji']) ?></td>
        <td><?= htmlspecialchars($row['id_karyawan']) ?></td>
        <td><?= htmlspecialchars($row['gaji_pokok']) ?></td>
        <td><?= htmlspecialchars($row['tunjangan']) ?></td>
        <td><?= htmlspecialchars($row['potongan']) ?></td>
        <td><?= htmlspecialchars($row['tanggal_pembayaran']) ?></td>
    </tr>
    <?php endwhile; ?>
</table>