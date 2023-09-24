<?php

include '../../../db.php';

if(empty($_POST['id']) || empty($_POST['name']) || empty($_POST['login']) || empty($_POST['passwordHash'])) {
	http_response_code(400);
	//header('Location:' . (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'http://animesite/adminpanel/'));
	echo "Error! Параметры не переданы!";
	die();
}

$id = $_POST['id'];
$name = $_POST['name'];
$login = $_POST['login'];
$passwordHash = $_POST['passwordHash'];
$profileImage = empty($_POST['profileImage']) ? NULL : $_POST['profileImage'];
$isAdmin = (!empty($_POST['isAdmin']) && $_POST['isAdmin'] == 'on') ? 1 : 0;

$isBusy = SELECT('SELECT COUNT(*) \'count\' from `user` WHERE login = ? AND id <> ?', 'si', [$login, $id])[0]['count'] > 0;
if($isBusy) {
	http_response_code(400);
	//	header('Location:' . (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'http://animesite/adminpanel/'));
	echo "Этот логин занят другим пользователем!";
	die();
}

$sql = 'UPDATE `user` SET `name` = ?, login = ?, passwordHash = ?, profileImage = ?, isAdmin = ?, updateDate = NOW() WHERE id = ?';

if(execute($sql, "ssssii", [$name, $login, $passwordHash, $profileImage, $isAdmin, $id]) == 1) {
	http_response_code(200);
	header('Location:http://animesite/adminpanel/userList.php');
	echo "Пользователь обновлен!";
	die();
}

http_response_code(500);
//header('Location:' . (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'http://animesite/adminpanel/'));
echo "Ошибка";
die();

?>