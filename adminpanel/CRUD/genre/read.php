<?php

include('db/createConnectionWithDB.php');

$sql = "SELECT * FROM genre";
$stmt = $pdo->query($sql);
$genres = $stmt->fetchAll(PDO::FETCH_ASSOC);
