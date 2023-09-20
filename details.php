<?php 
include('db.php');
include('inc/head.php');
$id = $_GET['id'];

$sql = "SELECT a.id 'id', a.title, a.`desc`, s.`name` as 'studio', a.releaseDate, a.ageLimit, a.coverImage FROM anime a LEFT JOIN studio s ON a.studio_id = s.id WHERE a.id = $id";

$anime = SELECT($sql);

for($i = 0; $i < count($anime); ++$i) {
	$sql = "SELECT g.name FROM genre g LEFT JOIN anime_genre ag ON g.id = ag.genre_id WHERE ag.anime_id = ?";
	$anime[$i]['genres'] = SELECT($sql, 'i', [$anime[$i]['id']]);
}




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

	<!-- details -->
	<section class="section details">
		<!-- details background -->
		<div class="details__bg" data-bg="img/home/home__bg.jpg"></div>
		<!-- end details background -->

		<!-- details content -->
		<div class="container">
			<div class="row">
				<!-- title -->
				<div class="col-12">
					<h1 class="details__title"><?=$anime[0]['title']?></h1>
				</div>
				<!-- end title -->

				<!-- content -->
				<div class="col-10">
					<div class="card card--details card--series">
						<div class="row">
							<!-- card cover -->
							<div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-3">
								<div class="card__cover">
									<img src="img/covers/cover.jpg" alt="">
								</div>
							</div>
							<!-- end card cover -->

							<!-- card content -->
							<div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-9">
								<div class="card__content">
									<div class="card__wrap">
										<span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>

										<ul class="card__list">
											<li>HD</li>
											<li><?=$anime[0]['ageLimit']?>+</li>
										</ul>
									</div>

									<ul class="card__meta">
										<li><span>Genre:</span>
											<?php 
												foreach($anime[0]['genres'] as $genre) {
													echo '<a href="#">' . $genre["name"] . '</a>';
												}
											?>
										</li>
										<li><span>Release year:</span> <?=$anime[0]['releaseDate']?></li>
										<li><span>Running time:</span> 120 min</li>
										<li><span>Студия:</span> <?=$anime[0]['studio']?></li>
										<li><span>Country:</span> <a href="#">USA</a> </li>
									</ul>

									<div class="card__description card__description--details">
										<?=$anime[0]['desc']?>
									</div>
								</div>
							</div>
							<!-- end card content -->
						</div>
					</div>
				</div>
				<!-- end content -->

				<!-- player -->
				<div class="col-12 col-xl-6">
					<video controls crossorigin playsinline poster="../../../cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg" id="player">
						<!-- Video files -->
						<source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" type="video/mp4" size="576">
						<source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-720p.mp4" type="video/mp4" size="720">
						<source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1080p.mp4" type="video/mp4" size="1080">
						<source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1440p.mp4" type="video/mp4" size="1440">

						<!-- Caption files -->
						<track kind="captions" label="English" srclang="en" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt"
						    default>
						<track kind="captions" label="Français" srclang="fr" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.fr.vtt">

						<!-- Fallback for browsers that don't support the <video> element -->
						<a href="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" download>Download</a>
					</video>
				</div>
				<!-- end player -->

				<!-- accordion -->
				<div class="col-12 col-xl-6">
					<div class="accordion" id="accordion">
						<div class="accordion__card">
							<div class="card-header" id="headingOne">
								<button type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									<span>Season: 1</span>
									<span>22 Episodes from Nov, 2004 until May, 2005</span>
								</button>
							</div>

							<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="card-body">
									<table class="accordion__list">
										<thead>
											<tr>
												<th>#</th>
												<th>Title</th>
												<th>Air Date</th>
											</tr>
										</thead>

										<tbody>
											<tr>
												<th>1</th>
												<td>Pilot</td>
												<td>Tuesday, November 16th, 2004</td>
											</tr>
											<tr>
												<th>2</th>
												<td>Paternity</td>
												<td>Tuesday, November 23rd, 2004</td>
											</tr>
											<tr>
												<th>3</th>
												<td>Occam's Razor</td>
												<td>Tuesday, November 30th, 2004</td>
											</tr>
											<tr>
												<th>4</th>
												<td>Maternity</td>
												<td>Tuesday, December 7th, 2004</td>
											</tr>
											<tr>
												<th>5</th>
												<td>Damned If You Do</td>
												<td>Tuesday, December 14th, 2004</td>
											</tr>
											<tr>
												<th>6</th>
												<td>The Socratic Method</td>
												<td>Tuesday, December 21st, 2004</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="accordion__card">
							<div class="card-header" id="headingTwo">
								<button class="collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									<span>Season: 2</span>
									<span>24 Episodes from Sep, 2005 until May, 2006</span>
								</button>
							</div>

							<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
								<div class="card-body">
									<table class="accordion__list">
										<thead>
											<tr>
												<th>#</th>
												<th>Title</th>
												<th>Air Date</th>
											</tr>
										</thead>

										<tbody>
											<tr>
												<th>1</th>
												<td>Pilot</td>
												<td>Tuesday, November 16th, 2004</td>
											</tr>
											<tr>
												<th>2</th>
												<td>Paternity</td>
												<td>Tuesday, November 23rd, 2004</td>
											</tr>
											<tr>
												<th>3</th>
												<td>Occam's Razor</td>
												<td>Tuesday, November 30th, 2004</td>
											</tr>
											<tr>
												<th>4</th>
												<td>Maternity</td>
												<td>Tuesday, December 7th, 2004</td>
											</tr>
											<tr>
												<th>5</th>
												<td>Damned If You Do</td>
												<td>Tuesday, December 14th, 2004</td>
											</tr>
											<tr>
												<th>6</th>
												<td>The Socratic Method</td>
												<td>Tuesday, December 21st, 2004</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="accordion__card">
							<div class="card-header" id="headingThree">
								<button class="collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									<span>Season: 3</span>
									<span>24 Episodes from Sep, 2006 until May, 2007</span>
								</button>
							</div>

							<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
								<div class="card-body">
									<table class="accordion__list">
										<thead>
											<tr>
												<th>#</th>
												<th>Title</th>
												<th>Air Date</th>
											</tr>
										</thead>

										<tbody>
											<tr>
												<th>1</th>
												<td>Pilot</td>
												<td>Tuesday, November 16th, 2004</td>
											</tr>
											<tr>
												<th>2</th>
												<td>Paternity</td>
												<td>Tuesday, November 23rd, 2004</td>
											</tr>
											<tr>
												<th>3</th>
												<td>Occam's Razor</td>
												<td>Tuesday, November 30th, 2004</td>
											</tr>
											<tr>
												<th>4</th>
												<td>Maternity</td>
												<td>Tuesday, December 7th, 2004</td>
											</tr>
											<tr>
												<th>5</th>
												<td>Damned If You Do</td>
												<td>Tuesday, December 14th, 2004</td>
											</tr>
											<tr>
												<th>6</th>
												<td>The Socratic Method</td>
												<td>Tuesday, December 21st, 2004</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="accordion__card">
							<div class="card-header" id="headingFour">
								<button class="collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
									<span>Season: 4</span>
									<span>16 Episodes from Sep, 2007 until May, 2008</span>
								</button>
							</div>

							<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
								<div class="card-body">
									<table class="accordion__list">
										<thead>
											<tr>
												<th>#</th>
												<th>Title</th>
												<th>Air Date</th>
											</tr>
										</thead>

										<tbody>
											<tr>
												<th>1</th>
												<td>Pilot</td>
												<td>Tuesday, November 16th, 2004</td>
											</tr>
											<tr>
												<th>2</th>
												<td>Paternity</td>
												<td>Tuesday, November 23rd, 2004</td>
											</tr>
											<tr>
												<th>3</th>
												<td>Occam's Razor</td>
												<td>Tuesday, November 30th, 2004</td>
											</tr>
											<tr>
												<th>4</th>
												<td>Maternity</td>
												<td>Tuesday, December 7th, 2004</td>
											</tr>
											<tr>
												<th>5</th>
												<td>Damned If You Do</td>
												<td>Tuesday, December 14th, 2004</td>
											</tr>
											<tr>
												<th>6</th>
												<td>The Socratic Method</td>
												<td>Tuesday, December 21st, 2004</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end accordion -->

			</div>
		</div>
		<!-- end details content -->
	</section>
	<!-- end details -->

	<!-- content -->
	<section class="content">
		<div class="content__head">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- content title -->
						<h2 class="content__title">Discover</h2>
						<!-- end content title -->

						<!-- content tabs nav -->
						<ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Comments</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Reviews</a>
							</li>

						</ul>
						<!-- end content tabs nav -->

						<!-- content mobile tabs nav -->
						<div class="content__mobile-tabs" id="content__mobile-tabs">
							<div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input type="button" value="Comments">
								<span></span>
							</div>

							<div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Comments</a></li>

									<li class="nav-item"><a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Reviews</a></li>

									<li class="nav-item"><a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Photos</a></li>
								</ul>
							</div>
						</div>
						<!-- end content mobile tabs nav -->
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-8 col-xl-8">
					<!-- content tabs -->
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
							<div class="row">
								<!-- comments -->
								<div class="col-12">
									<div class="comments">
										<ul class="comments__list">
											<li class="comments__item">
												<div class="comments__autor">
													<img class="comments__avatar" src="img/user.png" alt="">
													<span class="comments__name">John Doe</span>
													<span class="comments__time">30.08.2018, 17:53</span>
												</div>
												<p class="comments__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
												<div class="comments__actions">
									

													<button type="button"><i class="icon ion-ios-share-alt"></i>Reply</button>
													
												</div>
											</li>

											<li class="comments__item comments__item--answer">
												<div class="comments__autor">
													<img class="comments__avatar" src="img/user.png" alt="">
													<span class="comments__name">John Doe</span>
													<span class="comments__time">24.08.2018, 16:41</span>
												</div>
												<p class="comments__text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
												<div class="comments__actions">
													<button type="button"><i class="icon ion-ios-share-alt"></i>Reply</button>
												</div>
											</li>

											
										</ul>





										<form action="./adminpanel/CRUD/coment/create.php" method="POST" class="form">
											<textarea id="text" name="text" class="form__textarea" placeholder="Add comment"></textarea>
											<input type="text" value="<?=$anime[0]['id']?>" hidden>
											<button type="submit" class="form__btn">Send</button>
										</form>





									</div>
								</div>
								<!-- end comments -->
							</div>
						</div>

						<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="2-tab">
							<div class="row">
								<!-- reviews -->
								<div class="col-12">
									<div class="reviews">
										<ul class="reviews__list">
											<li class="reviews__item">
												<div class="reviews__autor">
													<img class="reviews__avatar" src="img/user.png" alt="">
													<span class="reviews__name">Best Marvel movie in my opinion</span>
													<span class="reviews__time">24.08.2018, 17:53 by John Doe</span>

													<span class="reviews__rating"><i class="icon ion-ios-star"></i>8.4</span>
												</div>
												<p class="reviews__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
											</li>

											<li class="reviews__item">
												<div class="reviews__autor">
													<img class="reviews__avatar" src="img/user.png" alt="">
													<span class="reviews__name">Best Marvel movie in my opinion</span>
													<span class="reviews__time">24.08.2018, 17:53 by John Doe</span>

													<span class="reviews__rating"><i class="icon ion-ios-star"></i>9.0</span>
												</div>
												<p class="reviews__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
											</li>

											<li class="reviews__item">
												<div class="reviews__autor">
													<img class="reviews__avatar" src="img/user.png" alt="">
													<span class="reviews__name">Best Marvel movie in my opinion</span>
													<span class="reviews__time">24.08.2018, 17:53 by John Doe</span>

													<span class="reviews__rating"><i class="icon ion-ios-star"></i>7.5</span>
												</div>
												<p class="reviews__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
											</li>
										</ul>

										<form action="#" class="form">
											<input type="text" class="form__input" placeholder="Title">
											<textarea class="form__textarea" placeholder="Review"></textarea>
											<div class="form__slider">
												<div class="form__slider-rating" id="slider__rating"></div>
												<div class="form__slider-value" id="form__slider-value"></div>
											</div>
											<button type="button" class="form__btn">Send</button>
										</form>
									</div>
								</div>
								<!-- end reviews -->
							</div>
						</div>

						
					</div>
					<!-- end content tabs -->
				</div>

			
			</div>
		</div>
	</section>
	<!-- end content -->



	<!-- Root element of PhotoSwipe. Must have class pswp. -->
	<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

		<!-- Background of PhotoSwipe. 
		It's a separate element, as animating opacity is faster than rgba(). -->
		<div class="pswp__bg"></div>

		<!-- Slides wrapper with overflow:hidden. -->
		<div class="pswp__scroll-wrap">

			<!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
			<!-- don't modify these 3 pswp__item elements, data is added later on. -->
			<div class="pswp__container">
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
			</div>

			<!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
			<div class="pswp__ui pswp__ui--hidden">

				<div class="pswp__top-bar">

					<!--  Controls are self-explanatory. Order can be changed. -->

					<div class="pswp__counter"></div>

					<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

					<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

					<!-- Preloader -->
					<div class="pswp__preloader">
						<div class="pswp__preloader__icn">
							<div class="pswp__preloader__cut">
								<div class="pswp__preloader__donut"></div>
							</div>
						</div>
					</div>
				</div>

				<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>

				<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>

				<div class="pswp__caption">
					<div class="pswp__caption__center"></div>
				</div>
			</div>
		</div>
	</div>

	<!-- JS -->
	<?php
include('inc/foot.php');
?>