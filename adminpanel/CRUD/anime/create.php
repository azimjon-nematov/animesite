<?php
include('../../db/createConnectionWithDB.php');
session_start(); // Не забудьте начать сессию

// var_dump($_POST);

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
$uniqueImageCover = "";

try {
    if (empty($title) || empty($desc)) {
        $_SESSION['error_message'] = 'Заголовок и описание должны быть заполнены.';
        header('Location: ../../anime_create_form.php');
        exit;
    }
    
    if (!is_numeric($studio_id)) {
        $_SESSION['error_message'] = 'ID студии должен быть числом.';
        header('Location: ../../anime_create_form.php');
        exit;
    }
    
    $dateParts = explode('-', $releaseDate);
    if (count($dateParts) != 3 || !checkdate($dateParts[1], $dateParts[2], $dateParts[0])) {
        $_SESSION['error_message'] = 'Неправильный формат даты релиза.';
        header('Location: ../../anime_create_form.php');
        exit;
    }
    
    if (!is_numeric($ageLimit)) {
        $_SESSION['error_message'] = 'Возрастное ограничение должно быть числом.';
        header('Location: ../../anime_create_form.php');
        exit;
    }
}
catch (Exception $e) {
    new Log($e);
    $_SESSION['errorMessage']['message'] = $e->getMessage();
}

$target_dir = "../../uploads/";
if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}

$uniqueImageCover = strtolower(pathinfo($_FILES["coverImage"]["name"], PATHINFO_EXTENSION));
$uniqueImageCover = uniqid() . "." . $uniqueImageCover;

$target_file = $target_dir . $uniqueImageCover;
$uploadOk = 1;

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

if ($_FILES["coverImage"]["size"] == 0) {
    echo "Файл не был загружен.";
    $uploadOk = 0;
}

$allowed_formats = ["jpg", "jpeg", "png"];
if (!in_array($uniqueImageCover, $allowed_formats)) {
    echo "Разрешены только JPG, JPEG и PNG файлы.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Файл не был загружен.";
} else {
    if (move_uploaded_file($_FILES["coverImage"]["tmp_name"], $target_file)) {
        // Файл успешно загружен
    } else {
        echo "Произошла ошибка при загрузке файла.";
    }
}

$stmt = $pdo->prepare("INSERT INTO `anime` (`id`, `title`, `desc`, `studio_id`, `releaseDate`, `ageLimit`, `coverImage`, `createDate`, `updateDate`)
    VALUES (NULL, :title, :desc, :studio_id, :releaseDate, :ageLimit, :coverImage, NOW(), NULL)");

$stmt->bindParam(':title', $title);
$stmt->bindParam(':desc', $desc);
$stmt->bindParam(':studio_id', $studio_id);
$stmt->bindParam(':releaseDate', $releaseDate);
$stmt->bindParam(':ageLimit', $ageLimit);
$stmt->bindParam(':coverImage', $uniqueImageCover);
$stmt->execute();

header('Location: ../../anime_list.php');
?>
