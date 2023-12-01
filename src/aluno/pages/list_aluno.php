<?php
$titulo = "Painel de Controle - Listagem Alunos";
include_once __DIR__ . "/../../partials/header.php";
require_once __DIR__ . '/../../modules/messages.php';

?>

<div class="row py-2">
    <div class="container-fluid py-5 bg-success bg-gradient">
        <h1 class="text-center text-light">Listagem Alunos</h1>
    </div>

    <div class="row flex-center">
        <?php if (isset($_GET['message'])) echo (printMessage($_GET['message'])); ?>
    </div>
</div>
<div class="row justify-content-end">
    <div class="col-2">
        <a class="btn btn-success text-white" href="./add_aluno.php">Novo</a>
    </div>
</div>
<div class="container">

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Data de Nascimento</th>
                <th scope="col">Email</th>
                <th scope="col">Telefone</th>
                <th scope="col">Matricula</th>
                <th scope="col">Curso </th>
                <th scope="col">Semestre</th>
                <th scope="col">Disciplina</th>
                <th scope="col">Data de Ingresso</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

            <?php
            require_once __DIR__ . '/../actions/aluno.php';
            //executando a ação de ler
            $alunos = readAlunoAction();

            foreach ($alunos as $aluno) :
            ?>
                <tr>
                    <th scope="row"> <?php echo $aluno['idAluno']; ?></th>
                    <td> <?php echo $aluno['nome']; ?></td>
                    <td> <?php echo $aluno['dtNascimento']; ?></td>
                    <td> <?php echo $aluno['email']; ?></td>
                    <td> <?php echo $aluno['telefone']; ?></td>
                    <td> <?php echo $aluno['matricula']; ?></td>
                    <td> <?php echo $aluno['curso']; ?></td>
                    <td> <?php echo $aluno['semestre']; ?></td>
                    <td> <?php echo $aluno['disciplina']; ?></td>
                    <td> <?php echo $aluno['dtContratacao']; ?></td>
                    <td>
                        <a href="edit_aluno.php?idNot=<?php echo $aluno['idAluno']; ?>" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="bi bi-pencil"></i></a>
                        <a href="delete_aluno.php?idNot=<?php echo $aluno['idAluno']; ?>" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>

            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</div>
</div>
<?php
include __DIR__ . "/../../partials/footer_dash.php";
