<?php
include('../../db/createConnectionWithDB.php');
session_start(); 


function validateAndSanitize($data) {
    $data = trim($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

$title = validateAndSanitize($_POST['title']);
$anime_id = validateAndSanitize($_POST['anime_id']);
$order = validateAndSanitize($_POST['order']);


if (empty($title)) {
    $_SESSION['error_message'] = 'Заголовок должны быть заполнены.';
    header('Location: ../../season_create_form.php');
    exit;
}

if (!is_numeric($anime_id)) {
    $_SESSION['error_message'] = 'ID студии должен быть числом.';
    header('Location: ../../season_create_form.php');
    exit;
}



if (!is_numeric($order)) {
    $_SESSION['error_message'] = 'Возрастное ограничение должно быть числом.';
    header('Location: ../../season_create_form.php');
    exit;
}



$stmt = $pdo->prepare("INSERT INTO `season` (`title`, `anime_id`, `order`, `createDate`)
    VALUES (:title, :anime_id, :order, NOW())");

$stmt->bindParam(':title', $title);
$stmt->bindParam(':anime_id', $anime_id);
$stmt->bindParam(':order', $order);
$stmt->execute();

header('Location: ../../season_list.php');
?>
