<?php
@session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}
$titulo = "Painel de Controle - Listar Notícias";
include_once __DIR__ . "/header_dash.php";
?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3>Listar notícias</h3>
            <p>Explicação sobre a listagem de notícias</p>
            <?php
            // condicional ternário
            echo (isset($mensagem)) ? "<p class='alert alert-secondary'>$mensagem</p>" : "";
            ?>
        </div>
        <div class="col-md-6">
            

        </div>
    </div>

    <?php

    include __DIR__ . "/footer_dash.php";
