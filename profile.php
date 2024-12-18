<?php
require_once "header.php";
if (!isset($_SESSION["email"])) {
    header("Location: login.php");
}

?>
<h1>Profile</h1>
<h2>Your email : <?= $_SESSION["email"] ?></h2>
<?php require_once "footer.php" ?>