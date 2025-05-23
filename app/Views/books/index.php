<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<?php if(session()->getFlashdata('pesan')): ?>
    <div class="flash-message"><?= session()->getFlashdata('pesan'); ?></div>
<?php endif; ?>

<h2><?= $title ?></h2>

<table style="width:100%; border-collapse: collapse;">
    <thead>
        <tr style="background-color:#007bff; color:#fff;">
            <th style="padding:8px; border:1px solid #ddd;">No</th>
            <th style="padding:8px; border:1px solid #ddd;">Sampul</th>
            <th style="padding:8px; border:1px solid #ddd;">Judul</th>
            <th style="padding:8px; border:1px solid #ddd;">Penulis</th>
            <th style="padding:8px; border:1px solid #ddd;">Penerbit</th>
            <th style="padding:8px; border:1px solid #ddd;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; foreach($books as $book): ?>
        <tr>
            <td style="padding:8px; border:1px solid #ddd; text-align:center;"><?= $i++; ?></td>
            <td style="padding:8px; border:1px solid #ddd; text-align:center;">
                <img src="<?= base_url('uploads/'.$book['sampul']); ?>" alt="Sampul <?= esc($book['judul']); ?>" style="width:60px; border-radius:5px;">
            </td>
            <td style="padding:8px; border:1px solid #ddd;"><?= esc($book['judul']); ?></td>
            <td style="padding:8px; border:1px solid #ddd;"><?= esc($book['penulis']); ?></td>
            <td style="padding:8px; border:1px solid #ddd;"><?= esc($book['penerbit']); ?></td>
            <td style="padding:8px; border:1px solid #ddd; text-align:center;">
                <a href="<?= base_url('books/detail/'.$book['slug']); ?>" style="background:#007bff; color:#fff; padding:6px 12px; border-radius:4px; text-decoration:none;">Detail</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div style="margin-top:15px; text-align:right;">
    <a href="<?= base_url('books/create'); ?>" style="background:#28a745; color:#fff; padding:10px 20px; border-radius:5px; text-decoration:none; font-weight:bold;">Tambah Data</a>
</div>

<?= $this->endSection() ?>
