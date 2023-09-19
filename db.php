<?php
define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', 'root');
define('DATABASE', 'animesite');

function SELECT($sql, $params = "", $data = array()) {
	$db = @mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('ошибка соединение с БД');
	mysqli_set_charset($db, 'utf8');
	$statement = $db->prepare($sql);
	if (count($data) > 0) {
		$statement->bind_param($params, ...$data);
	}
	$statement->execute();
	$res = $statement->get_result();
	$result = $res->fetch_all(MYSQLI_ASSOC);

	$res->close();
	$statement->close();
	$db->close();

	return $result;
}

function execute($sql, $params = "", $data = array()) {
	$db = @mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('ошибка соединение с БД');
	mysqli_set_charset($db, 'utf8');
	$statement = $db->prepare($sql);
	if (count($data) > 0) {
		$statement->bind_param($params, ...$data);
	}
	$statement->execute();

	$affected_rows = $statement->affected_rows;

	$statement->close();
	$db->close();

	return $affected_rows;
}

function executeAndSelectId($query, $params = "", $data = array()) {
	$db = @mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('ошибка соединение с БД');
	mysqli_set_charset($db, 'utf8');
	$statement = $db->prepare($query);
	if (count($data) > 0) {
		$statement->bind_param($params, ...$data);
	}
	$statement->execute();
	$insert_id = $statement->insert_id;

	if($statement->errno == 0) {
		$statement->close();
		$db->close();
		return $insert_id;
	}
	$errno = $statement->errno;
	$error = $statement->error;
	$statement->close();
	$db->close();

	throw new Exception('error code: '. $errno . '; error message: ' . $error);
}


?>