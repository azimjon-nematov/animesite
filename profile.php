<?php 

$session_id = session_id();
if ($session_id == "") {
	session_start();
	$session_id = session_id();
}

include 'db.php';
require_once 'vendor/autoload.php';
use PhpOffice\PhpWord\TemplateProcessor;

if (!empty($_POST['id'])) {
	$id = $_POST['id'];
	$user = SELECT("SELECT * FROM `user` WHERE id=?", 'i', [$id])[0];

	$userId = $user['id'];
	$userName = $user['name'];
	$login = $user['login'];
	$passwordHash = $user['passwordHash'];
	$createDate = $user['createDate'];
	$profileImage = empty($user['profileImage']) ? 'отсутствует' : $_SERVER['ORIGIN'] . $user['profileImage'];

	//определяем имя будущего файла
	$wordFile = 'user' . $userId . '.docx';

	//загружаем шаблон
	$document = new TemplateProcessor('Template.docx');

	//заполняем нужные поля на файле ворд в соответсвии с метками
	$document->setValue('userId', $userId);
	$document->setValue('userName', $userName);

	$document->setValue('login', $login);
	$document->setValue('passwordHash', $passwordHash);
	$document->setValue('createDate', $createDate);

	$document->setValue('profileImage', $profileImage);

	//определяем хедер для генерации файоа ворд
	header("Content-Description: File Transfer");
	header('Content-Disposition: attachment; filename="' . $wordFile . '"');
	header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
	header('Content-Transfer-Encoding: binary');
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header('Expires: 0');

	//генерируем файл
	$document->saveAs("php://output");
	die();
}

include 'inc/head.php';

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
				<h2 class="section__title section__title--no-margin">Download your data as .docx file</h2>
			</div>
			<!-- end section title -->

			<!-- section text -->
			<div class="col-12">
				<p class="section__text section__text--last-with-margin">It is a long <b>established</b> fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using.</p>
			</div>
			<!-- end section text -->

			<!-- partner -->
			<div class="col-6 col-sm-4 col-md-3 col-lg-2">
				<form method="post">
					<input type="text" name="id" value="<?=$_SESSION['user_id']?>" hidden>
					<input class="form__btn" type="submit" value="Создать файл">
				</form>
			</div>
			<!-- end partner -->

		</div>
	</div>
</section>
<!-- end partners -->

<?php include 'inc/foot.php'; ?>