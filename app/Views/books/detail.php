<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<h2><?= $title ?></h2>

<div style="display:flex; gap:20px; align-items:flex-start; margin-top:20px;">

    <div>
        <!-- Gambar thumbnail yang bisa diklik -->
        <img id="sampulImg" src="<?= base_url('uploads/'.$book['sampul']); ?>" alt="<?= esc($book['judul']); ?>" style="width:300px; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.15); cursor:pointer;">
    </div>

    <div style="flex-grow:1; font-size:18px; color:#333;">
        <p style="font-weight:bold; font-size:24px; margin-bottom:15px;"><?= esc($book['judul']); ?></p>
        <p><strong>Penulis:</strong> <?= esc($book['penulis']); ?></p>
        <p><strong>Penerbit:</strong> <?= esc($book['penerbit']); ?></p>

        <div style="margin-top:30px;">
            <a href="<?= base_url('books/edit/'.$book['slug']); ?>">
                <button class="edit-btn" type="button">Edit</button>
            </a>
            <form action="<?= base_url('books/delete/'.$book['id']); ?>" method="post" style="display:inline;" onsubmit="return confirm('Yakin ingin hapus data ini?');">
                <?= csrf_field(); ?>
                <button class="delete-btn" type="submit">Hapus</button>
            </form>
        </div>
    </div>
</div>

<div style="margin-top:40px;">
    <a href="<?= base_url('books'); ?>" style="text-decoration:none; color:#dc3545;">&larr; Kembali ke daftar buku</a>
</div>

<!-- Modal untuk gambar -->
<div id="modalImg" style="display:none; position:fixed; z-index:9999; padding-top:60px; left:0; top:0; width:100%; height:100%; overflow:auto; background-color:rgba(0,0,0,0.8);">
    <span id="closeModal" style="position:absolute; top:20px; right:35px; color:#fff; font-size:40px; font-weight:bold; cursor:pointer; z-index:10001;">&times;</span>
    <img id="modalContent" style="margin:auto; display:block; max-width:90%; max-height:80vh; border-radius:8px; box-shadow:0 0 20px rgba(255,255,255,0.3); position:relative; z-index:10000;">
</div>

<script>
    const modal = document.getElementById('modalImg');
    const img = document.getElementById('sampulImg');
    const modalImg = document.getElementById('modalContent');
    const closeBtn = document.getElementById('closeModal');

    img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
    }

    closeBtn.onclick = function(e){
        e.stopPropagation();
        modal.style.display = "none";
    }

    modal.onclick = function(e){
        if(e.target === modal){
            modal.style.display = "none";
        }
    }
</script>

<?= $this->endSection() ?>
