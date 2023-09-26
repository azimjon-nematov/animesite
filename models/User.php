<?php
include_once ROOT.'/db.php';
class User {

	public static function getUserByIf($id) {

	}

	public static function getUserLust() {
		return SELECT("SELECT * FROM user");
	}
	

}