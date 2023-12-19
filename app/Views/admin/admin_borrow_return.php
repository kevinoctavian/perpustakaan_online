<?php

use Config\Auth;

/** @var Auth $auth */
$auth = config('Auth');

?>

<?= $this->extend($auth->views['admin_layout']) ?>

<?= $this->section('title') ?>Admin Page | Perpustakaan Online<?= $this->endSection() ?>

<?= $this->section('main') ?>
<!-- admin dashboard section starts  -->

<section class="orders">

  <div class="title">
    <h1>User Borrow</h1>
  </div>


  <div class="box-container">

  </div>

</section>

<?= $this->endSection() ?>
