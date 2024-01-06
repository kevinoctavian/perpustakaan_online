<?php
include_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Insert the new user into the database
    $insert_query = "INSERT INTO user_profile (Username, Nama, Email, Password) VALUES ('$username', '$nama', '$email', '$password')";
    mysqli_query($mysqli, $insert_query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <style>
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;700&display=swap');

body{
  margin: 0;
  padding: 0;
  min-height: 100vh;
  align-items: center;
  justify-content: center;
  display: flex;
  font-family: 'Plus Jakarta Sans', sans-serif;
}

.container {
  justify-content: center;
  align-items: center;
  height: 100%;
}

.card {
  width: 350px;
  background-color: rgb(255, 255, 255);
  overflow: hidden;
  border: 2px solid;
  border-radius: 10px;
}

form {
  display: flex;
  flex-direction: column;
  padding: 30px;
  gap: 10px;
}

button {
    border: none;
}

input {
  padding: 15px;
  border: none;
}

input:focus {
  outline: none;
  border-color: #3498db;
  background-color: white;
}

h1,
h5,
.button {
  text-align: center;
  text-decoration: none;
  font-weight: 700;
}
.forget {
  float: right;
}

.check {
  margin-top: 1px;
  float: left;
}
p, a {
  font-size: 12px;
  text-decoration: none;
}

.button {
  background-color: rgb(53, 53, 53);
  padding: 10px;
  color: white;
}
.button:hover {
  background-color: rgb(0, 0, 0);
  padding: 10px;
  color: white;
}

@media (max-width: 450px) {
  .card {
      width: 100%;
      max-width: 300px;
  }
}
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <form method="POST" action="add_user.php">
                <h1>Add User</h1>
                <input type="text" name="username" placeholder="Username">
                <input type="text" name="nama" placeholder="Nama">
                <input type="text" name="email" placeholder="E-mail">
                <input type="password" name="password" placeholder="Password">
                <button type="submit" class="button">Add User</button>
                <a href="user_list.php" class="button">Back</a>
            </form>
        </div>
    </div>
</body>
</html>
