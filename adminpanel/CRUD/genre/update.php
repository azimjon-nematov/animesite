<?php
session_start();
include('../../db/createConnectionWithDB.php');

function validateAndSanitize($data) {
    $data = trim($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

$name = validateAndSanitize($_POST['name']);
$id = validateAndSanitize($_POST['id']);

if (empty($name)) {
    $_SESSION['error_message'] = 'Название должно быть заполненным.';
    header('Location: ../../genre_edit_create_form.php');
    exit;
}

$stmt = $pdo->prepare("UPDATE genre SET name=:name,updateDate=NOW() WHERE id=:id");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':id', $id);
$stmt->execute();
header('Location: ../../genre_list.php');