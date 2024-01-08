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

  <div class="title">
    <h1>Dashboard</h1>
    <!-- <a class="btn" href="#">Add User</a> -->
  </div>

  <div class="box-container">

    <div class="box">
      <h3><?= $user_count ?></h3>
      <p>Total Users</p>
    </div>

    <div class="box">
      <h3><?= $book_count ?></h3>
      <p>Total Books</p>
    </div>


    <div class="box">
      <h3><?= $borrow_count ?></h3>
      <p>Total Books Borrowed</p>
    </div>


  </div>

</section>

<!-- admin dashboard section ends -->
<?= $this->endSection() ?>