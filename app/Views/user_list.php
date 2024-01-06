<?php
include_once("config.php");

// Fetch all users from the database
$result = mysqli_query($mysqli, "SELECT * FROM user_profile ORDER BY id DESC");

// Check if there are any users
if ($result) {
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $users = array(); // Set an empty array if no users are found
}

// Handle user deletion
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];
    
    // Perform the delete query
    mysqli_query($mysqli, "DELETE FROM user_profile WHERE id = $deleteId");
    
    // Redirect to refresh the page after deletion
    header("Location: user_list.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
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
            background-color: #f5f5f5; /* Added a light background color */
        }

        .container {
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .user-list {
            width: 80%;
            max-width: 600px;
            background-color: #fff;
            border: 2px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: auto;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }

        a:hover {
            color: #1e87d5;
        }

        .add-button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: rgb(0, 0, 0);
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .add-button:hover {
            background-color: black;
        }

        .delete-button {
            background-color: #e74c3c;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .delete-button:hover {
            background-color: rgb(0, 0, 0);
        }
    </style>
</head>
<body>
    <div class="user-list">
        <h1>User List</h1>
        <ul>
            <?php foreach ($users as $user) : ?>
                <li>
                    <a href="user_profile.php?id=<?php echo $user['id']; ?>"><?php echo $user['Username']; ?></a>
                    <button class="delete-button" onclick="deleteUser(<?php echo $user['id']; ?>)">Delete</button>
                </li>
            <?php endforeach; ?>
        </ul>
        <a class="add-button" href="add_user.php">Add New User</a>
    </div>

    <script>
        function deleteUser(userId) {
            if (confirm("Are you sure you want to delete this user?")) {
                window.location.href = 'user_list.php?delete_id=' + userId;
            }
        }
    </script>
</body>
</html>
