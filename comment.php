<?php 

include 'Log.php';
include 'db.php';

session_start();
$session_id = session_id();

if(empty($_POST["animeId"]) || empty($_SESSION['user_id'])) {
	http_response_code(400);
	echo "Error";
	die();
}
if(empty($_POST["text"])) {
	http_response_code(400);
	die();
}
$animeId = $_POST["animeId"];
$text =  htmlspecialchars($_POST["text"]);
$user_id = $_SESSION["user_id"];

$sql = "INSERT INTO `comment`(`text`, anime_id, user_id, parent_id, createDate) VALUES(?, ?, ?, NULL, NOW())";
$now = DateTime::createFromFormat('U.u', microtime(true));
try {
	$commentId = executeAndSelectId($sql, 'sii', [$text, $animeId, $user_id]);
} catch (Throwable $e) {
	new Log($e);
	http_response_code(500);
	echo $e->getMessage();
	die();
}

$userName = empty($_SESSION['user_id']) ? "unknown" : $_SESSION['user_id'];
?>

<li class="comments__item">
	<div class="comments__autor">
		<img class="comments__avatar" src="assets/img/user.png" alt="">
		<span class="comments__name"><?=$userName?></span>
		<span class="comments__time"><?=$now->format("d.m.Y, H:i")?></span>
	</div>
	<p class="comments__text"><?$text?></p>
	<div class="comments__actions">
		<button type="button"><i class="icon ion-ios-share-alt"></i>Reply</button>
	</div>
</li>

<!-- <li class="comments__item comments__item--answer">
	<div class="comments__autor">
		<img class="comments__avatar" src="img/user.png" alt="">
		<span class="comments__name">John Doe</span>
		<span class="comments__time">24.08.2018, 16:41</span>
	</div>
	<p class="comments__text">syka Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
	<div class="comments__actions">
		<button type="button"><i class="icon ion-ios-share-alt"></i>Reply</button>
	</div>
</li> -->