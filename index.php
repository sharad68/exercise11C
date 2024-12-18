<?php

require_once "libs/pdo.php";
require_once "libs/movie.php";

$movies = getMovies($pdo);

?>
<?php require_once "header.php"; ?>
<section>
    <?php foreach ($movies as $index => $movie): ?>
        <article>
            <h2><?= $movie["title"] ?></h2>

            <a href="movie.php?id=<?= $movie["id"] ?>">Read More</a>
        </article>
    <?php endforeach; ?>
</section>


<?php require_once "footer.php"; ?>