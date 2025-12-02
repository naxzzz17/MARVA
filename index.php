<?php
include 'koneksi.php';

$message = "";
if (isset($_POST['submit'])) {
    $tanggal    = $_POST['tanggal'];
    $nama       = $_POST['nama'];
    $onu_type   = $_POST['onu_type'];
    $sn         = $_POST['sn'];
    $error      = $_POST['error'];
    $keterangan = $_POST['keterangan'];

    $sql = "INSERT INTO tb_error (tanggal, nama, onu_type, sn, error, keterangan)
            VALUES ('$tanggal', '$nama', '$onu_type', '$sn', '$error', '$keterangan')";

    if (mysqli_query($conn, $sql)) {
        $message = "Data berhasil disimpan ke database.";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Input - PT MARVATEL</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>

<header>
    <img src="logo.jpeg" alt="Logo PT MARVATEL" />
    <h1>Input - PT MARVATEL</h1>
    <nav>
        <ul>
            <li><a href="index.php" class="active">Form Input</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
        </ul>
    </nav>
</header>

<form method="POST">
    <center><h2>Form Input Data ONT</h2></center>

    <label for="tanggal">Tanggal:</label>
    <input id="tanggal" type="date" name="tanggal" required />

    <label for="nama">Nama:</label>
    <input id="nama" type="text" name="nama" required />

    <label for="onu_type">ONU Type:</label>
    <select id="onu_type" name="onu_type" required>
        <option value="">--Pilih ONU Type--</option>
        <option value="HG8245H">HG8245H</option>
        <option value="ZXHN F660">ZXHN F660</option>
        <option value="AN5506-04-F">AN5506-04-F</option>
        <option value="EG8145V5">EG8145V5</option>
    </select>

    <label for="sn">Serial Number (SN):</label>
    <input id="sn" type="text" name="sn" required />

    <label for="error">Error:</label>
    <select id="error" name="error" required>
        <option value="">--Pilih Error--</option>
        <option value="LOS">LOS</option>
        <option value="LOF">LOF</option>
        <option value="PON Down">PON Down</option>
        <option value="Power Down">Power Down</option>
        <option value="OLT Offline">OLT Offline</option>
    </select>

    <label for="keterangan">Keterangan:</label>
    <textarea id="keterangan" name="keterangan" rows="4" required></textarea>

    <button type="submit" name="submit">Simpan Data</button>
</form>

<?php if (!empty($message)) : ?>
    <p class="message"><?= htmlspecialchars($message) ?></p>
<?php endif; ?>

</body>
</html>
