<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ul>
        <li><a href="index.php">Home</a></li>


        <?php if (isset($_SESSION["email"])): ?>
            <li><a href="profile.php">profile</a></li>
            <li><a href="logout.php">logout</a></li>
        <?php else: ?>
            <li><a href="login.php">login</a></li>
            <li><a href="signup.php">signup</a></li>
        <?php endif; ?>
    </ul>