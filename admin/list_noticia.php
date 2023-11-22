<?php
// inicia a sessão em PHP
@session_start();
// verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    // se não estiver logado, redireciona para a página de login
    header("Location: index.php");
    // encerra o script
    exit();
}


$titulo = "Painel de Controle - Listar Notícias";
include_once __DIR__ . "/header_dash.php";
include_once __DIR__ . "/../config/connection.php";
?>

<div class="container p-3">
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

            <ul class="list-group list-group-numbered">
                <!-- Começo a listagem -->

                <!-- Inicio gabarito item -->
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <!-- Título do item -->
                    <div class="ms-2 me-auto">
                        Item
                    </div>
                    <!-- sistema de botões -->
                    <ul class="list-inline m-0">
                        <!-- Editar -->
                        <li class="list-inline-item">
                            <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="bi bi-pencil"></i></button>
                        </li>
                        <!-- Excluir -->
                        <li class="list-inline-item">
                            <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="bi bi-trash"></i></button>
                        </li>
                    </ul>
                </li>
                <!-- fim gabarito item -->

            </ul>


        </div>
    </div>

    <?php

    include __DIR__ . "/footer_dash.php";
