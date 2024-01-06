<?php
include_once("config.php");

// Retrieve user ID from the query parameter
$id = isset($_GET['id']) ? $_GET['id'] : 0;

// Fetch the user data from the database
$result = mysqli_query($mysqli, "SELECT * FROM user_profile WHERE id = $id");
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;700&display=swap');

        body {
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

        h1,
        p,
        .button {
            text-align: center;
            text-decoration: none;
            font-weight: 700;
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

        form {
            display: flex;
            flex-direction: column;
            padding: 20px;
            gap: 5px;
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
            <h1>User Profile</h1>

            <?php if ($user) : ?>
                <form>
                <p>ID: <?php echo $user['id']; ?></p>
                <p>Username: <?php echo $user['Username']; ?></p>
                <p>Nama: <?php echo $user['Nama']; ?></p>
                <p>E-mail: <?php echo $user['Email']; ?></p>
                <a class="button" href="user_edit.php?id=<?php echo $user['id']; ?>">Edit Profile</a>
                <a href="user_list.php" class="button">Back</a>  
              </form>
                <?php else : ?>
                <p>User not found</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

