<?php
include('../../db/createConnectionWithDB.php');
$id = $_GET['id'];
$sql = "delete from studio where id = $id";
$stmt = $pdo->prepare($sql);
$stmt->execute();
echo "Данные успешно удалены!!!.";
header('Location: ../../studio_list.php');
?>