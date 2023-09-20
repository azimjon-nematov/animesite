<?php

include('db/createConnectionWithDB.php');

$sql = "SELECT * FROM studio";
$stmt = $pdo->query($sql);
$studios = $stmt->fetchAll(PDO::FETCH_ASSOC);
