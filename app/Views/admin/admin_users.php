<?php

use Config\Auth;

/** @var Auth $auth */
$auth = config('Auth');

$current_user = auth()->user()->id;
?>

<?= $this->extend($auth->views['admin_layout']) ?>

<?= $this->section('title') ?>Admin Page User Management | Perpustakaan Online<?= $this->endSection() ?>
<?= $this->section('pageStyles') ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<?= $this->endSection() ?>

<?= $this->section('main') ?>

<section class="users">

  <div class="title">
    <h1>User Accounts</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#addmodal">
      Add Users
    </button>
  </div>

  <div class="box-container">
    <table class="table table-striped table-hover table-bordered ">
      <thead>
        <tr>
          <th>
            Id
          </th>
          <th>
            Username
          </th>
          <!-- <th>id</th> -->
          <th>
            Full Name
          </th>
          <th>
            Phone number
          </th>
          <th>
            Gender
          </th>
          <th>
            Action
          </th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($all_users as $key) : ?>
          <tr class="<?= $key['current_user'] ? 'table-active' : '' ?>">
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
            <td>
              <!-- Button trigger modal -->
              <button type="button" id='updateuser' data-userid=<?= $key['id'] ?> class="btn btn-info my-2 my-md-0 mx-md-1">
                Update User
              </button>
              <button type="button" id="deleteuser" class="btn btn-<?= $key['id'] == $current_user ? 'secondary' : 'danger' ?> my-2 my-md-0 mx-md-1" data-userid=<?= $key['id'] ?> <?= $key['id'] != $current_user ? 'enable' : 'disable' ?>>
                Delete User
              </button>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- Modal update-->
  <div class="modal fade" id="updatemodal" tabindex="-1" aria-labelledby="updatemodalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updatemodalLabel">Modal title</h5>
          <br />
          <p class="text-danger">*Jika tidak ingin ubah silahkan kosongkan</p>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="update-user">
            <div class="input-group mb-3">
              <input name="email" type="text" class="form-control" placeholder="type your email" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <span class="input-group-text" id="basic-addon2">@gmail.com</span>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">@</span>
              <input name="username" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="form-floating mb-3">
              <input name="fullname" type="text" class="form-control" id="floatingInput" placeholder="Fullname">
              <label for="floatingInput">Fullname</label>
            </div>
            <div class="form-floating mb-3">
              <input name="phone_number" type="text" class="form-control" id="floatingInput" placeholder="Phone Number">
              <label for="floatingInput">Phone Number</label>
            </div>
            <div class="form-floating mb-3">
              <input name="password" type="password" class="form-control" id="floatingInput" placeholder="Password">
              <label for="floatingInput">Password</label>
            </div>
            <div class="d-flex justify-content-center">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="L">
                <label class="form-check-label" for="inlineRadio1">Laki Laki</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="P">
                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
          <button id="submitchanges" type="button" class="btn btn-info">Ubah</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal add -->
  <div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="addmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="add-user" method="post">
          <div class="modal-header">
            <h5 class="modal-title" id="addmodalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p class="text-danger">Perhatian! Email tidak dapat diubah setelah pembuatan</p>
            <div class="input-group mb-3">
              <input name="email" type="text" class="form-control" placeholder="type your email" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <span class="input-group-text" id="basic-addon2">@gmail.com</span>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">@</span>
              <input name="username" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="form-floating mb-3">
              <input name="fullname" type="text" class="form-control" id="floatingInput" placeholder="Fullname">
              <label for="floatingInput">Fullname</label>
            </div>
            <div class="form-floating mb-3">
              <input name="phone_number" type="text" class="form-control" id="floatingInput" placeholder="Phone Number">
              <label for="floatingInput">Phone Number</label>
            </div>
            <div class="form-floating mb-3">
              <input name="password" type="password" class="form-control" id="floatingInput" placeholder="Password">
              <label for="floatingInput">Password</label>
            </div>
            <div class="d-flex justify-content-center">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="L">
                <label class="form-check-label" for="inlineRadio1">Laki Laki</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="P">
                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-info" data-bs-dismiss="modal">Buat Akun</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal delete -->
  <div class="modal fade" id="deletemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deletemodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deletemodalLabel">Are you sure to delete this user</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" checked id="deletepermanent">
            <label class="form-check-label" for="flexCheckIndeterminate">
              Delete Permanenly?
            </label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button id="deleteuser" type="button" class="btn btn-primary">I agree</button>
        </div>
      </div>
    </div>
  </div>

</section>

<?= $this->endSection() ?>

<?= $this->section('pageScripts') ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="<?= base_url('js/admin_CRUD.js') ?>"></script>
<?= $this->endSection() ?>