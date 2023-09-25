<?php
include('../../db/createConnectionWithDB.php');
session_start(); // Не забудьте начать сессию


//  IMAGE TARGET DIR
$photo_target_dir = "../../../upload/episode_images/";
$extension = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
$unique_filename = uniqid().$_FILES["image"]["name"];
$image_target_file = $photo_target_dir . $unique_filename;
$uploadOk = 1;

if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["image"]["tmp_name"]);
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
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $image_target_file)) {
    echo "The file ". htmlspecialchars($unique_filename). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}





$video_target_dir = "../../../upload/episodes/";
$video_extension = strtolower(pathinfo($_FILES["video"]["name"], PATHINFO_EXTENSION));
$unique_video_name = uniqid().$_FILES["video"]["name"];
$video_target_file = $video_target_dir . $unique_video_name ;




if (move_uploaded_file($_FILES["video"]["tmp_name"], $video_target_file)) {
  echo "The file " . htmlspecialchars(basename($_FILES["video"]["name"])) . " has been uploaded as " . htmlspecialchars(basename($video_target_file));
} else {
  echo "Sorry, there was an error uploading your file.";
}






$query = "INSERT INTO episode(season_id, title, poster, video, `order`, createDate, updateDate) 
                                          VALUES(:season_id, :title, :poster, :video, :order, NOW(), NOW())";

                                $stmt = $pdo->prepare($query);
                                $stmt->bindParam(':season_id', $_POST['season_id']);
                                $stmt->bindParam(':title', $_POST['title']);
                                $stmt->bindParam(':poster', $unique_filename); // Путь к изображению
                                $stmt->bindParam(':video', $unique_video_name); // Путь к видео
                                $stmt->bindParam(':order', $_POST['order']);

                                $stmt->execute();