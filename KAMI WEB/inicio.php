<?php
session_start();
require 'logica-autenticacao.php';
require 'conexao.php';

$titulo = "Sobre o projeto KAMI";

require 'cabecalho.php';

if (isset($_SESSION["restrito"]) && $_SESSION["restrito"]) {
?>
    <div class="alert alert-danger" role="alert">
        <?= $_SESSION["erro"] ?>
    </div>
<?php
    unset($_SESSION["erro"]);
    unset($_SESSION["restrito"]);
}

if (isset($_SESSION["agendamento"])) {
?>
    <div class="alert alert-success" role="alert">
        <h4>Horário agendado com sucesso!</h4>
    </div>
<?php
    unset($_SESSION["agendamento"]);
}

if (isset($_SESSION["salao"])) {
?>
    <div class="alert alert-success" role="alert">
        <h4>Salão cadastrado com sucesso!</h4>
    </div>
<?php
    unset($_SESSION["salao"]);
}

if (isset($_SESSION["salaoexcluido"])) {
?>
    <div class="alert alert-success" role="alert">
        <h4>Salão excluído com sucesso!</h4>
    </div>
<?php
    unset($_SESSION["salaoexcluido"]);
}

if (isset($_SESSION["salaoalterado"])) {
?>
    <div class="alert alert-success" role="alert">
        <h4>Dados alterados com sucesso!</h4>
    </div>
<?php
    unset($_SESSION["salaoalterado"]);
}

if (isset($_SESSION["clientealterado"])) {
?>
    <div class="alert alert-success" role="alert">
        <h4>Dados alterados com sucesso!</h4>
    </div>
<?php
    unset($_SESSION["clientealterado"]);
}

if (isset($_SESSION["cabeleireiroalterado"])) {
?>
    <div class="alert alert-success" role="alert">
        <h4>Dados alterados com sucesso!</h4>
    </div>
<?php
    unset($_SESSION["cabeleireiroalterado"]);
}

if (isset($_SESSION["logado"])) {
    ?>
        <div class="alert alert-success" role="alert">
            <h4>Autenticado com sucesso!</h4>
        </div>
    <?php
        unset($_SESSION["logado"]);
    }
?>

<p class="display-5 text-center">
    <strong>KAMI - Agendamento em salões de cabeleireiro</strong>
</p>
<img src="logo.PNG" class="rounded mx-auto d-block" alt="Logotipo KAMI">
<hr>
<p class="fs-4 text-justify">
    Desenvolvido pelos alunos Cauã Santana e Júlia Bispo, o projeto KAMI é muito mais do que um simples sistema de agendamento para salões de cabeleireiro. Ele representa a solução definitiva para eliminar todos os conflitos e obstáculos que costumam surgir na hora de marcar um horário para um corte de cabelo. Com sua abordagem altamente automatizada e repleta de funcionalidades inteligentes, o KAMI eleva a experiência de agendamento a um novo patamar de excelência nos salões de beleza.
</p>
<p class="fs-4 text-justify">
    O nome "KAMI" em si possui um significado adicional e interessante. Na língua japonesa, "kami" pode ser traduzido como "cabelo". Essa conexão linguística com o universo da beleza capilar adiciona um toque especial ao projeto, demonstrando como ele está profundamente enraizado na cultura e na essência do serviço de cabeleireiro. Portanto, o KAMI não é apenas um sistema; é uma expressão de cuidado e dedicação à indústria da beleza.
</p>
<hr>

<?php
require 'rodape.php'; ?>