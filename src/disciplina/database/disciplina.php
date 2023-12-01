<?php
function findDisciplinaDb($id)
{
    include_once __DIR__ . "/../../../config/connection.php";

    try {
        $sql = "SELECT * FROM disciplina WHERE idDisciplina = $id";

        $resultado = $pdo->query($sql);

        $disciplina = $resultado->fetch(PDO::FETCH_ASSOC);

        return $disciplina;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}

function createDisciplinaDb(
    $nome,
    $codDisciplina,
    $descricao,
    $horario,
    $sala
) {
    include_once __DIR__ . "/../../../config/connection.php";

    if (
        $nome && $codDisciplina && $descricao && $horario &&
        $sala
    ) {
        try {
            $sql = "INSERT INTO `disciplina` (`nome`, `codDisciplina`, `mensagem`,  `horario`, `sala`) VALUES (:nome, :codDisciplina, :mensagem, :horario, :sala)";
            $pdo = $pdo->prepare($sql);
            // executa a query com os parâmetros
            $pdo->bindParam(":nome", $nome);
            $pdo->bindParam(":codDisciplina", $codDisciplina);
            $pdo->bindParam(":mensagem", $descricao);
            $pdo->bindParam(":horario", $horario);
            $pdo->bindParam(":sala", $sala);
            // executa a query
            $pdo->execute();
            return true;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}

function readDisciplinaDb()
{
    include_once __DIR__ . "/../../../config/connection.php";
    $disciplinas = [];

    $sql = "SELECT * FROM disciplina";
    try {

        $resultado = $pdo->query($sql);
    } catch (\Throwable $e) {

        return false;
    }

    if ($resultado->rowCount() > 0)
        $disciplinas = $resultado->fetchAll(PDO::FETCH_ASSOC);

    return $disciplinas;
}

function updateDisciplinaDb(
    $id,
    $nome,
    $descricao,
    $horario,
    $sala
) {
    include_once __DIR__ . "/../../../config/connection.php";

    if (
        $nome && $descricao  && $horario &&
        $sala
    ) {
        try {
            $sql = "UPDATE `disciplina` SET 
                 `nome` =  '$nome',
            `mensagem` = '$descricao',
            `horario` = '$horario',
            `sala` = '$sala'
            WHERE `idDisciplina` = $id";

            $pdo = $pdo->query($sql);
        } catch (\Throwable $e) {

            return false;
        }
        return true;
    }
}

function deleteDisciplinaDb($id)
{
    include_once __DIR__ . "/../../../config/connection.php";

    if ($id) {
        try{
            $sql = "DELETE FROM disciplina WHERE idDisciplina  = '$id'";
            $pdo->query($sql);
            return true;
        }catch(\Throwable $th) {
            return false;
        }
        
    }

    return false;
}
