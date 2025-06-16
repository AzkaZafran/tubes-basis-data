<?php
    include("def_config.php");

    // Pagination settings
    $limit = 1000; // data per page
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    // Count total data
    // $sql = "SELECT COUNT(*) AS total FROM karyawan";
    // $total_query = mysqli_query($conn, $sql);
    // $total_row = mysqli_fetch_assoc($total_query);
    $total_data = 500000;
    $total_pages = ceil($total_data / $limit);

    // Fetch paginated data
    $sql = "SELECT * FROM karyawan LIMIT $limit OFFSET $offset";
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

<button><a href="?page=<?= (($page - 1) < 1) ? $page : ($page - 1) ?>">&lt&ltprev</a></button>
<?= $page ?>
<button><a href="?page=<?= (($page + 1) > $total_pages) ? $page : ($page + 1) ?>">next&gt&gt</a></button>

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