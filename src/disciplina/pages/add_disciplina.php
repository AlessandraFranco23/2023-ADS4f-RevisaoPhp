<?php
include __DIR__ . "/../../partials/header.php";
?>

<?php
if (isset($_POST["nome"]) && $_POST['nome'] != "") {
    require_once __DIR__ . '/../actions/disciplina.php';
    $nome = $_POST["nome"];
    $codDisciplina = $_POST["codDisciplina"];
    $descricao = $_POST['descricao'];
    $professor = $_POST['professor'];
    $horario = $_POST['horario'];
    $sala = $_POST['sala'];
   
    
        //executando a ação de criar
        createDisciplinaAction(
            $nome,
            $codDisciplina,
            $descricao,
            $horario,
            $sala
        );
}

?>
<main>
    <div class="container-fluid py-5 bg-success bg-gradient">
        <h1 class="text-center text-light">Cadastro Disciplina</h1>
    </div>
    <div class="container py-5">
        <form action="" method="post">
            <div class="row py-2">
                <div class="col">
                    <label for="form_nome" class="form-label">Nome da matéria</label>
                    <input id="form_nome" type="text" placeholder="Nome da matéria" name="nome" class="form-control" required>
                </div>
                <div class="col">
                    <label for="form_descricao" class="form-label">Descrição da matéria</label>
                    <textarea id="form_descricao" name="descricao" class="form-control"></textarea>
                </div>
                <div class="col-2">
                    <label for="form_codDisciplina" class="form-label">Código da disciplina</label>
                    <input id="form_codDisciplina" type="text" placeholder="000" name="codDisciplina" class="form-control" required>
                </div>
            </div>
            <div class="row">
               
                <div class="col-2">
                    <label for="form_horario" class="form-label">Horário da matéria</label>
                    <input id="form_horario" type="time" placeholder="00:00" name="horario" class="form-control" required>
                </div>
                <div class="col-2">
                    <label for="form_sala" class="form-label">Número da sala</label>
                    <input id="form_sala" type="text" placeholder="Sala" name="sala" class="form-control" required>
                </div>
            </div>
            <div class="">
                <input type="submit" class="btn btn-success mt-3" value="Enviar cadastro">
            </div>
        </form>
    </div>
</main>
<?php
include __DIR__ . "/../../partials/footer.php";
?>