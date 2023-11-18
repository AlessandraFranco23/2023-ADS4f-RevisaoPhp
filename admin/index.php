<?php
session_start();
$_SESSION['usuario'] = null;

if (isset($_POST['form_email']) && isset($_POST['form_pass'])) {

    include_once __DIR__ . "/../config/connection.php";

    $email = $_POST['form_email'];
    $pass = $_POST['form_pass'];


    $pass = md5($pass . $chave);


    $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :pass";
    $pdo = $pdo->prepare($sql);
    $pdo->bindParam(":email", $email);
    $pdo->bindParam(":pass", $pass);
    $pdo->execute();

    if ($pdo->rowCount() == 1) {
        $_SESSION['usuario'] = $pdo->fetch(PDO::FETCH_ASSOC)['email'];
        header("Location: dashboard.php"); // https://www.php.net/manual/function.header.php
    }
    // $user = $pdo->fetch(PDO::FETCH_ASSOC);
    // session_start();
    // $_SESSION['user'] = $user;

}

include_once __DIR__ . "/header_dash.php";
?>


<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <h1>Administrador</h1>
            <p>Seja bem vindo ao painel de controle do site.</p>
        </div>
        <div class="col-md-6">
            <form action="" method="post">
                <label for="email" class="form-label">
                    <input class="form-control" type="email" name="form_email" placeholder="digite seu e-mail"
                        id="email">
                </label>
                <label for="password" class="form-label">
                    <input class="form-control" type="password" name="form_pass" placeholder="digite sua senha"
                        id="password">
                </label>
                <input type="submit" value="Entrar">
            </form>

        </div>
    </div>
</div>

<?php
include_once __DIR__ . "/footer_dash.php";
?>