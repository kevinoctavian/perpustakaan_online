<?php

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
    <form action="" method="post" class="box">
      <img class="image" src="uploaded_img/" alt="">
      <div class="name"></div>
      <input type="number" min="1" name="product_quantity" value="1" class="qty">
      <input type="hidden" name="product_name" value="">
      <input type="hidden" name="product_price" value="">
      <input type="hidden" name="product_image" value="">
      <input type="submit" value="simpan" name="tambahkan" class="btn">
    </form>
  </div>

</section>

<?= $this->endSection() ?>