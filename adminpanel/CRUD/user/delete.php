<?php

include '../../../db.php';

if(empty($_GET['id'])) {
	http_response_code(400);
	echo "Error!";
	die();
}

$id = $_GET['id'];
$sql = "DELETE FROM `user` where id = ?";
if(execute($sql, "i", [$id]) == 1)
{
	header('Location:http://animesite/adminpanel/userList.php');
	echo "Success";
}

?>