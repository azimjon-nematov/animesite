<?php

include('db/createConnectionWithDB.php');

$sql = "SELECT * FROM season";
$stmt = $pdo->query($sql);
$seasons = $stmt->fetchAll(PDO::FETCH_ASSOC);
