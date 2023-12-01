<?php

function findProfessorDb($id)
{

    include_once __DIR__ . "/../../../config/connection.php";

    try {
        $sql = "SELECT * FROM professor WHERE idProfessor = $id";
        $resultado = $pdo->query($sql);
        $professor = $resultado->fetch(PDO::FETCH_ASSOC);

        $sql = "SELECT * FROM disciplina";
        $resultado = $pdo->query($sql);
        $disciplinas = $resultado->fetchAll(PDO::FETCH_ASSOC);

        $professor['disciplinas'] = $disciplinas;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
    return $professor;
}

function createProfessorDb(
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
    include_once __DIR__ . "/../../../config/connection.php";

    if (
        $name && $email && $dtNascimento && $telefone && $registro &&
        $departamento &&
        $cargaHoraria &&   $disciplina &&
        $dtContratacao
    ) {
        try {
            $sql = "INSERT INTO `professor`( `nome`, `dtNascimento`, `email`, `telefone`, `registro`, `departamento`, `cargaHoraria`, `idDisciplina`, `dtContratacao`) VALUES (:nome,:dtNascimento,:email,:telefone,:registro,:departamento,:cargaHoraria,:disciplina,:dtContratacao)";
            $pdo = $pdo->prepare($sql);

            // executa a query com os parâmetros
            $pdo->bindParam(":nome", $name);
            $pdo->bindParam(":dtNascimento", $dtNascimento);
            $pdo->bindParam(":email", $email);
            $pdo->bindParam(":telefone", $telefone);
            $pdo->bindParam(":registro", $registro);
            $pdo->bindParam(":departamento", $departamento);
            $pdo->bindParam(":cargaHoraria", $cargaHoraria);
            $pdo->bindParam(":disciplina", $disciplina);
            $pdo->bindParam(":dtContratacao", $dtContratacao);

            // executa a query
            $pdo->execute();
            return true;
        } catch (PDOException $e) {

            return false;
        }
    }
    
    return false;
}

function readProfessorDb()
{
    include_once __DIR__ . "/../../../config/connection.php";
    $professores = [];

    $sql = "SELECT a.idProfessor, a.nome, a.dtNascimento, a.email, a.telefone, a.registro, a.departamento, a.cargaHoraria, d.nome as disciplina, a.dtContratacao FROM professor a join disciplina d on d.idDisciplina = a.idDisciplina;";
    try {
        $resultado = $pdo->query($sql);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    if ($resultado->rowCount() > 0)
        $professores = $resultado->fetchAll(PDO::FETCH_ASSOC);

    return $professores;
}

function updateProfessorDb(
    $id,
    $nome,
    $email,
    $telefone,
    $departamento,
    $cargaHoraria,
    $disciplina
) {
    include_once __DIR__ . "/../../../config/connection.php";

    if (
        $nome && $email  && $telefone  &&
        $departamento &&
        $cargaHoraria &&
        $disciplina
    ) {
        $sql = "UPDATE professor SET nome = '$nome', email = '$email', departamento = '$departamento', telefone = '$telefone', cargaHoraria = '$cargaHoraria', idDisciplina = '$disciplina' WHERE idProfessor = $id";
        $pdo->query($sql);
        return true;
    }
    return false;
}

function deleteProfessorDb($id)
{
    include_once __DIR__ . "/../../../config/connection.php";

    if ($id) {
        $sql = "DELETE FROM professor WHERE idProfessor  = '$id'";
        $pdo->query($sql);
        return true;
    }

    return false;
}
