<?php
include('connectionDB.php');

$host = 'localhost';
$db = 'animesite';
$user = 'root';
$password = 'root';

    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);