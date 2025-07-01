<?= $this->extend('layout'); ?>

<?= $this->section('content'); ?>
<div class="container mt-4">
  <div class="row">
    <div class="col">
      <h1 class="mb-4">Detail Penulis</h1>

      <table class="table table-bordered">
        <tr>
          <th>Nama</th>
          <td><?= esc($penulis['name']); ?></td>
        </tr>
        <tr>
          <th>Alamat</th>
          <td><?= esc($penulis['address']); ?></td>
        </tr>
        <tr>
          <th>Email</th>
          <td><?= esc($penulis['email'] ?? '-'); ?></td>
        </tr>
        <tr>
          <th>Telepon</th>
          <td><?= esc($penulis['phone'] ?? '-'); ?></td>
        </tr>
      </table>

      <a href="<?= base_url('penulis'); ?>" class="btn btn-secondary mt-3">Kembali ke Daftar</a>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>
