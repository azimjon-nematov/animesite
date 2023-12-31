<?php
include('../../db/createConnectionWithDB.php');
session_start(); 

// var_dump($_POST);
// die();
function validateAndSanitize($data) {
    $data = trim($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

$id = $_POST['id'];
$title = validateAndSanitize($_POST['title']);
$anime_id = validateAndSanitize($_POST['anime_id']);
$order = validateAndSanitize($_POST['order']);


if (empty($title)) {
    $_SESSION['error_message'] = 'Заголовок должны быть заполнены.';
    header('Location: ../../season_edit_form.php');
    exit;
}

if (!is_numeric($anime_id)) {
    $_SESSION['error_message'] = 'ID студии должен быть числом.';
    header('Location: ../../season_edit_form.php');
    exit;
}



if (!is_numeric($order)) {
    $_SESSION['error_message'] = 'Возрастное ограничение должно быть числом.';
    header('Location: ../../season_edit_form.php');
    exit;
}



$stmt = $pdo->prepare("UPDATE season SET anime_id = :anime_id, title = :title, `order` = :order, updateDate = NOW() WHERE season.id = :id");
$stmt->bindParam(':id', $id);
$stmt->bindParam(':title', $title);
$stmt->bindParam(':anime_id', $anime_id);
$stmt->bindParam(':order', $order);
$stmt->execute();


header('Location: ../../season_list.php');
?>

