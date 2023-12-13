<?php

$flash = session()->getFlashdata('current_input');

$username = '';
$fullname =  '';
$gender = 'L';
$phonenumber = '';

if ($flash) {
  $username = $flash['username'] ?? '';
  $fullname =  $flash['fullname'] ?? '';
  $gender = $flash['gender'] ?? '';
  $phonenumber = $flash['phone_number'] ?? '';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
  <title>Login Perpustakaan Online</title>
  <link rel="stylesheet" href="/css/loginform.css">
</head>

<body>
  <div class="container">
    <h2 class="register">Register</h2>
    <div class="card">
      <div class="card__cover_image">
        <img class="gambar-depan" src="/img/library.png">
      </div>
      <div class="card__content">
        <?php if (session('error') !== null) : ?>
          <div class="error" role="alert"><?= session('error') ?></div>
        <?php elseif (session('errors') !== null) : ?>
          <div class="error" role="alert">
            <?php if (is_array(session('errors'))) : ?>
              <?php foreach (session('errors') as $error) : ?>
                <?= $error ?>
                <br>
              <?php endforeach ?>
            <?php else : ?>
              <?= session('errors') ?>
            <?php endif ?>
          </div>
        <?php endif ?>

        <?php if (session('message') !== null) : ?>
          <div class="alert alert-success" role="alert"><?= session('message') ?></div>
        <?php endif ?>
        <form method="post" action=""> <!-- Menambahkan onsubmit dan return false -->
          <input required name="email" autocomplete="off" id="email" type="email" placeholder="email" value="<?= old('email') ?>">
          <input required name="username" autocomplete="off" id="username" type="text" placeholder="Username" value="<?= old('username') ?>">
          <input required name="fullname" type="text" id="fullName" placeholder="Nama Lengkap" value="<?= old('fullname') ?>">
          <input required name="phone_number" type="text" id="phoneNumber" maxlength="15" placeholder="Nomor Handphone" value="<?= old('phone_number') ?>">

          <input required name="password" autocomplete="off" type="password" minlength="8" id="password" placeholder="Password">
          <input required class="" name="password_confirm" autocomplete="off" type="password" minlength="8" id="confirmPassword" placeholder="Konfirmasi Password">
          <p class="password__notmatch hidden">Password doesn't match</p>

          <div class="mydict">
            <h5 class="kelamin">Jenis kelamin</h5>
            <div>
              <label>
                <input name="gender" type="radio" name="radio" <?= old('gender') == 'L' ? 'checked' : '' ?> value="L">
                <span>Laki-laki</span>
              </label>
              <label>
                <input name="gender" type="radio" name="radio" <?= old('gender') == 'P' ? 'checked' : '' ?> value="P">
                <span>Perempuan</span>
              </label>
            </div>
          </div>
          <button class="tombol-register" type="submit" id="registerButton" disabled>Register</button>
        </form>
        <div class="switch">
          <h5>Sudah punya akun?</h5>
          <a href="login">Login</a>
        </div>
      </div>
    </div>
  </div>

  <script src="/js/loginform.js"></script>
</body>

</html>