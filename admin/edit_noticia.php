<?php
@session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

$titulo = "Editar Notícia";
include_once __DIR__ . "/header_dash.php";
include_once __DIR__ . "/../config/connection.php";

if (isset($_GET['idNot'])) {
    $idNot = $_GET['idNot'];
} else {
    header("Location: list_noticia.php");
    exit();
}

$idNot = $_GET['idNot'];

/* Atualização da notícia */
if (isset($_POST['form_titulo']) && isset($_POST['form_texto']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $titulo = $_POST['form_titulo'];
    $texto = $_POST['form_texto'];
    $sql = "UPDATE noticias SET titulo = '$titulo', conteudo = '$texto' WHERE id = $id";
    $pdo->query($sql);
    $mensagem = "Notícia atualizada com sucesso!";
}


$sql = "SELECT * FROM noticias WHERE id = $idNot";
$resultado = $pdo->query($sql);
$resultado = $resultado->fetch(PDO::FETCH_ASSOC);
if ($resultado) {
}




?>
<div class="container p-3">
    <div>
        <div class="row">
            <div class="col-md-6">
                <h3>Editar Notícia</h3>
                <p>A página de adicionar notícia é uma ferramenta que permite aos usuários criar e publicar notícias em
                    um site. Nesta página, o usuário pode inserir o título, o conteúdo da notícia. O usuário também pode visualizar a notícia antes de publicá-la ou salvá-la como
                    rascunho. A página de adicionar notícia facilita a comunicação e a divulgação de informações
                    relevantes para o público-alvo do site.


                </p>
                <?php
                echo (isset($mensagem)) ? "<p class='alert alert-secondary'>$mensagem</p>" : "";
                ?>
            </div>
            <div class="col-md-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div>
                        <input type="hidden" name="id" value="<?php echo (isset($resultado['id'])) ? $resultado['id'] : "" ?>">
                        <label for="titulo" class="form-label w-100">
                            <input class="form-control" type="text" name="form_titulo" placeholder="Título da notícia" id="titulo" value="<?php echo $resultado['titulo']; ?>">
                        </label>
                    </div>
                    <div>
                        <label for="texto" class="form-label w-100">
                            <textarea class="form-control" name="form_texto" id="texto" cols="30" rows="10" placeholder="Texto da notícia"><?php echo $resultado['conteudo']; ?></textarea>
                        </label>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Enviar">
                </form>


            </div>
        </div>

    </div>

</div>
<?php
include_once __DIR__ . "/footer_dash.php";
?>