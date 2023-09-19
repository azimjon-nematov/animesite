<?php

$host = 'localhost';
$db = 'animesite';
$user = 'root';
$password = 'root';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Ошибка подключения к базе данных: " . $e->getMessage();
}


    // public function getAllGenres() {
    //     $sql = "SELECT * FROM genre";
    //     $stmt = $this->conn->query($sql);
    //     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     return $result;
    // }

    // public function getAllAnimeGenres() {
    //     $sql = "SELECT * FROM anime_genre";
    //     $stmt = $this->conn->query($sql);
    //     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     return $result;
    // }



?>