<?php

$hostname = "localhost";
$user = "root";
$password = "";
$database = "aularevisao";

$chave = "zXW3x14WYB"; // SELECT MD5 (CONCAT ('SENHADOUSUARIO', 'zXW3x14WYB')) AS md5_string;


$pdo = new PDO("mysql:host=$hostname;dbname=$database", $user, $password);

// check if table noticias exists
$sql = "SELECT * FROM noticias";
$resultado = $pdo->query($sql);
$resultado = $resultado->fetchAll(PDO::FETCH_ASSOC);

if (empty($resultado)) {
    $sql = fopen(__DIR__ . '/../banco.sql', 'r');
    $pdo->exec($sql);
    fclose($sql);
}
