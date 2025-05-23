<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<h1>Bahrudin Rizky Ramadani</h1>
<p>Perkenalkan Nama saya Bahrudin Rizky Ramadani bisa dipanggil Rudi/Bahrudin</p>
<p>Alamat: Plemahan, Banyuarang, Ngoro, Jombang</p>
<p>Hobi: Gaming</p>
<p>Cita-cita: Membuat aplikasi/website untuk sekolah dan dusun</p>

<h2>Mata Kuliah</h2>
<ul>
    <?php foreach ($mata_kuliah as $mk): ?>
        <li><a href="<?= base_url('matkul/' . $mk['kode']) ?>"><?= $mk['kode'] ?> - <?= $mk['nama'] ?></a></li>
    <?php endforeach; ?>
</ul>

<br>
<h3>SKILL</h3>
<ol>
    <li>web desainer</li>
    <li>software desainer</li>
    <li>basis data</li>
</ol>

<a href="<?= base_url('contact') ?>" class="btn"><button>Contact Me</button></a>

<?= $this->endSection() ?>
