<?php
$flash = session()->getFlashdata('current_input');

$username = '';
if ($flash) {
  $username = $flash['username'] ?? '';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
  <title>Login Perpustakaan Online</title>
  <link rel="stylesheet" href="/css/loginform.css">
</head>

<body>
  <div class="container">
    <h2 class="register">Selamat Datang di Perpustakaan Online</h2>
    <div class="card">
      <div class="card__cover_image">
        <img class="gambar-depan" src="/img/library.png">
      </div>
      <div class="card__content">
        <?php if (session()->getFlashdata('error')) : ?>
          <p class="error"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>
        <form action="" method="post">
          <input requireed name="username" type="text" placeholder="Username" value="<?= $username ?>">
          <input requireed name="password" type="password" placeholder="Password">
          <button class="tombol-register" type="submit">Login</button>
        </form>
        <div class="switch">
          <h5>Belum punya akun?</h5>
          <a href="register">Daftar</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>