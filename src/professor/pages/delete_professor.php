<?php

require_once __DIR__ . '/../actions/professor.php';

if (isset($_GET['idNot'])) {
    $idNot = $_GET['idNot'];
    deleteProfessorAction($idNot);
}
