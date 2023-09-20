<?php

include('db/createConnectionWithDB.php');

$sql = "SELECT * FROM anime_genre";
$stmt = $pdo->query($sql);
$anime_genres = $stmt->fetchAll(PDO::FETCH_ASSOC);
