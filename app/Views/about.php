<?php

use Config\Auth;

/** @var Auth $auth */
$auth = config('Auth');

?>

<?= $this->extend($auth->views['layout']) ?>

<?= $this->section('title') ?>Perpustakaan Online | About Us<?= $this->endSection() ?>

<?= $this->section('main') ?>

<div class="heading">
  <h3>tentang kami</h3>
  <p> <a href="/">home</a> / tentang </p>
</div>

<section class="about">

  <div class="flex">

    <div class="content">
      <h3>kelompok 3</h3>
      <p>Selamat datang di dunia bacaan yang tak terbatas di website kami, karya terbaru dari Kelompok III yang penuh semangat! Dengan bangga kami mempersembahkan platform online inovatif ini, didedikasikan untuk memenuhi hasrat literasi dan menginspirasi kegemaran membaca di kalangan semua kalangan.</p>
      <p>Kami berkomitmen untuk mendukung pengembangan literasi di semua kalangan. Melalui inisiatif kami, kami menyediakan akses gratis ke sumber daya literasi, memfasilitasi program membaca di sekolah-sekolah, dan berkolaborasi dengan penulis lokal untuk menciptakan konten yang relevan dan mendidik.</p>
    </div>

  </div>

</section>
<section class="authors">

  <h1 class="title">Autor</h1>

  <div class="box-container">

    <div class="box">
      <img src="img/RZA_9831.JPG" alt="">
      <div class="share">
        <a href="https://www.instagram.com/1bbnuuu/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA==" class="fab fa-instagram"></a>
      </div>
      <h3>Ibnu Rofik</h3>
    </div>

    <div class="box">
      <img src="img/AmbilLampiran.jpeg" alt="">
      <div class="share">
        <a href="https://www.instagram.com/kevin_octavian_/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA==" class="fab fa-instagram"></a>
      </div>
      <h3>Kevin Oktavian V.</h3>
    </div>

    <div class="box">
      <img src="img/Picsart_22-08-25_20-12-26-260.jpg" alt="">
      <div class="share">
        <a href="#" class="fab fa-instagram"></a>
      </div>
      <h3>Stevensensius</h3>
    </div>

    <div class="box">
      <img src="img/ryan.png" alt="">
      <div class="share">
        <a href="https://www.instagram.com/rynach_/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA=="></a>
      </div>
      <h3>Ryan Achmad</h3>
    </div>

    <div class="box">
      <img src="img/nando.JPG" alt="">
      <div class="share">
        <a href="https://www.instagram.com/justpassed_around/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA==" class="fab fa-instagram"></a>
      </div>
      <h3>Fernando Dayaduta</h3>
    </div>

    <div class="box">
      <img src="img/abel.jpg" alt="">
      <div class="share">
        <a href="https://www.instagram.com/agrv7_/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA==" class="fab fa-instagram"></a>
      </div>
      <h3>Agriva Abel P.</h3>
    </div>

  </div>

</section>

<?= $this->endSection() ?>