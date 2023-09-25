<?php
include('../../db/createConnectionWithDB.php');
$id = $_GET['id'];
$sql = "delete from anime where id = $id";
$stmt = $pdo->prepare($sql);
$stmt->execute();
echo "Данные успешно удалены!!!.";
header('Location: ../../anime_list.php');
?>