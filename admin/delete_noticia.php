<?php

include_once __DIR__ . "/../config/connection.php";

if (isset($_GET['idNot'])) {
    $idNot = $_GET['idNot'];
    $sql = "DELETE FROM noticias WHERE id  = '$idNot'";
    $result = $pdo->query($sql);
    if ($result) {
        header("Location: list_noticia.php");
    }
}
