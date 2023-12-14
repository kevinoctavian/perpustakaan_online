<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $this->renderSection('title') ?></title>

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

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
        <p> new <a href="/login">login</a> | <a href="/register">register</a> </p>
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
          <a href="search_page" class="fas fa-search"></a>
          <div id="user-btn" class="fas fa-user"></div>
          <a href="cart"> <i class="fas fa-shopping-cart"></i> <span>()</span> </a>
        </div>

        <div class="user-box">
          <p>username : <span></span></p>
          <p>email : <span></span></p>
          <a href="logout.php" class="delete-btn">logout</a>
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
        <a href="home.php">home</a>
        <a href="about.php">about</a>
        <a href="shop.php">shop</a>
        <a href="contact.php">contact</a>
      </div>

      <div class="box">
        <h3>extra links</h3>
        <a href="login.php">login</a>
        <a href="register.php">register</a>
        <a href="cart.php">cart</a>
        <a href="orders.php">orders</a>
      </div>

      <div class="box">
        <h3>contact info</h3>
        <p> <i class="fas fa-phone"></i> +123-456-7890 </p>
        <p> <i class="fas fa-phone"></i> +111-222-3333 </p>
        <p> <i class="fas fa-envelope"></i> shaikhanas@gmail.com </p>
        <p> <i class="fas fa-map-marker-alt"></i> mumbai, india - 400104 </p>
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

  <?= $this->renderSection('pageScripts') ?>

</body>

</html>