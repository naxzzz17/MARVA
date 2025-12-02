<?php
include 'koneksi.php';

// Ambil statistik jumlah error per ONU type
$stats = [];
$result_stat = mysqli_query($conn, "SELECT onu_type, error, COUNT(*) as total FROM tb_error GROUP BY onu_type, error");
while($row = mysqli_fetch_assoc($result_stat)) {
    $stats[$row['onu_type']][$row['error']] = $row['total'];
}

// Ambil semua data
$result_data = mysqli_query($conn, "SELECT * FROM tb_error ORDER BY tanggal DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Dashboard - PT MARVATEL</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>

<header>
    <img src="logo.jpeg" alt="Logo PT MARVATEL" />
    <h1>Dashboard - PT MARVATEL</h1>
    <nav>
        <ul>
            <li><a href="index.php">Form Input</a></li>
            <li><a href="dashboard.php" class="active">Dashboard</a></li>
        </ul>
    </nav>
</header>

<center><div class="dashboard-stats">
    <h2>Statistik Error per ONU Type</h2>
    <table>
        <thead>
        <tr>
            <th>ONU Type</th>
            <th>LOS</th>
            <th>LOF</th>
            <th>PON Down</th>
            <th>Power Down</th>
            <th>OLT Offline</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($stats as $onu=>$errs) : ?>
        <tr>
            <td><?= htmlspecialchars($onu) ?></td>
            <td><?= $errs['LOS'] ?? 0 ?></td>
            <td><?= $errs['LOF'] ?? 0 ?></td>
            <td><?= $errs['PON Down'] ?? 0 ?></td>
            <td><?= $errs['Power Down'] ?? 0 ?></td>
            <td><?= $errs['OLT Offline'] ?? 0 ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div></center>

<center><div style="overflow-x:auto; margin-top:30px; margin-bottom: 60px;">
    <h2>Data Error ONT</h2>
    <a href="export.php" class="export-btn">Export CSV</a>
    <table>
        <thead>
        <tr>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>ONU Type</th>
            <th>SN</th>
            <th>Error</th>
            <th>Keterangan</th>
        </tr>
        </thead>
        <tbody>
        <?php while($row = mysqli_fetch_assoc($result_data)) : ?>
        <tr>
            <td><?= htmlspecialchars($row['tanggal']) ?></td>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td><?= htmlspecialchars($row['onu_type']) ?></td>
            <td><?= htmlspecialchars($row['sn']) ?></td>
            <td><?= htmlspecialchars($row['error']) ?></td>
            <td><?= htmlspecialchars($row['keterangan']) ?></td>
        </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div></center>

</body>
</html>
