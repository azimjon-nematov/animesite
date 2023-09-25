<?php

include('db/createConnectionWithDB.php');

$sql = "SELECT * FROM anime";
$stmt = $pdo->query($sql);
$animes = $stmt->fetchAll(PDO::FETCH_ASSOC);
