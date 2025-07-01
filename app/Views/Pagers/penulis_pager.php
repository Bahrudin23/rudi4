<?php $pager->setSurroundCount(2); ?>

<div class="pagination-wrapper">
  <ul class="pagination">

    <?php if ($pager->hasPrevious()) : ?>
      <li class="page-item">
        <a class="page-link" href="<?= $pager->getFirst() ?>" aria-label="Halaman Pertama">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <li class="page-item">
        <a class="page-link" href="<?= $pager->getPrevious() ?>" aria-label="Sebelumnya">
          <span aria-hidden="true">&lsaquo;</span>
        </a>
      </li>
    <?php endif; ?>

    <?php foreach ($pager->links() as $link) : ?>
      <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
        <a class="page-link" href="<?= $link['uri'] ?>">
          <?= $link['title'] ?>
        </a>
      </li>
    <?php endforeach; ?>

    <?php if ($pager->hasNext()) : ?>
      <li class="page-item">
        <a class="page-link" href="<?= $pager->getNext() ?>" aria-label="Berikutnya">
          <span aria-hidden="true">&rsaquo;</span>
        </a>
      </li>
      <li class="page-item">
        <a class="page-link" href="<?= $pager->getLast() ?>" aria-label="Halaman Terakhir">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    <?php endif; ?>

  </ul>
</div>
