<?php 
include 'db.php';

session_start();
$session_id = session_id();

if(isset($_POST['name']) && isset($_POST['login']) && isset($_POST['password'])) {
	$name = $_POST['name'];
	$login = $_POST['login'];
	$password = $_POST['password'];

	unset($_SESSION['errorMessage']);

	if(empty($name)) {
		$_SESSION['errorMessage']['name'] = 'Заполните имя!';
	}
	if(empty($login)) {
		$_SESSION['errorMessage']['login'] = 'Заполните логин!';
	}
	if (empty($password)) {
		$_SESSION['errorMessage']['password'] = 'Заполните пароль!';
	} 

	if (empty($_SESSION['errorMessage'])) {
		try {
			$query = 'INSERT INTO `user` (`name`, login, passwordHash, createDate) VALUES(?, ?, MD5(?), NOW())';
			$userId = executeAndSelectId($query, "sss", [$name, $login, $password]);
			
			$_SESSION['id'] = $session_id;
			$_SESSION['user_id'] = $userId;
			$_SESSION['name'] = $name;
			$_SESSION['login'] = $login;
			// $_SESSION['password'] = md5($password);
		} catch (Exception $e) {
			$_SESSION['errorMessage']['message'] = $e->getMessage();
		}

	}

	if(!empty($_SESSION['id'])) {
	    header('Location:http://animesite/index.php'); //isset($_SERVER['HTTP_REFERER'])
	    //header('Location:' . (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'http://animesite/index.php')); //
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CUbuntu:300,400,500,700" rel="stylesheet"> 

	<!-- CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="assets/css/nouislider.min.css">
	<link rel="stylesheet" href="assets/css/ionicons.min.css">
	<link rel="stylesheet" href="assets/css/plyr.css">
	<link rel="stylesheet" href="assets/css/photoswipe.css">
	<link rel="stylesheet" href="assets/css/default-skin.css">
	<link rel="stylesheet" href="assets/css/main.css">

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="assets/icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="assets/icon/favicon-32x32.png">
	<link rel="apple-touch-icon" sizes="72x72" href="assets/icon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="assets/icon/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="assets/icon/apple-touch-icon-144x144.png">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title>FlixGo – Online Movies, TV Shows & Cinema HTML Template</title>

</head>
<body class="body">

	<div class="sign section--bg" data-bg="assets/img/section/section.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- registration form -->
						<form action="signup.php" method="POST" class="sign__form">

							<style type="text/css">
								.err__text {
									padding: 5px;
									background-color: #ccc8;
									border-radius: 12px;
									margin-top: 0px;
									margin-bottom: 20px;
									font-size: 14px;
									color: #ff0;
									font-family: 'Open Sans', sans-serif;
								}
							</style>

							<a href="index.html" class="sign__logo">
								<img src="assets/img/logo.svg" alt="">
							</a>

							<div class="sign__group">
								<input type="text" name="name" class="sign__input" placeholder="Name">
							</div>

							<?php if(!empty($_SESSION['errorMessage']['name'])): ?>
								<span class="err__text"><?php echo $_SESSION['errorMessage']['name']; ?></span>
							<?php endif ?>

							<div class="sign__group">
								<input type="text" name="login" class="sign__input" placeholder="Email">
							</div>

							<?php if(!empty($_SESSION['errorMessage']['login'])): ?>
								<span class="err__text"><?php echo $_SESSION['errorMessage']['login']; ?></span>
							<?php endif ?>

							<div class="sign__group">
								<input type="password" name="password" class="sign__input" placeholder="Password">
							</div>

							<?php if(!empty($_SESSION['errorMessage']['login'])): ?>
								<span class="err__text"><?php echo $_SESSION['errorMessage']['login']; ?></span>
							<?php endif ?>

							<div class="sign__group sign__group--checkbox">
								<input id="remember" name="remember" type="checkbox" checked="checked">
								<label for="remember">I agree to the <a href="#">Privacy Policy</a></label>
							</div>
							
							<input class="sign__btn" type="submit" value="Sign up">
							<!-- <button class="sign__btn" type="button">Sign up</button> -->

							<?php if(!empty($_SESSION['errorMessage']['message'])): ?>
								<span class="err__text" style="margin-bottom: 0px;margin-top: 15px;">
									<?php echo $_SESSION['errorMessage']['message']; ?>		
								</span>
							<?php endif ?>

							<?php 
							if (!empty($_SESSION['errorMessage'])) {
								unset($_SESSION['errorMessage']);
							}
							?>

							<span class="sign__text">Already have an account? <a href="signin.php">Sign in!</a></span>

						</form>
						<!-- registration form -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- JS -->
	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/jquery.mousewheel.min.js"></script>
	<script src="assets/js/jquery.mCustomScrollbar.min.js"></script>
	<script src="assets/js/wNumb.js"></script>
	<script src="assets/js/nouislider.min.js"></script>
	<script src="assets/js/plyr.min.js"></script>
	<script src="assets/js/jquery.morelines.min.js"></script>
	<script src="assets/js/photoswipe.min.js"></script>
	<script src="assets/js/photoswipe-ui-default.min.js"></script>
	<script src="assets/js/main.js"></script>
</body>

</html>