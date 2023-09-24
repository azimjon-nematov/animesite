<?php 
include 'db.php';
include 'inc/head.php';

$xmlstr = "<?xml version='1.0' standalone='yes'?><user> <name>User name</name> <age>18</age> <descriptions> <paragraph>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using.</paragraph> <paragraph>'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</paragraph> <paragraph>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</paragraph> <paragraph>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</paragraph> </descriptions> </user>";

//$xmlDoc = new DOMDocument();
$user = simplexml_load_string($xmlstr);
// echo $xmlstr;
// echo $xmlDoc->saveXML();
// die();
?>
	<!-- header search -->
	<form action="#" class="header__search">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="header__search-content">
						<input type="text" placeholder="Search for a movie, TV Series that you are looking for">

						<button type="button">search</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<!-- end header search -->
</header>
<!-- end header -->

<!-- page title -->
<section class="section section--first section--bg" data-bg="assets/img/section/section.jpg">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section__wrap">
					<!-- section title -->
					<h2 class="section__title">About Us</h2>
					<!-- end section title -->

					<!-- breadcrumb -->
					<ul class="breadcrumb">
						<li class="breadcrumb__item"><a href="index.php">Home</a></li>
						<li class="breadcrumb__item breadcrumb__item--active">About Us</li>
					</ul>
					<!-- end breadcrumb -->
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end page title -->

<!-- about -->
<section class="section">
	<div class="container">
		<div class="row">
			<!-- section title -->
			<div class="col-12">
				<h2 class="section__title"><b>FLIXGO</b> – Best Place for Movies</h2>
			</div>
			<!-- end section title -->
			<div class="col-12">
				<?php 
				//$mod=$xmlDoc->getElementsByTagName("user");

				// foreach ($mod as $element){
				//     echo $element->nodeValue." ".$element->nodeName;
				// }
				echo $user->name;
				// print_r($user);
				// $x = $xmlDoc->documentElement;
				foreach ($user->paragraph as $item) {
					echo '<p class="section__text">';
					echo $item;
					echo "</p>";
				}

				?>
			</div>
			<!-- section text -->
			<div class="col-12">
				<p class="section__text">It is a long <b>established</b> fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using.</p>

				<p class="section__text section__text--last-with-margin">'Content here, content here', making it look like <a href="#">readable</a> English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
			</div>
			<!-- end section text -->

			<!-- feature -->
			<div class="col-12 col-md-6 col-lg-4">
				<div class="feature">
					<i class="icon ion-ios-tv feature__icon"></i>
					<h3 class="feature__title">Ultra HD</h3>
					<p class="feature__text">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
				</div>
			</div>
			<!-- end feature -->

			<!-- feature -->
			<div class="col-12 col-md-6 col-lg-4">
				<div class="feature">
					<i class="icon ion-ios-film feature__icon"></i>
					<h3 class="feature__title">Film</h3>
					<p class="feature__text">All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first.</p>
				</div>
			</div>
			<!-- end feature -->

			<!-- feature -->
			<div class="col-12 col-md-6 col-lg-4">
				<div class="feature">
					<i class="icon ion-ios-trophy feature__icon"></i>
					<h3 class="feature__title">Awards</h3>
					<p class="feature__text">It to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining.</p>
				</div>
			</div>
			<!-- end feature -->

			<!-- feature -->
			<div class="col-12 col-md-6 col-lg-4">
				<div class="feature">
					<i class="icon ion-ios-notifications feature__icon"></i>
					<h3 class="feature__title">Notifications</h3>
					<p class="feature__text">Various versions have evolved over the years, sometimes by accident, sometimes on purpose.</p>
				</div>
			</div>
			<!-- end feature -->

			<!-- feature -->
			<div class="col-12 col-md-6 col-lg-4">
				<div class="feature">
					<i class="icon ion-ios-rocket feature__icon"></i>
					<h3 class="feature__title">Rocket</h3>
					<p class="feature__text">It to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.</p>
				</div>
			</div>
			<!-- end feature -->

			<!-- feature -->
			<div class="col-12 col-md-6 col-lg-4">
				<div class="feature">
					<i class="icon ion-ios-globe feature__icon"></i>
					<h3 class="feature__title">Multi Language Subtitles </h3>
					<p class="feature__text">Various versions have evolved over the years, sometimes by accident, sometimes on purpose.</p>
				</div>
			</div>
			<!-- end feature -->
		</div>
	</div>
