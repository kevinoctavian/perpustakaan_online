<?php

use Config\Auth;

/** @var Auth $auth */
$auth = config('Auth');

?>

<?= $this->extend($auth->views['layout']) ?>

<?= $this->section('title') ?>Perpustakaan Online<?= $this->endSection() ?>

<?= $this->section('main') ?>
<section class="home">

  <div class="content">
    <h3>selamat datang diperpustakaan kami</h3>
    <p>Selamat datang di Perpustakaan Online kami!
      Temukan buku terbaru dan sumber daya penelitian
      yang memperkaya pengetahuan Anda di sini..</p>
    <a href="about.php" class="white-btn">jelajahi lebih</a>
  </div>

</section>

<section class="products">

  <h1 class="title">Buku-buku</h1>

  <div class="box-container">


  </div>

  <div class="load-more" style="margin-top: 2rem; text-align:center">
    <a href="shop.php" class="option-btn">lihat lebih banyak</a>
  </div>

</section>

<section class="home-contact">

  <div class="content">
    <h3>Punya pertanyaan?</h3>
    <p>hubungi kontak kami untuk informasi yang lebih lanjut tentang perpustakaan kami</p>
    <a href="contact.php" class="white-btn">contact us</a>
  </div>

</section>

<!-- custom js file link  -->
<script src="js/script.js"></script>
<?= $this->endSection() ?>