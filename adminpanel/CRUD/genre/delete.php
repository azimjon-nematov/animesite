<?php
session_start();
include('../../db/createConnectionWithDB.php');
$id = $_GET['id'];
$sql = "delete from genre where id = $id";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$_SESSION['succes_message'] = 'Жанр успешно удален';
header('Location: ../../genre_list.php');
?>