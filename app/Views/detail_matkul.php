<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $matkul['nama'] ?></title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: white;
            color: #333;
            padding: 40px;
        }

        h2 {
            font-size: 24px;
            color: #2c3e50;
        }

        table {
            border-collapse: collapse;
            margin-top: 20px;
            width: 100%;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f4f4f4;
        }

        a {
            color: #2980b9;
            text-decoration: none;
        }

        a:hover {
            color: rgb(48, 172, 255);
        }
    </style>
</head>
<body>
    <?= $this->extend('layout') ?>

    <?= $this->section('content') ?>

    <h2><?= $matkul['nama'] ?></h2>
    <table>
        <tr><th>Hari</th><th>Jam</th><th>SKS</th><th>Dosen</th><th>Link Google Classroom</th></tr>
        <tr>
            <td><?= $matkul['hari'] ?></td>
            <td><?= $matkul['jam'] ?></td>
            <td><?= $matkul['sks'] ?></td>
            <td><?= $matkul['dosen'] ?></td>
            <td><a href="<?= $matkul['link_gc'] ?>" target="_blank">Klik Disini</a></td>
        </tr>
    </table>
</body>
</html>

<?= $this->endSection() ?>