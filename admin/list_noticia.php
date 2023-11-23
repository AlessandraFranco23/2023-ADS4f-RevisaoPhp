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
                <?php

                $sql = "SELECT * FROM noticias";
                $resultado = $pdo->query($sql);
                if ($resultado->rowCount() > 0) {
                    $resultado = $resultado->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($resultado as $noticia) :
                ?>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <!-- Título do item -->
                            <div class="ms-2 me-auto">
                                <?php echo $noticia['titulo']; ?>
                            </div>
                            <!-- sistema de botões -->
                            <ul class="list-inline m-0">
                                <!-- Editar -->
                                <li class="list-inline-item">
                                    <a href="edit_noticia.php?idNot=<?php echo $noticia['id']; ?>" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="bi bi-pencil"></i></a>
                                </li>
                                <!-- Excluir -->
                                <li class="list-inline-item">
                                    <a href="delete_noticia.php?idNot=<?php echo $noticia['id']; ?>" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="bi bi-trash"></i></a>
                                </li>
                            </ul>
                        </li>
                <?php
                    endforeach;
                } else {
                    echo "<li class='list-group-item d-flex justify-content-between align-items-start'>";
                    echo "<div class='ms-2 me-auto'>";
                    echo "<div class='fw-bold'>Nenhuma notícia cadastrada</div>";
                    echo "</div>";
                    echo "</li>";
                }

                ?>
            </ul>


        </div>
    </div>

    <?php

    include __DIR__ . "/footer_dash.php";
