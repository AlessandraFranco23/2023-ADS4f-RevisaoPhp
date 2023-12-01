<?php
$titulo = "Painel de Controle - Listagem Disciplinas";
include_once __DIR__ . "/../../partials/header.php";
require_once __DIR__ . '/../../modules/messages.php';
?>

<div class="row py-2">
    <div class="container-fluid py-5 bg-success bg-gradient">
        <h1 class="text-center text-light">Listagem Disciplinas</h1>
    </div>
    <div class="row flex-center">
        <?php if (isset($_GET['message'])) echo (printMessage($_GET['message'])); ?>
    </div>
</div>
<div class="row justify-content-end">
    <div class="col-2">
        <a class="btn btn-success text-white" href="./add_disciplina.php">Novo</a>
    </div>
</div>
<div class="container">

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Cod da Disciplina</th>
                <th scope="col">Descrição</th>
                <th scope="col">Horário da Matéria</th>
                <th scope="col">Sala</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

            <?php
            require_once __DIR__ . '/../actions/disciplina.php';
            //executando a ação de ler
            $disciplinas = readDisciplinaAction();
            foreach ($disciplinas as $disciplina) :
            ?>
                <tr>
                    <th scope="row"> <?php echo $disciplina['idDisciplina']; ?></th>
                    <td> <?php echo $disciplina['nome']; ?></td>
                    <td> <?php echo $disciplina['codDisciplina']; ?></td>
                    <td> <?php echo $disciplina['mensagem']; ?></td>
                    <td> <?php echo $disciplina['horario']; ?></td>
                    <td> <?php echo $disciplina['sala']; ?></td>
                    <td><a href="edit_disciplina.php?idNot=<?php echo $disciplina['idDisciplina']; ?>" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="bi bi-pencil"></i></a>
                        <a href="delete_disciplina.php?idNot=<?php echo $disciplina['idDisciplina']; ?>" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="bi bi-trash"></i></a>
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
