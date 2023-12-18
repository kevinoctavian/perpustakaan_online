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
        <form action="" method="post">
          <input requireed name="username_or_email" type="text" placeholder="Username or Email" value="<?= old('username_or_email') ?>">
          <input requireed name="password" type="password" placeholder="Password">
          <div class="remember__me">
            <input requireed name="remember" type="checkbox" id="rememberme">
            <label for="rememberme">Remember Me</label>
          </div>
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