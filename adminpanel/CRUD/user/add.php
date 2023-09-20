<?php

$name = $_POST['name'];
$description = $_POST['description'];
$inputDate = $_POST['login'];
$ageRating = $_POST['passwordHash'];
$coverImage = $_POST['profileImage'];
$coverImage = $_POST['isAdmin'];

if ($enteredDate > $currentDate) {
    throw new Exception("Ошибка: Введенная дата больше текущей даты.");
} else {
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
    die();
}



