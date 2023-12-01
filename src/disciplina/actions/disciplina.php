<?php
require_once __DIR__ . '/../database/disciplina.php';

//Foi utilizado essa arquitetura como exemplo: https://github.com/MatheusHonorato/crud-php-mysql-procedural/tree/main
//Função para procurar a disciplina por id
function findDisciplinaAction($id)
{
    return findDisciplinaDb($id);
}

//Função para ler as disciplinas do banco
function readDisciplinaAction()
{
    return readDisciplinaDb();
}

//Função para criar a dsiciplina
function createDisciplinaAction(
    $nome,
    $codDisciplina,
    $descricao,
    $horario,
    $sala
) {
    $createDisciplinaDb = createDisciplinaDb(
        $nome,
        $codDisciplina,
        $descricao,
        $horario,
        $sala
    );
    //Validação para criação da disciplina
    $message = $createDisciplinaDb == 1 ? 'success-create' : 'error-create';
    return  header("Location: ../pages/list_disciplina.php?message=$message");
}

//Função para atualizar a disciplina
function updateDisciplinaAction(
    $id,
    $nome,
    $descricao,
    $horario,
    $sala
) {

    $updateDisciplina = updateDisciplinaDb(
        $id,
        $nome,
        $descricao,
        $horario,
        $sala
    );
    $message = $updateDisciplina == 1 ? 'success-update' : 'error-update';

    return  header("Location: ../pages/list_disciplina.php?message=$message");
}

//Função para deletar a disciplina por id
function deleteDisciplinaAction($id)
{
    $deleteDisciplinaDb = deleteDisciplinaDb($id);
    $message = $deleteDisciplinaDb == 1 ? 'success-remove' : 'error-remove';
    return  header("Location: ../pages/list_disciplina.php?message=$message");
}
