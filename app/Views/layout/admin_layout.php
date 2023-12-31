<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $this->renderSection('title') ?></title>

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <!-- custom css file link  -->
  <link rel="stylesheet" href="<?= base_url('css/admin_style.css') ?>">

  <?= $this->renderSection('pageStyles') ?>
  
  <script>
    const CURRENT_USER = <?= auth()->user()->id?>;
    const CURRENT_BASE = '<?= base_url() ?>';
  </script>

</head>

<body>

  <header class="header">

    <div class="flex">

      <a href="/admin" class="logo">Admin<span>Panel</span></a>

      <nav class="navbar">
        <a href="/">Back to Home</a>
        <a href="/admin">Admin</a>
        <a href="/admin/users">Users</a>
        <a href="/admin/books">Books</a>
        <a href="/admin/recap">User Borrow</a>
      </nav>

      <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
        <p>username : <?= auth()->user()->username ?></span></p>
        <a href="/logout" class="delete-btn">logout</a>
      </div>

    </div>

  </header>

  <main>
    <?= $this->renderSection('main') ?>
  </main>

  <script src="/js/admin_script.js"></script>
  <?= $this->renderSection('pageScripts') ?>

</body>

</html>
