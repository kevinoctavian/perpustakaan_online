<?php

use Config\Auth;

/** @var Auth $auth */
$auth = config('Auth');

?>

<?= $this->extend($auth->views['admin_layout']) ?>

<?= $this->section('title') ?>Admin Page User Management | Perpustakaan Online<?= $this->endSection() ?>

<?= $this->section('main') ?>

<section class="add-products">

  <div class="title">
    <h1>Book Lists</h1>
    <a class="btn" href="#">Add Book</a>
  </div>

  <!-- <form action="" method="post" enctype="multipart/form-data">
    <h3>add product</h3>
    <input type="text" name="name" class="box" placeholder="enter product name" required>
    <input type="number" min="0" name="price" class="box" placeholder="enter product price" required>
    <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
    <input type="submit" value="add product" name="add_product" class="btn">
  </form> -->

</section>

<!-- product CRUD section ends -->

<!-- show products  -->

<section class="show-products">
  <div class="box-container">
    <?php foreach ($books as $key) : ?>
      <div class="box">
        <img src="<?= base_url($key['cover']) ?>" alt="">
        <div class="name"><?= $key['title'] ?></div>
        <div class="price"><?= $key['quantity'] ?></div>
        <a href="#" class="option-btn">update</a>
        <a href="#" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
      </div>
    <?php endforeach; ?>
    <!-- echo '<p class="empty">no products added yet!</p>' -->
  </div>
</section>
<!-- 
<section class="edit-product-form">
  <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="update_p_id" value="">
    <input type="hidden" name="update_old_image" value="">
    <img src="uploaded_img/" alt="">
    <input type="text" name="update_name" value="" class="box" required placeholder="enter product name">
    <input type="number" name="update_price" value="" min="0" class="box" required placeholder="enter product price">
    <input type="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png">
    <input type="submit" value="update" name="update_product" class="btn">
    <input type="reset" value="cancel" id="close-update" class="option-btn">
  </form>
</section> -->

<?= $this->endSection() ?>