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
    <input type="file" name="sampul" id="sampul" onchange="previewImage();">
    <div style="color:red;">
        <?= isset($validation) ? $validation->getError('sampul') : '' ?>
    </div>

    <img id="sampul-preview" src="#" alt="Preview Gambar" style="max-width: 100px; display: none;">

    <button type="submit">Simpan</button>
</form>

<script>
    function previewImage() {
        const file = document.getElementById('sampul').files[0];
        const reader = new FileReader();
        
        reader.onloadend = function () {
            const preview = document.getElementById('sampul-preview');
            preview.src = reader.result;
            preview.style.display = 'block';
        };
        
        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>

<?= $this->endSection() ?>