<?php 
session_start();
$session_id = session_id();

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

	</head>

	<body class="body">
		
		<!-- header -->
		<header class="header">
			<div class="header__wrap">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="header__content">
								<!-- header logo -->
								<a href="index.php" class="header__logo">
									<img src="assets/img/logo.svg" alt="">
								</a>
								<!-- end header logo -->


								<?php 
									$isRegistred = !empty($_SESSION['id']);
								?>


								<!-- header nav -->
								<ul class="header__nav">

									<li class="header__nav-item">
										<a href="index.php" class="header__nav-link">Home</a>
									</li>

									<!-- dropdown -->
									<li class="header__nav-item">
										<a class="header__nav-link" href="catalog_grid.php" role="button"  aria-haspopup="true" aria-expanded="false">Movies</a>
									</li>
									<!-- end dropdown -->

									<!-- dropdown -->
									<li class="header__nav-item">
										<a class="header__nav-link" href="catalog2.php" role="button"  aria-haspopup="true" aria-expanded="false">Series</a>
									</li>
									<!-- end dropdown -->

									<!-- <li class="header__nav-item">
										<a href="pricing.html" class="header__nav-link">Pricing Plan</a>
									</li>

									<li class="header__nav-item">
										<a href="faq.html" class="header__nav-link">Help</a>
									</li> -->

									<?php if ($isRegistred): ?>

									<li class="header__nav-item">
										<a href="profile.php" class="header__nav-link">Профиль</a>
									</li>

									<li class="header__nav-item">
										<a href="adminpanel/index.php" class="header__nav-link">Admin panel</a>
									</li>

									<?php endif ?>

									<!-- dropdown -->
									<li class="dropdown header__nav-item">
										<a class="dropdown-toggle header__nav-link header__nav-link--more" href="#" role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon ion-ios-more"></i></a>

										<ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuMore">
											<li><a href="about.php">About</a></li>
											<li><a href="signin.html">Sign In</a></li>
											<li><a href="signup.html">Sign Up</a></li>
											<li><a href="404.html">404 Page</a></li>
										</ul>
									</li>
									<!-- end dropdown -->
								</ul>
								<!-- end header nav -->


								<!-- header auth -->
								<div class="header__auth">
									<button class="header__search-btn" type="button">
										<i class="icon ion-ios-search"></i>
									</button>

									<?php if (!$isRegistred): ?>

									<a href="signin.php" class="header__sign-in">
										<i class="icon ion-ios-log-in"></i>
										<span>sign in</span>
									</a>

									<?php else: ?>

									<a href="logout.php" class="header__sign-in">
										<i class="icon ion-ios-log-in"></i>
										<span>log out</span>
									</a>

									<?php endif ?>
								</div>
								<!-- end header auth -->

								<!-- header menu btn -->
								<button class="header__btn" type="button">
									<span></span>
									<span></span>
									<span></span>
								</button>
								<!-- end header menu btn -->
							</div>
						</div>
					</div>
				</div>
			</div>