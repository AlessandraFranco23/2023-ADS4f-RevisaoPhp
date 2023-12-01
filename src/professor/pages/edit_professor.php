<?php

$titulo = "Editar Professor";
include_once __DIR__ . "/../../partials/header.php";
require_once __DIR__ . '/../actions/professor.php';

if (isset($_GET['idNot'])) {

    $idNot = $_GET['idNot'];
} else {

    header("Location: list_professor.php");
    exit();
}

$idNot = $_GET['idNot'];

if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['departamento']) && isset($_POST['telefone'])  && isset($_POST['cargaHoraria']) && isset($_POST['disciplina']) && isset($_POST['idProfessor'])) {
    // recebe os dados do formulário
    $idProfessor = $_POST['idProfessor'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $departamento = $_POST['departamento'];
    $telefone = $_POST['telefone'];
    $cargaHoraria = $_POST['cargaHoraria'];
    $disciplina = $_POST['disciplina'];

    //executando a ação de atulizar
    updateProfessorAction(
        $idProfessor,
        $nome,
        $email,
        $telefone,
        $departamento,
        $cargaHoraria,
        $disciplina
    );

}

//executando a ação de buscar
$resultado = findProfessorAction($idNot);

$disciplinas = $resultado['disciplinas'];
?>
<div class="container-fluid py-5 bg-success bg-gradient">
    <h1 class="text-center text-light">Editar Professor</h1>
</div>
<div class="container py-5">
    <div class="col py-2">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <input type="hidden" name="idProfessor" value="<?php echo (isset($resultado['idProfessor'])) ? $resultado['idProfessor'] : "" ?>">
                    <label for="form_nome" class="form-label">Nome completo</label>
                    <input class="form-control" type="text" name="nome" placeholder="Nome Completo" id="nome" value="<?php echo $resultado['nome']; ?>">
                    </label>
                </div>
                <div class="col">
                    <label for="form_email" class="form-label">E-mail</label>
                    <input class="form-control" type="email" name="email" placeholder="Email" id="email" value="<?php echo $resultado['email']; ?>">
                    </label>
                </div>
                <div class="col">
                    <label for="form_departamento" class="form-label">Departamento</label>
                    <input class="form-control" type="text" name="departamento" placeholder="Departamento" id="departamento" value="<?php echo $resultado['departamento']; ?>">
                    </label>
                </div>
            </div>
            <div class="row py-2">
                <div class="col">
                    <label for="form_telefone" class="form-label">Telefone</label>
                    <input class="form-control" type="tel" name="telefone" placeholder="Telefone" id="telefone" value="<?php echo $resultado['telefone']; ?>">
                    </label>
                </div>
                <div class="col">
                    <label for="form_cargaHoraria" class="form-label">Carga Horária</label>
                    <input class="form-control" type="text" name="cargaHoraria" placeholder="Carga Horária" id="cargaHoraria" value="<?php echo $resultado['cargaHoraria']; ?>">
                    </label>
                </div>
                <div class="col">
                    <label for="form_disciplina" class="form-label">Disciplina</label>
                    <select class="form-select" name="disciplina" aria-label="Disciplina">
                        <option selected>Selecione a Disciplina</option>

                        <?php
                        foreach ($disciplinas as $disciplina) :
                            $selected = ($disciplina['idDisciplina'] == $resultado['idDisciplina']) ? 'selected' : '';
                        ?>
                            <option value=<?php echo $disciplina['idDisciplina']; ?> <?php echo $selected; ?>> <?php echo $disciplina['nome']; ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                </div>
            </div>
            <input type="submit" class="btn btn-success" value="Enviar">
        </form>
    </div>
</div>
<?php
include_once __DIR__ . "/../../partials/footer.php";
