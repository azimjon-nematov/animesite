<?php

$DB_HOST = 'localhost'
$DB_USER = 'root'
$DB_PASSWORD = 'root'
$DB_DB = 'animesite'

$db = @mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_DB) or die('ошибка соединение с БД');
mysqli_set_charset($db, 'utf8');

$sql = "SELECT a.`title`, a.`desc`, s.`name` as 'studio', a.`releaseDate` FROM animes a LEFT JOIN studios s ON a.studio_id = s.id";

//$animes = mysqli_fetch_all(mysqli_query($db, $sql));




// $statement->execute();
// $result = $statement->get_result();
// $animes = $result->fetch_all(MYSQLI_ASSOC);

// $result->close();
// $statement->close();
// $db->close();


function SELECT($sql) {

	$db = @mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_DB) or die('ошибка соединение с БД');
	mysqli_set_charset($db, 'utf8');
    $result = mysqli_fetch_all(mysqli_query($db, $sql));
	$db->close();

	return $result
}

function SELECT($sql, $params, $data) {

	$db = @mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_DB) or die('ошибка соединение с БД');
	mysqli_set_charset($db, 'utf8');
	$statement = $db->prepare($sql);
	$statement->bind_param($params, ...$data);
	$res = $statement->get_result();
	$result = $res->fetch_all(MYSQLI_ASSOC);

	$res->close();
	$statement->close();
	$db->close();

	return $result
}

function EXEC($sql, $params, $data) {

	$db = @mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_DB) or die('ошибка соединение с БД');
	mysqli_set_charset($db, 'utf8');
	$statement = $db->prepare($sql);
	$statement->bind_param($params, ...$data);
	$statement->execute();

	$statement->close();
	$db->close();

	return $result
}


?>