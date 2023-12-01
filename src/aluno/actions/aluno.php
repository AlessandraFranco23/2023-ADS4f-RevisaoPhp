<?php
require_once __DIR__ . '/../database/aluno.php';

//Foi utilizado essa arquitetura como exemplo: https://github.com/MatheusHonorato/crud-php-mysql-procedural/tree/main
//Função para procurar o aluno por id
function findAlunoAction($id)
{
    return findAlunoDb($id);
}

//Função para ler os alunos do banco
function readAlunoAction()
{
    return readAlunoDb();
}

//Função para criar o aluno
function createAlunoAction(
    $name,
    $dtNascimento,
    $email,
    $telefone,
    $matricula,
    $curso,
    $semestre,
    $disciplina,
    $dtContratacao
) {
    $createAlunoDb = createAlunoDb(
        $name,
        $dtNascimento,
        $email,
        $telefone,
        $matricula,
        $curso,
        $semestre,
        $disciplina,
        $dtContratacao
    );
   
    //Validação para criação do aluno
    $mensage = $createAlunoDb == 1 ? 'success-create' : 'error-create';
    return  header("Location: ../pages/list_aluno.php?message=$mensage");
}

//Função para atualizar o aluno
function updateAlunoAction(
    $id,
    $name,
    $email,
    $telefone,
    $curso,
    $semestre,
    $disciplina,
) {
    $updateAlunoDb = updateAlunoDb(
        $id,
        $name,
        $email,
        $telefone,
        $curso,
        $semestre,
        $disciplina
    );
    $mensage = $updateAlunoDb == 1 ? 'success-update' : 'error-update';
    return  header("Location: ../pages/list_aluno.php?message=$mensage");
}

//Função para deletar o aluno por id
function deleteAlunoAction($id)
{
    $deleteAlunoDb = deleteAlunoDb($id);
    $mensage = $deleteAlunoDb == 1 ? 'success-remove' : 'error-remove';
    return  header("Location: ../pages/list_aluno.php?message=$mensage");
}
