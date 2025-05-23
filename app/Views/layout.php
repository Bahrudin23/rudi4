<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= esc($title ?? 'My Application') ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>" />
</head>
<body>
    <?= $this->include('navbar') ?>

    <div class="container">
        <?= $this->renderSection('content') ?>
    </div>
</body>
</html>