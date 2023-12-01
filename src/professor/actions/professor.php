<?php
require_once __DIR__ . '/../database/professor.php';

//Foi utilizado essa arquitetura como exemplo: https://github.com/MatheusHonorato/crud-php-mysql-procedural/tree/main
//Função para procurar o professor por id
function findProfessorAction($id)
{
    return findProfessorDb($id);
}

//Função para ler os professores do banco
function readProfessorAction()
{
    return readProfessorDb();
}

//Função para criar o professor
function createProfessorAction(
    $name,
    $dtNascimento,
    $email,
    $telefone,
    $registro,
    $departamento,
    $cargaHoraria,
    $disciplina,
    $dtContratacao
) {
    $createProfessorDb = createProfessorDb(
        $name,
        $dtNascimento,
        $email,
        $telefone,
        $registro,
        $departamento,
        $cargaHoraria,
        $disciplina,
        $dtContratacao
    );
    //Validação para criação do professor
    $message = $createProfessorDb == 1 ? 'success-create' : 'error-create';
    return  header("Location: ../pages/list_professor.php?message=$message");
}

//Função para atualizar o professor
function updateProfessorAction(
    $id,
    $nome,
    $email,
    $telefone,
    $departamento,
    $cargaHoraria,
    $disciplina
) {
    $updateProfessorDb = updateProfessorDb(
        $id,
        $nome,
        $email,
        $telefone,
        $departamento,
        $cargaHoraria,
        $disciplina
    );
    $message = $updateProfessorDb == 1 ? 'success-update' : 'error-update';
    return  header("Location: ../pages/list_professor.php?message=$message");
}

//Função para deletar o professor por id
function deleteProfessorAction($id)
{
    $deleteProfessorDb = deleteProfessorDb($id);
    $message = $deleteProfessorDb == 1 ? 'success-remove' : 'error-remove';
    return  header("Location: ../pages/list_professor.php?message=$message");
}
