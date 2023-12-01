<?php
require_once __DIR__ . '/../actions/disciplina.php';

if (isset($_GET['idNot'])) {
    $idNot = $_GET['idNot'];
    deleteDisciplinaAction($idNot);
}
