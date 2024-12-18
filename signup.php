<?php require_once "header.php" ?>

<h1>signup</h1>
<form action="" method="post">
    <p>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
    </p>
    <p>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </p>
    <input type="submit" value="Signup">
</form>

<?php
$query = $pdo->prepare("INSERT INTO user (email, password)
                            VALUES (:email, :password)");
$query->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
$query->bindValue(':password', $hash, PDO::PARAM_STR);
$result = $query->execute();
