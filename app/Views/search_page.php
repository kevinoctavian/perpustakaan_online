<?php

use Config\Auth;

/** @var Auth $auth */
$auth = config('Auth');


// dd($search_books);
?>

<?= $this->extend($auth->views['layout']) ?>

<?= $this->section('title') ?>Search books | Perpustakaan Online<?= $this->endSection() ?>

<?= $this->section('main') ?>

<div class="heading">
  <h3>halaman pencarian</h3>
  <p> <a href="home">home</a> / pencarian </p>
</div>

<section class="search-form">
  <form action="" method="get">
    <input type="text" name="s" placeholder="cari buku..." class="box" value="<?= session()->getFlashdata('search') ?? '' ?>">
    <button type="submit" class="btn">Submit</button>
  </form>
</section>

<section class="products" style="padding-top: 0;">

  <div class="box-container">
    <?php if (count($search_books) !== 0) { ?>
      <?php foreach ($search_books as $book) : ?>
        <div class="box">
          <div>
            <div class="image"><img src="<?= base_url($book->cover) ?>" alt=""></div>
            <div class="name"> <?= $book->title ?></div>
            <div class="price"> <?= $book->quantity ?></div>
          </div>
          <div class="buttons">
            <a class="btn">Pinjam buku</a>
          </div>
        </div>
      <?php endforeach; ?>
      <!-- <form action="" method="post" class="box">
        <img src="uploaded_img/" alt="" class="image">
        <div class="name"></div>
        <div class="price">$/-</div>
        <input type="number" class="qty" name="product_quantity" min="1" value="1">
        <input type="hidden" name="product_name" value="">
        <input type="hidden" name="product_price" value="">
        <input type="hidden" name="product_image" value="">
        <input type="submit" class="btn" value="add to cart" name="add_to_cart">
      </form> -->
    <?php } else { ?>
      <p class="empty">cari sesuatu!</p>
    <?php } ?>
  </div>


</section>

<?= $this->endSection() ?>