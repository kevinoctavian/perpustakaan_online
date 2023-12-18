<?php

use Config\Auth;

/** @var Auth $auth */
$auth = config('Auth');

?>

<?= $this->extend($auth->views['admin_layout']) ?>

<?= $this->section('title') ?>Admin Page User Management | Perpustakaan Online<?= $this->endSection() ?>

<?= $this->section('main') ?>

<section class="users">

  <div class="title">
    <h1>User Accounts</h1>
    <a class="btn" href="#">Add User</a>
  </div>

  <div class="box-container">
    <table>
      <thead>
        <tr>
          <th>
            <h3>Id</h3>
          </th>
          <th>
            <h3>Username</h3>
          </th>
          <!-- <th>id</th> -->
          <th>
            <h3>Full Name</h3>
          </th>
          <th>
            <h3>Phone number</h3>
          </th>
          <th>
            <h3>Gender</h3>
          </th>
          <th>
            <h3>Action</h3>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($all_users as $key) : ?>
          <tr class="<?= $key['current_user'] ? 'active' : '' ?>">
            <td>
              <p><?= $key['id'] ?></p>
            </td>
            <td>
              <p><?= $key['username'] ?></p>
            </td>
            <td>
              <p><?= $key['fullname'] ?></p>
            </td>
            <td>
              <p><?= $key['phone_number'] ?></p>
            </td>
            <td>
              <p><?= $key['gender'] == "L" ? "Laki laki" : "Perempuan" ?></p>
            </td>
            <td class="action_table">
              <a href="#" class="option-btn">Update User</a>
              <a href="#" onclick="return confirm('delete this user?');" class="delete-btn">Delete User</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <?php foreach ($all_users as $key) : ?>
      <!-- <div class="box">
        <p> user id : <span><?= $key['id'] ?></span> </p>
        <p> username : <span><?= $key['username'] ?></span> </p>
        <p> fullname : <span><?= $key['fullname'] ?></span> </p>
        <p> phone number : <span><?= $key['phone_number'] ?></span> </p>
        <p> gender : <span style="color:red"><?= $key['gender'] ?></span> </p>
        <a href="#" onclick="return confirm('delete this user?');" class="delete-btn">delete user</a>
      </div> -->
    <?php endforeach; ?>
  </div>

</section>


<?= $this->endSection() ?>