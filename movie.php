<?php
require_once "header.php";
require_once "libs/pdo.php";
require_once "libs/movie.php";

if (isset($_GET["id"])) {
    $id = (int)$_GET["id"];
    $movie = getMovieById($pdo, $id);
}
?>
<?php if (isset($_GET["id"]) && isset($movie) && $movie): ?>
    <h1><?= $movie["title"] ?></h1>
    <h2><?= $movie["summary"] ?></h2>
    <p><?= $movie["release_date"] ?></p>
<?php else: ?>
    <h1>Movie not found</h1>
<?php endif; ?>
<a href="index.php">Return to list</a>
<?php require_once "footer.php"; ?>