<?php
@session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}
$titulo = "Painel de Controle";
include_once __DIR__ . "/header_dash.php";
?>

<div class="container">

    <?php
    include_once __DIR__ . "/menu.php";
    ?>


</div>
<?php
include_once __DIR__ . "/footer_dash.php";
?>