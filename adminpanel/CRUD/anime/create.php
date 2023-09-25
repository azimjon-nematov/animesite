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
//  IMAGE TARGET DIR
$photo_target_dir = "../../../upload/coverImages/";
$extension = strtolower(pathinfo($_FILES["coverImage"]["name"], PATHINFO_EXTENSION));
$unique_filename = uniqid().$_FILES["coverImage"]["name"];
$image_target_file = $photo_target_dir . $unique_filename;
$uploadOk = 1;

if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["coverImage"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}


if($extension != "jpg" && $extension != "png" && $extension != "jpeg"
&& $extension != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
} else {
  if (move_uploaded_file($_FILES["coverImage"]["tmp_name"], $image_target_file)) {
    echo "The file ". htmlspecialchars($unique_filename). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}


$stmt = $pdo->prepare("INSERT INTO `anime` (`id`, `title`, `desc`, `studio_id`, `releaseDate`, `ageLimit`, `coverImage`, `createDate`, `updateDate`)
    VALUES (NULL, :title, :desc, :studio_id, :releaseDate, :ageLimit, :coverImage, NOW(), NULL)");

$stmt->bindParam(':title', $title);
$stmt->bindParam(':desc', $desc);
$stmt->bindParam(':studio_id', $studio_id);
$stmt->bindParam(':releaseDate', $releaseDate);
$stmt->bindParam(':ageLimit', $ageLimit);
$stmt->bindParam(':coverImage', $unique_filename);
$stmt->execute();

header('Location: ../../anime_list.php');
?>
