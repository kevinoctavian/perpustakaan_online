<?php

use Config\Auth;

/** @var Auth $auth */
$auth = config('Auth');

?>

<?= $this->extend($auth->views['layout']) ?>

<?= $this->section('title') ?>Perpustakaan Online | Contact us<?= $this->endSection() ?>

<?= $this->section('main') ?>

<div class="heading">
  <h3>hubungi kami</h3>
  <p> <a href="/">home</a> / hubungi </p>
</div>

<section class="contact">

  <form action="" method="post">
    <h3>katakan sesuatu!</h3>
    <input type="text" name="name" required placeholder="masukkan nama" class="box">
    <input type="email" name="email" required placeholder="masukkan email" class="box">
    <input type="number" name="number" required placeholder="masukkan nomor handphone" class="box">
    <textarea name="message" class="box" placeholder="ketik pesan-pesan" id="" cols="30" rows="10"></textarea>
    <input type="submit" value="kirim pesan" name="send" class="btn">
  </form>

</section>
<?= $this->endSection() ?>