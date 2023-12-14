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

    <div class="image">
      <img src="img/about-img.jpg" alt="">
    </div>

    <div class="content">
      <h3>kelompok 3</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet voluptatibus aut hic molestias, reiciendis natus fuga, cumque excepturi veniam ratione iure. Excepturi fugiat placeat iusto facere id officia assumenda temporibus?</p>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit quos enim minima ipsa dicta officia corporis ratione saepe sed adipisci?</p>
      <a href="contact.php" class="btn">hubungi kami</a>
    </div>

  </div>

</section>
<section class="authors">

  <h1 class="title">greate authors</h1>

  <div class="box-container">

    <div class="box">
      <img src="img/RZA_9831.JPG" alt="">
      <div class="share">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-linkedin"></a>
      </div>
      <h3>Ibnu Rofik</h3>
    </div>

    <div class="box">
      <img src="img/AmbilLampiran.jpeg" alt="">
      <div class="share">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-linkedin"></a>
      </div>
      <h3>Kevin Oktavian V.</h3>
    </div>

    <div class="box">
      <img src="img/Picsart_22-08-25_20-12-26-260.jpg" alt="">
      <div class="share">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-linkedin"></a>
      </div>
      <h3>Stevensensius</h3>
    </div>

    <div class="box">
      <img src="img/author-4.jpg" alt="">
      <div class="share">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-linkedin"></a>
      </div>
      <h3>john deo</h3>
    </div>

    <div class="box">
      <img src="img/author-5.jpg" alt="">
      <div class="share">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-linkedin"></a>
      </div>
      <h3>john deo</h3>
    </div>

    <div class="box">
      <img src="img/author-6.jpg" alt="">
      <div class="share">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-linkedin"></a>
      </div>
      <h3>john deo</h3>
    </div>

  </div>

</section>

<?= $this->endSection() ?>