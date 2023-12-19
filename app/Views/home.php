<?php

use CodeIgniter\I18n\Time;
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
    <a href="about" class="white-btn">jelajahi lebih</a>
  </div>

</section>

<section class="products">

  <h1 class="title">Buku-buku</h1>

  <div class="box-container">
    <?php foreach ($books as $key) : ?>
      <div class="box">
        <div>
          <div class="image">
            <img src="<?= base_url($key['cover']) ?>" alt="">
          </div>
          <div class="name"><?= $key['title'] ?></div>
          <div class="price"><?= $key['quantity'] ?></div>
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

  <div class="load-more" style="margin-top: 2rem; text-align:center">
    <a href="books" class="option-btn">lihat lebih banyak</a>
  </div>
</section>

<section class="home-contact">
  <div class="content">
    <h3>Punya pertanyaan?</h3>
    <p>hubungi kontak kami untuk informasi yang lebih lanjut tentang perpustakaan kami</p>
    <a href="contact" class="white-btn">contact us</a>
  </div>
</section>


<?= $this->endSection() ?>