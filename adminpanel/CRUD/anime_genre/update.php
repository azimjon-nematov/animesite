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
$id = $_POST['id'];


$stmt = $pdo->prepare("UPDATE anime_genre SET anime_id=:anime_id,genre_id=:genre_id, updateDate=NOW() WHERE id=:id");

$stmt->bindParam(':id', $id);
$stmt->bindParam(':anime_id', $anime_id);
$stmt->bindParam(':genre_id', $genre_id);
$stmt->execute();

header('Location: ../../anime_genre_list.php');
?>
