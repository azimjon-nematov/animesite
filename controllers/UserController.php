<?php
include_once ROOT.'/models/User.php';

class UserController
{
	
	public function actionGetAll()
	{
		$users = array();
		$users = User::getUserLust();
		require_once ROOT.'/views/user/all.php';
		return true;
	}

	public function actionGet($id)
	{
		return true;
	}
}