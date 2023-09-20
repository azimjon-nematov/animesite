<?php
include('../../db/createConnectionWithDB.php');
session_start();
function validateAndSanitize($data) {
    $data = trim($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

$anime_id = validateAndSanitize($_POST['anime_id']);
$genre_id = validateAndSanitize($_POST['genre_id']);


$stmt = $pdo->prepare("INSERT INTO `anime_genre` (`anime_id`, `genre_id`, `createDate`) VALUES (:anime_id, :genre_id, NOW()) ");

$stmt->bindParam(':anime_id', $anime_id);
$stmt->bindParam(':genre_id', $genre_id);
$stmt->execute();

header('Location: ../../anime_genre_list.php');
?>
