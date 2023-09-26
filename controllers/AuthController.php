<?php

include_once ROOT.'/models/User.php';

class AuthController
{
	public function actionSignIn() {
		
		include ROOT.'/views/auth/signIn.php';
		die();
	}
}