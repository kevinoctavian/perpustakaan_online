<?php

use Config\Auth;

/** @var Auth $auth */
$auth = config('Auth');

?>

<?= $this->extend($auth->views['layout']) ?>

<?= $this->section('title') ?>Perpustakaan Online | Buku yang ini sudah kamu pinjam<?= $this->endSection() ?>

<?= $this->section('main') ?>
<section class="home">

  <div class="content">
    <h3>Buku ini sudah kamu pinjam</h3>
    <a href="/" class="white-btn">Kembali</a>
    <div style="padding-bottom: 10px;"></div>
    <form action="<?= base_url('borrow_book/' . $return_id . '/return') ?>" method="post">
      <button type="submit" class="btn">Kembalikan buku</button>
    </form>
  </div>

</section>
<?= $this->endSection() ?>