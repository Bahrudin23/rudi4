<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata</title>
</head>

<body>
    <?= $this->extend('layout') ?>

    <?= $this->section('content') ?>

    <h1>Biodata</h1>
    <p><strong>Nama:</strong> <?= $nama ?></p>
    <p><strong>Umur:</strong> <?= $umur ?></p>
    <p><strong>Alamat:</strong> <?= $alamat ?></p>
    <p><strong>Status:</strong> <?= $status ?></p>
</body>
</html>

<?= $this->endSection() ?>