<?php
session_start();
include('../../db/createConnectionWithDB.php');

function validateAndSanitize($data) {
    $data = trim($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

$name = validateAndSanitize($_POST['name']);

if (empty($name)) {
    $_SESSION['error_message'] = 'Название должно быть заполненным.';
    header('Location: ../../genre_create_form.php');
    exit;
}

$stmt = $pdo->prepare("INSERT INTO `genre` (name, createDate) VALUES (:name, NOW())");
$stmt->bindParam(':name', $name);
$stmt->execute();
header('Location: ../../genre_list.php');