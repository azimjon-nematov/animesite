<?php

include('../../db/createConnectionWithDB.php');

function validateAndSanitize($data) {
    $data = trim($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

$title = validateAndSanitize($_POST['title']);
$desc = validateAndSanitize($_POST['description']);
$studio_id = validateAndSanitize($_POST['studio_id']);
$releaseDate = validateAndSanitize($_POST['releaseDate']);
$ageLimit = validateAndSanitize($_POST['ageRating']);
$id = validateAndSanitize($_POST['id']);
$uniqueImageCover = "";

if (empty($title) || empty($desc)) {
    throw new Exception('Заголовок и описание должны быть заполнены.');
}

if (!is_numeric($studio_id)) {
    throw new Exception('ID студии должен быть числом.');
}

$dateParts = explode('-', $releaseDate);
if (count($dateParts) != 3 || !checkdate($dateParts[1], $dateParts[2], $dateParts[0])) {
    throw new Exception('Неправильный формат даты релиза.');
}

if (!is_numeric($ageLimit)) {
    throw new Exception('Возрастное ограничение должно быть числом.');
}


$target_dir = "./uploads/"; // Директория, куда будут загружаться файлы
$imageFileType = strtolower(pathinfo($_FILES["coverImage"]["name"], PATHINFO_EXTENSION));

// Генерируем уникальное имя для файла
$uniqueImageCover = uniqid() . "." . $imageFileType;

$target_file = $target_dir . $uniqueImageCover;
$uploadOk = 1;

// Проверка, является ли файл изображением
if (isset($_FILES["coverImage"])) {
    $check = getimagesize($_FILES["coverImage"]["tmp_name"]);
    if ($check !== false) {
        echo "Файл является изображением - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Файл не является изображением.";
        $uploadOk = 0;
    }
}

// Проверка наличия файла
if ($_FILES["coverImage"]["size"] == 0) {
    echo "Файл не был загружен.";
    $uploadOk = 0;
}

// Разрешенные форматы файлов
$allowed_formats = ["jpg", "jpeg", "png"];
if (!in_array($imageFileType, $allowed_formats)) {
    echo "Разрешены только JPG, JPEG и PNG файлы.";
    $uploadOk = 0;
}

// Проверка на ошибки при загрузке
if ($uploadOk == 0) {
    echo "Файл не был загружен.";
} else {
    if (move_uploaded_file($_FILES["coverImage"]["tmp_name"], $target_file)) {
        // echo "Файл " . basename($_FILES["fileToUpload"]["name"]) . " успешно загружен.";
    } else {
        echo "Произошла ошибка при загрузке файла.";
    }
}
   


$stmt = $pdo->prepare("UPDATE anime SET id=id,title=:title,desc=:desc,studio_id=:studio_id,releaseDate=:releaseDate,ageLimit=:ageLimit,coverImage=:coverImage,createDate=:createDate,updateDate=NOW() WHERE id=$id");

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':desc', $desc);
        $stmt->bindParam(':studio_id', $studio_id);
        $stmt->bindParam(':releaseDate', $releaseDate);
        $stmt->bindParam(':ageLimit', $ageLimit);
        $stmt->bindParam(':coverImage', $uniqueImageCover);
        $stmt->execute();

        header('Location: ../../anime_list.php');
?>

