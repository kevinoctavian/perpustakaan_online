<?php

use Config\Auth;

/** @var Auth $auth */
$auth = config('Auth');

?>

<?= $this->extend($auth->views['admin_layout']) ?>

<?= $this->section('title') ?>Admin Page User Management | Perpustakaan Online<?= $this->endSection() ?>
<?= $this->section('pageStyles') ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<?= $this->endSection() ?>


<?= $this->section('main') ?>

<section class="add-products">

  <div class="title">
    <h1>Book Lists</h1>
    <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#addmodal">
      Add Books
    </button>
  </div>

</section>

<!-- product CRUD section ends -->

<!-- show products  -->

<section class="container-fluid pt-0 mt-0">
  <div class="row row-cols-2 row-cols-md-4 g-3">
    <?php foreach ($books as $key) : ?>
      <div class="col">
        <div class="card p-2" style="width: 18rem;">
          <img src="<?= base_url($key['cover']) ?>" class="card-img-top" alt="<?= $key['title'] ?>">
          <div class="card-body">
            <h5 class="card-title"><?= $key['title'] ?></h5>
            <p class="card-text">Total : <?= $key['quantity'] ?> Books left</p>
          </div>
          <div class="card-footer d-flex justify-content-around">
            <button type="button" class="btn btn-secondary my-2 my-md-0 mx-md-1" data-bs-toggle="modal" data-bs-target="#updatemodal">
              Update Book
            </button>
            <button type="button" class="btn btn-danger my-2 my-md-0 mx-md-1" data-bs-toggle="modal" data-bs-target="#deletemodal">
              Delete Book
            </button>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- Modal update -->
  <div class="modal fade" id="updatemodal" tabindex="-1" aria-labelledby="updatemodalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updatemodalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="update-book">
            <div class="form-floating mb-3">
              <input name="" type="text" class="form-control" id="floatingInput" placeholder="">
              <label for="floatingInput">Title</label>
            </div>
            <div class="d-flex align-items-center mb-3">

              <div class="form-floating">
                <input name="" type="text" class="form-control" id="floatingInput" placeholder="">
                <label for="floatingInput">Cover</label>
              </div>

              <div class="ms-2">
                <input class="form-control" type="file" id="formFile">
              </div>
            </div>
            <div class="form-floating mb-3">
              <input name="" type="text" class="form-control" id="floatingInput" placeholder="">
              <label for="floatingInput">Publisher</label>
            </div>
            <div class="form-floating mb-3">
              <input name="" type="text" class="form-control" id="floatingInput" placeholder="">
              <label for="floatingInput">Author</label>
            </div>
            <div class="form-floating mb-3">
              <input name="" type="number" class="form-control" id="floatingInput" placeholder="">
              <label for="floatingInput">Quantity</label>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Add -->
  <div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="addmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addmodalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="add-book">
            <div class="form-floating mb-3">
              <input name="" type="text" class="form-control" id="floatingInput" placeholder="">
              <label for="floatingInput">Title</label>
            </div>
            <div class="d-flex align-items-center mb-3">

              <div class="form-floating">
                <input name="" type="text" class="form-control" id="floatingInput" placeholder="">
                <label for="floatingInput">Cover</label>
              </div>

              <div class="ms-2">
                <input class="form-control" type="file" id="formFile">
              </div>
            </div>
            <div class="form-floating mb-3">
              <input name="" type="text" class="form-control" id="floatingInput" placeholder="">
              <label for="floatingInput">Publisher</label>
            </div>
            <div class="form-floating mb-3">
              <input name="" type="text" class="form-control" id="floatingInput" placeholder="">
              <label for="floatingInput">Author</label>
            </div>
            <div class="form-floating mb-3">
              <input name="" type="number" class="form-control" id="floatingInput" placeholder="">
              <label for="floatingInput">Quantity</label>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal delete -->
  <div class="modal fade" id="deletemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deletemodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form action="">
          <div class="modal-header">
            <h5 class="modal-title" id="deletemodalLabel">Are you sure to delete this user</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
              <label class="form-check-label" for="flexCheckIndeterminate">
                Delete Permanenly?
              </label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Understood</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>


<?= $this->endSection() ?>

<?= $this->section('pageScripts') ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<?= $this->endSection() ?>
