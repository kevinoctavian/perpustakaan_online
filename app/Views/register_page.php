<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Page</title>
</head>

<body>
  <?= session()->getFlashdata('error') ?>
  <form action="" method="post" style="display: flex; flex-direction: column; width: 60%;">
    <input style="padding: 10px 20px;" type="text" placeholder="type your username" name="username" />
    <input style="padding: 10px 20px;" type="email" placeholder="type your email" name="email" />
    <input style="padding: 10px 20px;" type="text" placeholder="type your phonenumber" name="phonenumber" maxlength="15" max="15" />
    <input style="padding: 10px 20px;" type="text" placeholder="type your password" name="password" />
    <input style="padding: 10px 20px;" type="submit" value="submit">
  </form>
</body>

</html>