<?php
function getMovies($pdo): array
{
    $query = $pdo->prepare("SELECT * FROM movie");
    $query->execute();
    $movies = $query->fetchAll(PDO::FETCH_ASSOC);
    return $movies;
}

function getMovieById(PDO $pdo, int $id): array|bool
{
    $query = $pdo->prepare("SELECT * FROM movie WHERE id = :id");
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}
