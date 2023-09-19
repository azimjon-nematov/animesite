<?php

$name = $_POST['name'];
$description = $_POST['description'];
$inputDate = $_POST['date'];
$enteredDate = new DateTime($inputDate);
$currentDate = new DateTime();
$ageRating = $_POST['ageRating'];
$coverImage = $_POST['coverImage'];

if ($enteredDate > $currentDate) {
    throw new Exception("Ошибка: Введенная дата больше текущей даты.");
} else {
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
    die();
}



