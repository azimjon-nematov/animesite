<?php
include('../../db/createConnectionWithDB.php');
$id = $_GET['id'];
$sql = "delete from anime_genre where id = $id";
$stmt = $pdo->prepare($sql);
$stmt->execute();

header('Location: ../../anime_genre_list.php');
?>