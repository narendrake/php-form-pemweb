<?php
session_start();
if (!isset($_SESSION['formData'])) {
    echo "Data tidak tersedia. <a href='form.php'>Kembali ke Form</a>";
    exit;
}

$formData = $_SESSION['formData'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Hasil Pendaftaran</h2>
        <table>
            <tr>
                <th>Field</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>Nama</td>
                <td><?= htmlspecialchars($formData['name']) ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?= htmlspecialchars($formData['email']) ?></td>
            </tr>
            <tr>
                <td>Usia</td>
                <td><?= htmlspecialchars($formData['age']) ?></td>
            </tr>
            <tr>
                <td>Browser/OS</td>
                <td><?= htmlspecialchars($formData['userAgent']) ?></td>
            </tr>
        </table>

        <h3>Isi File:</h3>
        <table>
            <tr>
                <th>Baris</th>
                <th>Konten</th>
            </tr>
            <?php foreach ($formData['lines'] as $index => $line): ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= htmlspecialchars($line) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
