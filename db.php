<?php
global $DB_HOST;
global $DB_USER;
global $DB_PASSWORD;
global $DB_DB;


$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASSWORD = 'root';
$DB_DB = 'animesite';

// $db = @mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_DB) or die('ошибка соединение с БД');
// mysqli_set_charset($db, 'utf8');

// $sql = "SELECT a.`title`, a.`desc`, s.`name` as 'studio', a.`releaseDate` FROM animes a LEFT JOIN studios s ON a.studio_id = s.id";

//$animes = mysqli_fetch_all(mysqli_query($db, $sql));




// $statement->execute();
// $result = $statement->get_result();
// $animes = $result->fetch_all(MYSQLI_ASSOC);

// $result->close();
// $statement->close();
// $db->close();


function SELECT($sql) {
	global $DB_HOST;
	global $DB_USER;
	global $DB_PASSWORD;
	global $DB_DB;
	$db = @mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_DB) or die('ошибка соединение с БД');
	mysqli_set_charset($db, 'utf8');
    $result = mysqli_fetch_all(mysqli_query($db, $sql));
	$db->close();

	return $result;
}

function SELECTWITHPARAMS($sql, $params, $data) {
	global $DB_HOST;
	global $DB_USER;
	global $DB_PASSWORD;
	global $DB_DB;

	$db = @mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_DB) or die('ошибка соединение с БД - SELECTWITHPARAMS');
	mysqli_set_charset($db, 'utf8');
	$statement = $db->prepare($sql);
	$statement->bind_param($params, ...$data);
	$res = $statement->get_result();
	$result = $res->fetch_all(MYSQLI_ASSOC);

	$res->close();
	$statement->close();
	$db->close();

	return $result;
}

function execute123($sql, $params, $data) {

	$db = @mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_DB) or die('ошибка соединение с БД');
	mysqli_set_charset($db, 'utf8');
	$statement = $db->prepare($sql);
	$statement->bind_param($params, ...$data);
	$statement->execute();

	$effected_rows = $statement->effected_rows;

	$statement->close();
	$db->close();

	return $effected_rows;
}


?>