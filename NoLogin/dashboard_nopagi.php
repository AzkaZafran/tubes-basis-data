<?php
    include("def_config.php");

    // Fetch paginated data
    $sql = "SELECT * FROM karyawan LIMIT 500001 OFFSET 0";
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

<h2>User Dashboard</h2>

<table>
    <tr>
        <th>ID Karyawan</th>
        <th>ID Departemen</th>
        <th>Nama</th>
        <th>Jabatan</th>
        <th>Tanggal Lahir</th>
        <th>Email</th>
        <th>No. Telp</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?= htmlspecialchars($row['id_karyawan']) ?></td>
        <td><?= htmlspecialchars($row['id_departemen']) ?></td>
        <td><?= htmlspecialchars($row['nama']) ?></td>
        <td><?= htmlspecialchars($row['jabatan']) ?></td>
        <td><?= htmlspecialchars($row['tanggal_lahir']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= htmlspecialchars($row['no_telepon']) ?></td>
    </tr>
    <?php endwhile; ?>
</table>