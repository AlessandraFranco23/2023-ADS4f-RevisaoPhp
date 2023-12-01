<?php

function findAlunoDb($id)
{

    include_once __DIR__ . "/../../../config/connection.php";

    try {
        $sql = "SELECT * FROM aluno WHERE idAluno = $id";
        $resultado = $pdo->query($sql);
        $aluno = $resultado->fetch(PDO::FETCH_ASSOC);

        $sql = "SELECT * FROM disciplina";
        $resultado = $pdo->query($sql);
        $disciplinas = $resultado->fetchAll(PDO::FETCH_ASSOC);

        $aluno['disciplinas'] = $disciplinas;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    return $aluno;
}

function createAlunoDb(
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
    include_once __DIR__ . "/../../../config/connection.php";

    if (
        $name && $email && $dtNascimento && $telefone && $matricula &&
        $curso &&
        $semestre &&
        $disciplina &&
        $dtContratacao
    ) {
        try {
            $sql = "INSERT INTO `aluno`(`nome`, `dtNascimento`, `email`, `telefone`, `matricula`, `curso`, `semestre`, `idDisciplina`, `dtContratacao`) VALUES (:nome,:dtNascimento,:email,:telefone,:matricula,:curso,:semestre,:idDisciplina,:dtContratacao)";
            $pdo = $pdo->prepare($sql);
            // executa a query com os parâmetros
            $pdo->bindParam(":nome", $name);
            $pdo->bindParam(":dtNascimento", $dtNascimento);
            $pdo->bindParam(":email", $email);
            $pdo->bindParam(":telefone", $telefone);
            $pdo->bindParam(":matricula", $matricula);
            $pdo->bindParam(":curso", $curso);
            $pdo->bindParam(":semestre", $semestre);
            $pdo->bindParam(":idDisciplina", $disciplina);
            $pdo->bindParam(":dtContratacao", $dtContratacao);



            $pdo->execute();
            return true;
        } catch (PDOException $e) {

            return false;
        }
    }

    return false;
}

function readAlunoDb()
{
    include_once __DIR__ . "/../../../config/connection.php";
    $alunos = [];

    $sql = "SELECT a.idAluno, a.nome, a.dtNascimento, a.email, a.telefone, a.matricula, a.curso, a.semestre, d.nome as disciplina, a.dtContratacao  FROM aluno a
    join disciplina d on d.idDisciplina = a.idDisciplina ";
    try {
        $resultado = $pdo->query($sql);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    if ($resultado->rowCount() > 0)
        $alunos = $resultado->fetchAll(PDO::FETCH_ASSOC);

    return $alunos;
}

function updateAlunoDb(
    $id,
    $nome,
    $email,
    $telefone,
    $curso,
    $semestre,
    $disciplina
) {
    include_once __DIR__ . "/../../../config/connection.php";

    if (
        $nome && $email && $telefone  &&
        $curso &&
        $semestre &&
        $disciplina
    ) {
        $sql = "UPDATE aluno SET nome = '$nome', email = '$email', curso = '$curso', telefone = '$telefone', semestre = '$semestre', idDisciplina = '$disciplina' WHERE idAluno = $id";
        $pdo->query($sql);
        return true;
    }

    return false;
}

function deleteAlunoDb($id)
{
    include_once __DIR__ . "/../../../config/connection.php";

    if ($id) {
        $sql = "DELETE FROM aluno WHERE idAluno  = '$id'";
        $pdo->query($sql);
        return true;
    }

    return false;
}
