<?php require_once "header.php" ?>
<?php require_once "libs/pdo.php" ?>
<?php

function loginUser(PDO $pdo, string $email, string $password): bool
{
    $query = $pdo->prepare("SELECT * FROM user WHERE email = :email");
    $query->bindValue(':email', $email, PDO::PARAM_INT);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);





    if ($user &&  password_verify($password, $user['password'])) {
        session_regenerate_id(true);
        $_SESSION["email"] = $email;
        return true;
    } else {
        return false;
    }
}
if (isset($_POST["email"])) {

    $result = loginUser($pdo, $_POST["email"], $_POST["password"]);
    if ($result) {
        // header("Location:profile.php");
    }
}

?>



<?php if (isset($_SESSION["email"])): ?>
    <p>Connected user: <?= $_SESSION["email"] ?> <a href="logout.php">Logout</a></p>
<?php endif; ?>

<h1>Login</h1>
<form action="" method="post">
    <p>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
    </p>
    <p>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </p>
    <input type="submit" value="Login">
</form>
<?php if (isset($_POST["email"]) && isset($_POST["password"])): ?>
    <?php if (!$result): ?>
        <p>Invalid email user or password</p>
    <?php endif; ?>
<?php endif; ?>



<?php require_once "footer.php" ?>