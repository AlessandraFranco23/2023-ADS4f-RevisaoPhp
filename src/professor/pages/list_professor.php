<?php

$titulo = "Painel de Controle - Listagem professores";
include_once __DIR__ . "/../../partials/header.php";
require_once __DIR__ . '/../actions/professor.php';
require_once __DIR__ . '/../../modules/messages.php';
?>

<div class="row py-2">
    <div class="container-fluid py-5 bg-success bg-gradient">
        <h1 class="text-center text-light">Listagem Professores</h1>
    </div>
 
</div>
<div class="row flex-center">
        <?php if (isset($_GET['message'])) echo (printMessage($_GET['message'])); ?>
    </div>
<div class="row justify-content-end">
    <div class="col-2">
        <a class="btn btn-success text-white" href="./add_professor.php">Novo</a>
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
                <th scope="col">Registro</th>
                <th scope="col">Departamento</th>
                <th scope="col">Carga Horária</th>
                <th scope="col">Disciplina</th>
                <th scope="col">Data de Contratação</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

            <?php
            //executando a ação de ler
            $professores = readProfessorAction();
            foreach ($professores as $professor) :
            ?>
                <tr>
                    <th scope="row"> <?php echo $professor['idProfessor']; ?></th>
                    <td> <?php echo $professor['nome']; ?></td>
                    <td> <?php echo $professor['dtNascimento']; ?></td>
                    <td> <?php echo $professor['email']; ?></td>
                    <td> <?php echo $professor['telefone']; ?></td>
                    <td> <?php echo $professor['registro']; ?></td>
                    <td> <?php echo $professor['departamento']; ?></td>
                    <td> <?php echo $professor['cargaHoraria']; ?></td>
                    <td> <?php echo $professor['disciplina']; ?></td>
                    <td> <?php echo $professor['dtContratacao']; ?></td>
                    <td><a href="edit_professor.php?idNot=<?php echo $professor['idProfessor']; ?>" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="bi bi-pencil"></i></a>
                        <a href="delete_professor.php?idNot=<?php echo $professor['idProfessor']; ?>" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="bi bi-trash"></i></a>
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
include __DIR__ . "/../../partials/footer.php";
