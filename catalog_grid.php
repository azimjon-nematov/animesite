<?php 
include('db.php');
$session_id = session_id();
if ($session_id == "") {
	session_start();
	$session_id = session_id();
}

// Функция для генерации ссылок на страницы 
function generatePaginationLinks($totalPages, $currentPage) {
    $links = '';

    // Определите, сколько ссылок на страницы показывать слева и справа от текущей страницы
    $showPages = 5; // Количество отображаемых страниц

    // Рассчитайте начальную и конечную страницы
    $startPage = max(1, $currentPage - floor($showPages / 2));
    $endPage = min($totalPages, $startPage + $showPages - 1);

    // Ссылка на предыдущую страницу
    $prevPage = $currentPage - 1;
    $prevLink = $prevPage > 0 ? "<li class='paginator__item paginator__item--prev'><a href='?page={$prevPage}'><i class='icon ion-ios-arrow-back'></i></a></li>" : "";

    // Генерация ссылок на страницы
    for ($i = $startPage; $i <= $endPage; $i++) {
        $activeClass = $i == $currentPage ? "paginator__item--active" : "";
        $links .= "<li class='paginator__item {$activeClass}'><a href='?page={$i}'>{$i}</a></li>";
    }

    // Ссылка на следующую страницу
    $nextPage = $currentPage + 1;
    $nextLink = $nextPage <= $totalPages ? "<li class='paginator__item paginator__item--next'><a href='?page={$nextPage}'><i class='icon ion-ios-arrow-forward'></i></a></li>" : "";

    return $prevLink . $links . $nextLink;
}


if ("application/x-www-form-urlencoded" == $_SERVER["CONTENT_TYPE"] && isset($_POST['searchText'])) {
	$searchText = '%' . $_POST['searchText'] . '%';
	$sql = "SELECT a.id 'id', a.title, a.`desc`, s.`name` as 'studio', a.releaseDate, a.ageLimit, a.coverImage FROM anime a LEFT JOIN studio s ON a.studio_id = s.id WHERE a.title LIKE ?";

	$animes = SELECT($sql, "s", [$searchText]);

	for($i = 0; $i < count($animes); ++$i) {
		$sql = "SELECT g.name FROM genre g LEFT JOIN anime_genre ag ON g.id = ag.genre_id WHERE ag.anime_id = ?";
		$animes[$i]['genres'] = SELECT($sql, 'i', [$animes[$i]['id']]);
	}

	foreach($animes as $anime): ?>
		<!-- card -->
	<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
		<div class="card">
			<div class="card__cover">
				<!-- <img src="<?=$anime['coverImage']?>" alt=""> -->
				<?php echo '<img src="' . $anime['coverImage'] . '" alt="">'; ?>
				<a href="#" class="card__play">
					<i class="icon ion-ios-play"></i>
				</a>
			</div>
			<div class="card__content">
				<h3 class="card__title"><a href="details.php?id=<?=$anime['id']?>"><?=$anime["title"]?></a></h3>
				<span class="card__category">
					<!-- TODO: fix link -->
					<?php 
						foreach($anime['genres'] as $genre) {
							echo '<a href="#">' . $genre["name"] . '</a>';
						}
					?>
				</span>
				<span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
			</div>
		</div>
	</div>
	<!-- end card -->
	<?php endforeach; ?>
		<!-- paginator -->
		<div class="col-12">

			<ul class="paginator">
				<?php 
				$totalPages = count($animes) / 30;
				echo generatePaginationLinks($totalPages, 1); 
				?>
			</ul>
			
		</div>
		<!-- end paginator -->
	<?php
	exit();
}



$animes = [];

if (isset($_GET['search'])) {
	$search = '%' . $_GET['search'] . '%';
	// echo $search;
	// die();
	$sql = "SELECT a.id 'id', a.title, a.`desc`, s.`name` as 'studio', a.releaseDate, a.ageLimit, a.coverImage FROM anime a LEFT JOIN studio s ON a.studio_id = s.id WHERE a.title LIKE ?";

	$animes = SELECT($sql, "s", [$search]);
} else {
	$sql = "SELECT a.id 'id', a.title, a.`desc`, s.`name` as 'studio', a.releaseDate, a.ageLimit, a.coverImage FROM anime a LEFT JOIN studio s ON a.studio_id = s.id";
	$animes = SELECT($sql);
}

$genres = SELECT( "SELECT * FROM genre");

for($i = 0; $i < count($animes); ++$i) {
	$sql = "SELECT g.name FROM genre g LEFT JOIN anime_genre ag ON g.id = ag.genre_id WHERE ag.anime_id = ?";
	$animes[$i]['genres'] = SELECT($sql, 'i', [$animes[$i]['id']]);
}


$totalPages = 10; // Общее количество страниц
$current_page = isset($_GET['page']) ? max(1, min((int)$_GET['page'], $totalPages)) : 1;












?>

<?php include 'inc/head.php'; ?>

