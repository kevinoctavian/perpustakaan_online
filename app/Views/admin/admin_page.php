<?php

use Config\Auth;

/** @var Auth $auth */
$auth = config('Auth');

?>

<?= $this->extend($auth->views['admin_layout']) ?>

<?= $this->section('title') ?>Admin Page | Perpustakaan Online<?= $this->endSection() ?>

<?= $this->section('main') ?>
<!-- admin dashboard section starts  -->

<section class="dashboard">

  <h1 class="title">dashboard</h1>

  <div class="box-container">

    <div class="box">

      <h3>$/-</h3>
      <p>total pendings</p>
    </div>

    <div class="box">
      <h3>$/-</h3>
      <p>completed payments</p>
    </div>

    <div class="box">
      <h3></h3>
      <p>order placed</p>
    </div>

    <div class="box">
      <h3></h3>
      <p>products added</p>
    </div>

    <div class="box">
      <h3></h3>
      <p>normal users</p>
    </div>

    <div class="box">
      <h3></h3>
      <p>admin users</p>
    </div>

    <div class="box">
      <h3></h3>
      <p>total accounts</p>
    </div>

    <div class="box">
      <h3></h3>
      <p>new messages</p>
    </div>

  </div>

</section>

<!-- admin dashboard section ends -->
<?= $this->endSection() ?>