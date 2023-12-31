<?php

include('../../db/createConnectionWithDB.php');

function validateAndSanitize($data) {
    $data = trim($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

$name = validateAndSanitize($_POST['name']);
$id = validateAndSanitize($_POST['id']);

if (empty($name)) {
    throw new Exception('Название должно быть заполненным.');
}

$stmt = $pdo->prepare("UPDATE studio SET name=:name,updateDate=NOW() WHERE id=:id");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':id', $id);
$stmt->execute();
header('Location: ../../studio_list.php');