<?php
$titulo = "Editar Disciplina";
include_once __DIR__ . "/../../partials/header.php";
require_once __DIR__ . '/../actions/disciplina.php';

if (isset($_GET['idNot'])) {
    $idNot = $_GET['idNot'];
} else {
    header("Location: list_disciplina.php");
    exit();
}
$idNot = $_GET['idNot'];

if (isset($_POST['nome']) && isset($_POST['descricao'])  && isset($_POST['horario']) && isset($_POST['sala']) && isset($_POST['idDisciplina'])) {

    $idDisciplina = $_POST['idDisciplina'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $horario = $_POST['horario'];
    $sala = $_POST['sala'];

    //executando a ação de atulizar
    updateDisciplinaAction(
        $idDisciplina,
        $nome,
        $descricao,
        $horario,
        $sala
    );
}

//executando a ação de buscar
$resultado = findDisciplinaAction($idNot);

?>
<div class="container-fluid py-5 bg-success bg-gradient">
    <h1 class="text-center text-light">Editar Disciplina</h1>
</div>
<div class="container py-5">
    <div class="col py-2">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <input type="hidden" name="idDisciplina" value="<?php echo (isset($resultado['idDisciplina'])) ? $resultado['idDisciplina'] : "" ?>">
                    <label for="form_nome" class="form-label">Nome</label>
                    <input class="form-control" type="text" name="nome" placeholder="Nome Completo" id="nome" value="<?php echo $resultado['nome']; ?>">
                    </label>
                </div>
                <div class="col">
                    <label for="form_horario" class="form-label">Horário</label>
                    <input class="form-control" type="time" name="horario" placeholder="Horário" id="horario" value="<?php echo $resultado['horario']; ?>">
                    </label>
                </div>
                <div class="col">
                    <label for="form_sala" class="form-label">Sala</label>
                    <input class="form-control" type="text" name="sala" placeholder="Sala" id="sala" value="<?php echo $resultado['sala']; ?>">
                    </label>
                </div>
            </div>
            <div class="row py-2">
                <div class="col">
                    <label for="form_descricao" class="form-label">Descrição</label>
                    <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="10" placeholder="Descrição da matéria"><?php echo $resultado['mensagem']; ?></textarea>
                    </label>
                </div>
            </div>
            <input type="submit" class="btn btn-success" value="Enviar">
        </form>
    </div>
</div>
<?php
include_once __DIR__ . "/../../partials/footer.php";
?>