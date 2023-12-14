<?php

use Config\Auth;

/** @var Auth $auth */
$auth = config('Auth');

?>

<?= $this->extend($auth->views['admin_layout']) ?>

<?= $this->section('title') ?>Admin Page User Management | Perpustakaan Online<?= $this->endSection() ?>

<?= $this->section('main') ?>

<section class="users">

  <h1 class="title"> user accounts </h1>

  <div class="box-container">
    <?php foreach ($all_users as $key) : ?>
      <div class="box">
        <p> user id : <span><?= $key['id'] ?></span> </p>
        <p> username : <span><?= $key['username'] ?></span> </p>
        <p> fullname : <span><?= $key['fullname'] ?></span> </p>
        <p> phone number : <span><?= $key['phone_number'] ?></span> </p>
        <p> gender : <span style="color:red"><?= $key['gender'] ?></span> </p>
        <a href="#" onclick="return confirm('delete this user?');" class="delete-btn">delete user</a>
      </div>
    <?php endforeach; ?>
  </div>

</section>


<?= $this->endSection() ?>