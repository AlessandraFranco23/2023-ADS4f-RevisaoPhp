<?php

$hostname = "localhost";
$user = "root";
$password = "senac2023@Alessandra";
$database = "aeo";


try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$database", $user, $password);
} catch (\Throwable $th) {
    die('Erro de conexão com o banco de dados: ' . $th->getMessage());
}