<script type="text/javascript">
	function searchAnimes() {
		var searchText = encodeURIComponent(document.getElementById("search").value);
		var xhr = new XMLHttpRequest();
		xhr.open('POST', '');
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xhr.onreadystatechange = handleFunc;
		function handleFunc() {
			if(xhr.readyState === 4 && xhr.status === 200) {
				var animeContainer = document.getElementById("animeContainer");
				//document.getElementById("text").value = '';
				animeContainer.innerHTML = xhr.responseText;

			} else {
				// alert(xhr.readyState);
				// alert(xhr.status);
				// alert(xhr.responseText);
			}
		};
		xhr.send('searchText='+searchText);
	}
</script>
		<!-- header search -->
		<form class="header__search">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="header__search-content">
							<input id="search" onchange="searchAnimes()" oncvaluechange="searchAnimes()" name="search" type="text" placeholder="Search for a movie, TV Series that you are looking for">

							<button onclick="searchAnimes()" type="button">search</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		<!-- end header search -->
	</header>
	<!-- end header -->

	<!-- page title -->
	<section class="section section--first section--bg" data-bg="img/section/section.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__wrap">
						<!-- section title -->
						<h2 class="section__title">Полнометражные фильмы</h2>
						<!-- end section title -->

						<!-- breadcrumb -->
						<ul class="breadcrumb">
							<li class="breadcrumb__item"><a href="#">Домой</a></li>
							<li class="breadcrumb__item breadcrumb__item--active">Полнометражные фильмы</li>
						</ul>
						<!-- end breadcrumb -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end page title -->

	<!-- filter -->
	<div class="filter">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="filter__content">
						<div class="filter__items">
							<!-- filter item -->
							<div class="filter__item" id="filter__genre">
								<span class="filter__item-label">Жанры:</span>

								<div class="filter__item-btn dropdown-toggle" role="navigation" id="filter-genre" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<input type="button" value="Исекай">
									<span></span>
								</div>

								<ul class="filter__item-menu dropdown-menu scrollbar-dropdown" aria-labelledby="filter-genre">
									<?php
										foreach ($genres as $genre) {
											echo "<li>" . $genre['name'] . "</li>";
										}
									?>
								</ul>
							</div>
							<!-- end filter item -->

							<!-- filter item -->
							<div class="filter__item" id="filter__quality">
								<span class="filter__item-label">Качество:</span>

								<div class="filter__item-btn dropdown-toggle" role="navigation" id="filter-quality" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<input type="button" value="HD 1080">
									<span></span>
								</div>

								<ul class="filter__item-menu dropdown-menu scrollbar-dropdown" aria-labelledby="filter-quality">
									<li>FHD 1080</li>
									<li>HD 720</li>
									<li>FSD 480</li>
									<li>SD 360</li>
								</ul>
							</div>
							<!-- end filter item -->

							<!-- filter item -->
							<div class="filter__item" id="filter__rate">
								<span class="filter__item-label">IMBd:</span>

								<div class="filter__item-btn dropdown-toggle" role="button" id="filter-rate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<div class="filter__range">
										<div id="filter__imbd-start"></div>
										<div id="filter__imbd-end"></div>
									</div>
									<span></span>
								</div>

								<div class="filter__item-menu filter__item-menu--range dropdown-menu" aria-labelledby="filter-rate">
									<div id="filter__imbd"></div>
								</div>
							</div>
							<!-- end filter item -->

							<!-- filter item -->
							<div class="filter__item" id="filter__year">
								<span class="filter__item-label">RELEASE YEAR:</span>

								<div class="filter__item-btn dropdown-toggle" role="button" id="filter-year" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<div class="filter__range">
										<div id="filter__years-start"></div>
										<div id="filter__years-end"></div>
									</div>
									<span></span>
								</div>

								<div class="filter__item-menu filter__item-menu--range dropdown-menu" aria-labelledby="filter-year">
									<div id="filter__years"></div>
								</div>
							</div>
							<!-- end filter item -->
						</div>
						
						<!-- filter btn -->
						<button class="filter__btn" type="button">apply filter</button>
						<!-- end filter btn -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end filter -->

	<!-- catalog -->
	<div class="catalog">
		<div class="container">
			<div id="animeContainer" class="row">



				<?php foreach($animes as $anime): ?>
					<!-- card -->
				<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
					<div class="card">
						<div class="card__cover">
							<!-- TODO: fix link -->
							<!-- <img src="assets/img/covers/cover.jpg" alt=""> -->
							<?php echo '<img src="' . $anime['coverImage'] . '" alt="">'; ?>
							<a href="#" class="card__play">
								<i class="icon ion-ios-play"></i>
							</a>
						</div>
						<div class="card__content">
							<h3 class="card__title"><a href="details.php?id=<?=$anime['id']?>"><?=$anime["title"]?></a></h3>
							<span class="card__category">
								<!-- TODO: fix link -->
								<?php 
									foreach($anime['genres'] as $genre) {
										echo '<a href="#">' . $genre["name"] . '</a>';
									}
								?>
							</span>
							<span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
						</div>
					</div>
				</div>
				<!-- end card -->
				<?php endforeach;?>
				


				<!-- paginator -->
				<div class="col-12">

						<ul class="paginator">
							<?php echo generatePaginationLinks($totalPages, $current_page); ?>
        				</ul>
					
				</div>
				<!-- end paginator -->
			</div>
		</div>
	</div>
	<!-- end catalog -->




	<!-- JS -->
	<?php
include('inc/foot.php');
?>