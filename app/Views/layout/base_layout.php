<?php
$user = auth()->user();
$isAdmin = false;

if ($user) {
  $isAdmin = $user->inGroup(
    'superadmin',
    'admin',
    'developer'
  );
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $this->renderSection('title') ?></title>

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <!-- custom css file link  -->
  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">

  <?= $this->renderSection('pageStyles') ?>

</head>

<body>
  <header class="header">

    <div class="header-1">
      <div class="flex">
        <div class="share">
          <a href="#" class="fab fa-facebook-f"></a>
          <a href="#" class="fab fa-twitter"></a>
          <a href="#" class="fab fa-instagram"></a>
          <a href="#" class="fab fa-linkedin"></a>
        </div>
        <?php if (auth()->loggedIn()) { ?>
          <div class="icons">
            <div id="user-btn" class="fas fa-user"></div>
          </div>
        <?php } else { ?>
          <p> new <a href="/login">login</a> | <a href="/register">register</a> </p>
        <?php }; ?>
      </div>
    </div>

    <div class="header-2">
      <div class="flex">
        <a href="/" class="logo">Perpustakaan Online</a>

        <nav class="navbar">
          <a href="/">home</a>
          <a href="about">tentang</a>
          <a href="books">buku</a>
          <a href="contact">kontak</a>
        </nav>

        <div class="icons">
          <div id="menu-btn" class="fas fa-bars"></div>
          <a href="search" class="fas fa-search"></a>
          <a href="borrow_book"><i class="fa-solid fa-book"></i></a>
        </div>

        <div class="user-box">
          <a class="btn" href="/profile/<?= auth()->id() ?>">My Profile</a>
          <?php if ($isAdmin) : ?>
            <a class="btn" href="/admin">Admin Page</a>
          <?php endif; ?>
          <a href="logout" class="delete-btn">logout</a>
        </div>
      </div>
    </div>

  </header>

  <main>
    <?= $this->renderSection('main') ?>
  </main>

  <section class="footer">

    <div class="box-container">

      <div class="box">
        <h3>quick links</h3>
        <a href="/">home</a>
        <a href="about">about</a>
        <a href="books">Books</a>
        <a href="contact">contact</a>
      </div>

      <div class="box">
        <h3>extra links</h3>
        <a href="login">login</a>
        <a href="register">register</a>
      </div>

      <div class="box">
        <h3>contact info</h3>
        <p> <i class="fas fa-envelope"></i> perpolsupport@gmail.com </p>
        <p> <i class="fas fa-map-marker-alt"></i> Palangkaraya, indonesia - +62 </p>
      </div>

      <div class="box">
        <h3>follow us</h3>
        <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
        <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
        <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
        <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
      </div>

    </div>

    <p class="credit"> &copy; copyright @ 2023 by <span>Kelompok 3</span> </p>

  </section>

  <!-- custom js file link  -->
  <script src="js/script.js"></script>
  <?= $this->renderSection('pageScripts') ?>

</body>

</html>