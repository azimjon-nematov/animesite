<?php

include('../../db/createConnectionWithDB.php');

function validateAndSanitize($data) {
    $data = trim($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

$name = validateAndSanitize($_POST['name']);

if (empty($name)) {
    throw new Exception('Название должно быть заполненным.');
}

$stmt = $pdo->prepare("INSERT INTO `studio` (name, createDate) VALUES (:name, NOW())");
$stmt->bindParam(':name', $name);
$stmt->execute();
header('Location: ../../studio_list.php');