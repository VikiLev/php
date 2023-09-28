<?php
session_start();

if (!empty($_SESSION['users'])) {
    $users = $_SESSION['users'];
} else {
    $users = []; // Initialize an empty array
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
</head>
<body>
<h1>User List</h1>
<ul>
    <?php foreach ($users as $user): ?>
        <li>
            Name: <?php echo $user['name']; ?><br>
            Lastname: <?php echo $user['lastname']; ?><br>
            Email: <?php echo $user['email']; ?><br>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>
