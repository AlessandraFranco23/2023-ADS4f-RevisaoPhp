<?php
@session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['form_titulo']) && isset($_POST['form_texto'])) {

    include_once __DIR__ . "/../config/connection.php";

    $titulo = $_POST['form_titulo'];
    $texto = $_POST['form_texto'];
    $data_hoje = date("Y-m-d H:i:s");
    //  id	 titulo	 data	 conteudo
    $sql = "INSERT INTO noticias (titulo, data, conteudo) VALUES (:titulo, :data, :conteudo)";
    $pdo = $pdo->prepare($sql);
    $pdo->bindParam(":titulo", $titulo);
    $pdo->bindParam(":data", $data_hoje);
    $pdo->bindParam(":conteudo", $texto);
    $pdo->execute();


    if ($pdo->rowCount() == 1) {
        $mensagem = "Notícia inserida com sucesso!";
    } else {
        $mensagem = "Erro ao inserir notícia!";
    
    }
}


$titulo = "Adicionar Notícia";
include_once __DIR__ . "/header_dash.php";
?>

<div class="container">

    <?php
    include_once __DIR__ . "/menu.php";
    ?>
    <div>
        <h1>Adicionar Notícia</h1>
        <?php
        if (isset($mensagem)) {
            echo "<p>$mensagem</p>";
        }
        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="titulo" class="form-label">
                    <input class="form-control" type="text" name="form_titulo" placeholder="Título da notícia"
                        id="titulo">
                </label>
            </div>
            <div>
                <label for="texto" class="form-label">
                    <textarea class="form-control" name="form_texto" id="texto" cols="30" rows="10"
                        placeholder="Texto da notícia"></textarea>
                </label>
            </div>
            <input type="submit" class="btn btn-primary" value="Enviar">
        </form>
    </div>

</div>
<?php
include_once __DIR__ . "/footer_dash.php";
?>