<?php 
include('inc/head.php');
include('db.php');
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





<!-- home -->
<section class="home">
	<!-- home bg -->
	<div class="owl-carousel home__bg">
		<div class="item home__cover" data-bg="assets/img/home/home__bg.jpg"></div>
		<div class="item home__cover" data-bg="assets/img/home/home__bg2.jpg"></div>
		<div class="item home__cover" data-bg="assets/img/home/home__bg3.jpg"></div>
		<div class="item home__cover" data-bg="assets/img/home/home__bg4.jpg"></div>
	</div>
	<!-- end home bg -->

	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="home__title"><b>NEW ITEMS</b> OF THIS SEASON</h1>

				<button class="home__nav home__nav--prev" type="button">
					<i class="icon ion-ios-arrow-round-back"></i>
				</button>
				<button class="home__nav home__nav--next" type="button">
					<i class="icon ion-ios-arrow-round-forward"></i>
				</button>
			</div>

			<div class="col-12">
				<div class="owl-carousel home__carousel">
					<div class="item">
						<!-- card -->
						<div class="card card--big">
							<div class="card__cover">
								<img src="assets/img/covers/cover.jpg" alt="">
								<a href="#" class="card__play">
									<i class="icon ion-ios-play"></i>
								</a>
							</div>
							<div class="card__content">
								<h3 class="card__title"><a href="#">I Dream in Another Language</a></h3>
								<span class="card__category">
									<a href="#">Action</a>
									<a href="#">Triler</a>
								</span>
								<span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
							</div>
						</div>
						<!-- end card -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end home -->

<!-- content -->
<section class="content">
	<div class="content__head">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- content title -->
					<h2 class="content__title">Новые серии</h2>
					<!-- end content title -->


				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<!-- content tabs -->
		<div class="tab-content" id="myTabContent">

			<?php

			$sql = "SELECT a.id 'id', a.title, a.`desc`, s.`name` as 'studio', a.releaseDate, a.ageLimit, a.coverImage FROM anime a LEFT JOIN studio s ON a.studio_id = s.id";
			$animes = SELECT($sql);

			for($i = 0; $i < count($animes); ++$i) {
				$sql = "SELECT g.name FROM genre g LEFT JOIN anime_genre ag ON g.id = ag.genre_id WHERE ag.anime_id = ".$animes[$i][0];
				array_push($animes[$i], SELECT($sql));
				// $sql = "SELECT g.name FROM genre g LEFT JOIN anime_genre ag ON g.id = ag.genre_id WHERE ag.anime_id = ?";
				// array_push($animes[$i], SELECTWITHPARAMS($sql, 'i,' [$animes[$i][0]]));
			}

			?>


			<div class="tab-pane fade show active" id="tab-2" role="tabpanel" aria-labelledby="2-tab">
				<div class="row">


					<?php foreach($animes as $anime): ?>
						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="assets/img/covers/cover.jpg" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#"><?php echo $anime[1] ?></a></h3>
									<span class="card__category">
										<?php 
											foreach($anime[7] as $genre) {
												echo '<a href="#">' . $genre[0] . '</a>';
											}
										?>
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
								</div>
							</div>
						</div>
						<!-- end card -->
					<?php endforeach; ?>


				</div>
			</div>


		</div>
		<!-- end content tabs -->
	</div>
</section>
<!-- end content -->

<!-- expected premiere -->
<section class="section section--bg" data-bg="assets/img/section/section.jpg">
	<div class="container">
		<div class="row">
			<!-- section title -->
			<div class="col-12">
				<h2 class="section__title">Expected premiere</h2>
			</div>
			<!-- end section title -->

			<!-- card -->
			<?php for ($i = 0; $i < 6; $i++) { ?>
				<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
					<div class="card">
						<div class="card__cover">
							<img src="assets/img/covers/cover.jpg" alt="">
							<a href="#" class="card__play">
								<i class="icon ion-ios-play"></i>
							</a>
						</div>
						<div class="card__content">
							<h3 class="card__title"><a href="#">I Dream in Another Language</a></h3>
							<span class="card__category">
								<a href="#">Action</a>
								<a href="#">Triler</a>
							</span>
							<span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
						</div>
					</div>
				</div>
			<?php } ?>
			<!-- end card -->

			



			<!-- section btn -->
			<div class="col-12">
				<a href="#" class="section__btn">Show more</a>
			</div>
			<!-- end section btn -->
		</div>
	</div>
</section>
<!-- end expected premiere -->



<!-- JS -->
<?php
include('inc/foot.php');
?>