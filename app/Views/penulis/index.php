<?= $this->extend('layout'); ?>

<?= $this->section('content'); ?>
<div class="container mt-4">
  <div class="row">
    <div class="col">
      <h1 class="mb-4">Daftar Penulis</h1>

      <!-- Form Pencarian -->
      <form action="" method="get">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Masukkan kata kunci" name="keyword" value="<?= esc($keyword); ?>">
          <button class="btn btn-outline-primary" type="submit" name="submit">Search</button>
        </div>
      </form>

      <!-- Tabel Data -->
      <table class="table table-bordered">
        <thead class="table-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1 + (10 * ($pageSekarang - 1)); ?>
          <?php foreach ($penulis as $p) : ?>
            <tr>
              <th scope="row"><?= $i++; ?></th>
              <td><?= esc($p['name']); ?></td>
              <td><?= esc($p['address']); ?></td>
              <td>
                <a href="<?= base_url('penulis/detail/' . $p['id']); ?>" class="btn btn-sm btn-success">Detail</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <!-- Pagination -->
<div class="d-flex justify-content-center mt-4">
  <?= $pager->links('penulis', 'penulis_pager'); ?>
</div>
<?= $this->endSection(); ?>
