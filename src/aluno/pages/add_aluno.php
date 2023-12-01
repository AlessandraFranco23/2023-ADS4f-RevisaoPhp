<?php
include __DIR__ . "/../../partials/header.php";
?>
<?php

if (isset($_POST["nome"]) && $_POST['nome'] != "") {

    require_once __DIR__ . '/../actions/aluno.php';

    $nome = $_POST["nome"];
    $dtNascimento = $_POST["dtNascimento"];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $matricula = $_POST['matricula'];
    $curso = $_POST['curso'];
    $semestre = $_POST['semestre'];
    $disciplina = $_POST['disciplina'];
    $dtContratacao = $_POST['dtIngresso'];


    //executando a ação de criar
    createAlunoAction(
        $nome,
        $dtNascimento,
        $email,
        $telefone,
        $matricula,
        $curso,
        $semestre,
        $disciplina,
        $dtContratacao
    );
}
?>
<main>
    <div class="container-fluid py-5 bg-success bg-gradient">
        <h1 class="text-center text-light">Cadastro Aluno</h1>
    </div>
    <div class="container py-5">
        <form action="" method="POST">
            <div class="row py-2">
                <div class="col">
                    <label for="form_nome" class="form-label">Nome completo</label>
                    <input id="form_nome" type="text" placeholder="Nome completo" name="nome" class="form-control" required>
                </div>
                <div class="col">
                    <label for="form_email" class="form-label">E-mail</label>
                    <input id="form_email" type="email" placeholder="eu@examepl.com" name="email" class="form-control" required>
                </div>
                <div class="col-2">
                    <label for="form_dtNascimento" class="form-label">Data de nascimento</label>
                    <input id="form_dtNascimento" type="date" placeholder="00/00/0000" name="dtNascimento" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="form_matricula" class="form-label">Número de matrícula</label>
                    <input id="form_matricula" type="text" placeholder="N° matricula" name="matricula" class="form-control" required>
                </div>
                <div class="col">
                    <label for="form_curso" class="form-label">Curso</label>
                    <input id="form_curso" type="text" placeholder="Curso" name="curso" class="form-control" required>
                </div>
                <div class="col-2">
                    <label for="form_telefone" class="form-label">Telefone</label>
                    <input id="form_telefone" type="tel" placeholder="(00) 000000000" name="telefone" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="form_semestre" class="form-label">Semestre</label>
                    <input id="form_semestre" type="text" placeholder="Semestre" name="semestre" class="form-control" required>
                </div>
                <div class="col">
                    <label for="form_disciplina" class="form-label">Disciplina</label>
                    <select class="form-select" name="disciplina" aria-label="Disciplina">
                        <option selected>Selecione a Disciplina</option>

                        <?php
                        require_once __DIR__ . '/../../disciplina/actions/disciplina.php';
                        $disciplinas = readDisciplinaAction();
                        foreach ($disciplinas as $disciplina) :
                        ?>
                            <option value=<?php echo $disciplina['idDisciplina']; ?>> <?php echo $disciplina['nome']; ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                </div>
                <div class="col-2">
                    <label for="form_dtIngresso" class="form-label">Data do ingressso</label>
                    <input id="form_dtIngresso" type="date" placeholder="00/00/0000" name="dtIngresso" class="form-control" required>
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