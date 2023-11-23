<?php

// insere o arquivo de conexão com o banco de dados
include_once __DIR__ . "/../config/connection.php";

// verifica se o id da notícia foi enviado
if (isset($_GET['idNot'])) {
    // recebe o id da notícia
    $idNot = $_GET['idNot'];
    // cria a query de exclusão
    $sql = "DELETE FROM noticias WHERE id  = '$idNot'";
    // executa a query
    $result = $pdo->query($sql);
    // verifica se a exclusão foi realizada com sucesso
    if ($result) {
        header("Location: list_noticia.php");
    }
}