</section>
<!-- end about -->

<!-- how it works -->
<section class="section section--dark">
	<div class="container">
		<div class="row">
			<!-- section title -->
			<div class="col-12">
				<h2 class="section__title section__title--no-margin">How it works?</h2>
			</div>
			<!-- end section title -->

			<!-- how box -->
			<div class="col-12 col-md-6 col-lg-4">
				<div class="how">
					<span class="how__number">01</span>
					<h3 class="how__title">Create an account</h3>
					<p class="how__text">It has never been an issue to find an old movie or TV show on the internet. However, this is not the case with the new releases.</p>
				</div>
			</div>
			<!-- ebd how box -->

			<!-- how box -->
			<div class="col-12 col-md-6 col-lg-4">
				<div class="how">
					<span class="how__number">02</span>
					<h3 class="how__title">Choose your Plan</h3>
					<p class="how__text">It has never been an issue to find an old movie or TV show on the internet. However, this is not the case with the new releases.</p>
				</div>
			</div>
			<!-- ebd how box -->

			<!-- how box -->
			<div class="col-12 col-md-6 col-lg-4">
				<div class="how">
					<span class="how__number">03</span>
					<h3 class="how__title">Enjoy MovieGo</h3>
					<p class="how__text">It has never been an issue to find an old movie or TV show on the internet. However, this is not the case with the new releases.</p>
				</div>
			</div>
			<!-- ebd how box -->
		</div>
	</div>
</section>
<!-- end how it works -->

<!-- partners -->
<section class="section">
	<div class="container">
		<div class="row">
			<!-- section title -->
			<div class="col-12">
				<h2 class="section__title section__title--no-margin">Our Partners</h2>
			</div>
			<!-- end section title -->

			<!-- section text -->
			<div class="col-12">
				<p class="section__text section__text--last-with-margin">It is a long <b>established</b> fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using.</p>
			</div>
			<!-- end section text -->

			<!-- partner -->
			<div class="col-6 col-sm-4 col-md-3 col-lg-2">
				<a href="#" class="partner">
					<img src="img/partners/themeforest-light-background.png" alt="" class="partner__img">
				</a>
			</div>
			<!-- end partner -->

			<!-- partner -->
			<div class="col-6 col-sm-4 col-md-3 col-lg-2">
				<a href="#" class="partner">
					<img src="img/partners/audiojungle-light-background.png" alt="" class="partner__img">
				</a>
			</div>
			<!-- end partner -->

			<!-- partner -->
			<div class="col-6 col-sm-4 col-md-3 col-lg-2">
				<a href="#" class="partner">
					<img src="img/partners/codecanyon-light-background.png" alt="" class="partner__img">
				</a>
			</div>
			<!-- end partner -->

			<!-- partner -->
			<div class="col-6 col-sm-4 col-md-3 col-lg-2">
				<a href="#" class="partner">
					<img src="img/partners/photodune-light-background.png" alt="" class="partner__img">
				</a>
			</div>
			<!-- end partner -->

			<!-- partner -->
			<div class="col-6 col-sm-4 col-md-3 col-lg-2">
				<a href="#" class="partner">
					<img src="img/partners/activeden-light-background.png" alt="" class="partner__img">
				</a>
			</div>
			<!-- end partner -->

			<!-- partner -->
			<div class="col-6 col-sm-4 col-md-3 col-lg-2">
				<a href="#" class="partner">
					<img src="img/partners/3docean-light-background.png" alt="" class="partner__img">
				</a>
			</div>
			<!-- end partner -->
		</div>
	</div>
</section>
<!-- end partners -->

<?php include 'inc/foot.php'; ?>