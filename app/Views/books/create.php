<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<h2><?= $title; ?></h2>

<?php if(session()->getFlashdata('error')): ?>
    <p style="color:red;"><?= session()->getFlashdata('error'); ?></p>
<?php endif; ?>

<form action="<?= base_url('books/save'); ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>

    <label for="judul">Judul</label>
    <input type="text" name="judul" id="judul" value="<?= old('judul'); ?>">
    <div style="color:red;">
        <?= isset($validation) ? $validation->getError('judul') : '' ?>
    </div>

    <label for="penulis">Penulis</label>
    <input type="text" name="penulis" id="penulis" value="<?= old('penulis'); ?>">
    <div style="color:red;">
        <?= isset($validation) ? $validation->getError('penulis') : '' ?>
    </div>

    <label for="penerbit">Penerbit</label>
    <input type="text" name="penerbit" id="penerbit" value="<?= old('penerbit'); ?>">
    <div style="color:red;">
        <?= isset($validation) ? $validation->getError('penerbit') : '' ?>
    </div>

    <label for="sampul">Sampul (jpg/png max 2MB)</label>
    <input type="file" name="sampul" id="sampul">
    <div style="color:red;">
        <?= isset($validation) ? $validation->getError('sampul') : '' ?>
    </div>

    <button type="submit">Simpan</button>
</form>

<?= $this->endSection() ?>