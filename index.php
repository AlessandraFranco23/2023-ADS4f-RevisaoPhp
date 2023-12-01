<?php
include __DIR__ . "/src/partials/header.php";

?>
<main>
    <div class="container">

        <div id="carinicial" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner ">
                <div class="carousel-item active ">
                    <img class="d-block w-100" src="https://i.pinimg.com/736x/74/89/26/7489262b43adf5e42092d57e1f792df0.jpg" alt="Mensagem de Seja Bem-Vindo">
                </div>
                <div class="carousel-item ">
                    <img class="d-block w-100" src="https://api.escolaamiga.pt/files/8c83b7cf-424f-4ed4-8649-1ab9ce0f4df7.jpg" alt="Mensagem de Melhor professor do mundo!">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carinicial" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carinicial" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Próximo</span>
            </button>
        </div>
    </div>
</main>

<?php
include __DIR__ . "/src/partials/footer.php";
?>