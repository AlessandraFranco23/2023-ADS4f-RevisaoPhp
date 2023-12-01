<?php

require_once __DIR__ . '/../actions/aluno.php';

if (isset($_GET['idNot'])) {

    $idNot = $_GET['idNot'];

    deleteAlunoAction($idNot);
}
