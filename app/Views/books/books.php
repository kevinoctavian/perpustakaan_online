<?php

use CodeIgniter\I18n\Time;
use Config\Auth;

/** @var Auth $auth */
$auth = config('Auth');

?>

<?= $this->extend($auth->views['layout']) ?>

<?= $this->section('title') ?>Perpustakaan Online<?= $this->endSection() ?>

<?= $this->section('main') ?>
<div class="heading">
  <h3>koleksi kami</h3>
  <p> <a href="/">home</a> / buku </p>
</div>

<section class="products">

  <h1 class="title">buku-buku</h1>

  <div class="box-container">
    <!-- <form action="" method="post" class="box">
      <img class="image" src="uploaded_img/" alt="">
      <div class="name"></div>
      <input type="number" min="1" name="product_quantity" value="1" class="qty">
      <input type="hidden" name="product_name" value="">
      <input type="hidden" name="product_price" value="">
      <input type="hidden" name="product_image" value="">
      <input type="submit" value="simpan" name="tambahkan" class="btn">
    </form> -->
    <?php foreach ($books as $key) : ?>
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
          <div class="time">
            <?php
            $time = Time::parse($key['created_at']);
            $humanize = $time->humanize();
            ?>
            <p><?= $humanize ?></p>
          </div>
        </div>
        <div class="buttons">
          <a class="btn">Pinjam buku</a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

</section>

<?= $this->endSection() ?>