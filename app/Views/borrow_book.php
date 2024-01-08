<?php

use Config\Auth;
use CodeIgniter\I18n\Time;


/** @var Auth $auth */
$auth = config('Auth');

?>

<?= $this->extend($auth->views['layout']) ?>

<?= $this->section('title') ?>Perpustakaan Online | Buku yang dipinjam<?= $this->endSection() ?>

<?= $this->section('main') ?>
<section class="products">

  <h1 class="title">Buku-buku</h1>

  <div class="box-container">
    <?php foreach ($borrowed_book as $key) : ?>
      <div class="box">
        <div>
          <div class="image">
            <img src="<?= base_url($key['cover']) ?>" alt="">
          </div>
          <div class="name"><?= $key['title'] ?></div>
          <div class="price"><i class="fa-duotone fa-book-atlas"></i> <?= $key['quantity'] ?></div>
          <div class="details">
            <p><?= $key['publisher'] ?></p>
            <p><?= $key['author'] ?></p>
          </div>
        </div>
        <div class="buttons">
          <?php if ($key['is_returned'] == '0') { ?>
            <form action="<?= base_url('borrow_book/' . $key['borrowing_id'] . '/return') ?>" method="post">
              <button type="submit" class="btn">Kembalikan buku</button>
            </form>
          <?php } else { ?>
            <div class="name">
              <p>Buku telah dikembalikan</p>
            </div>
          <?php } ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('pageScripts') ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="<?= base_url('js/admin_CRUD.js') ?>"></script>
<?= $this->endSection() ?>