<?php

include_once ROOT.'/models/User.php';

class AuthController
{
	public function actionSignIn() {
			
		include ROOT.'/views/auth/signIn.php';
		return true;
	}
	public function actionSignUp() {
		
		include ROOT.'/views/auth/signUp.php';
		return true;
	}

	public function actionLogOut() {
		$_SESSION = array();

		if (ini_get("session.use_cookies")) {
		    $params = session_get_cookie_params();
		    setcookie(session_name(), '', time() - 42000,
		        $params["path"], $params["domain"],
		        $params["secure"], $params["httponly"]
		    );
		}

		session_destroy();
		header('Location:http://animesite/index.php');
		return true;
	}
}