<?php
session_start();
require('logica-autenticacao.php');

if(!autenticadocab() or autenticadocli()){
    $_SESSION["restrito"] = true;
    redireciona();
    die();
}

$titulo = "Seu perfil";
require 'cabecalho.php';

$id_cab = filter_input(INPUT_GET, "id_cab", FILTER_SANITIZE_NUMBER_INT);

if(id_cab() != $id_cab){
    $_SESSION["result"] = false;
    $_SESSION["erro"] = "Operação não permitida";
    redireciona();
    die();
}

if (empty($id_cab)) {
?>
    <div class="alert alert-danger" role="alert">
        <h4>FALHA ao abrir formulário para edição</h4>
        <p>ID do cabeleireiro está vazio</p>
    </div>
<?php
}

require 'conexao.php';

$sql = "SELECT nomeCab FROM  cabeleireiro WHERE id_cab = ?";

$stmt = $conn->prepare($sql);

$result = $stmt->execute([$id_cab]);

$rowCli = $stmt->fetch();
?>

<div class="container">
    <div class="row">
        <div class="col">
            <img src="profile-client-animate.svg" alt="">
        </div>

        <div class="col my-5">
            <form action="alterar-cabeleireiro.php" method="POST">
                <input type="hidden" name="id_cab" id="id_cab" value="<?= $id_cab ?>">

                <div class="row">
                    <div class="col-8">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="<?= nomecab() ?>" disabled maxlength="40">
                            <label for="nome" class="fw-bold">Nome</label>
                        </div>
                    </div>
                </div>
                <!--length>40-->

                <button type="submit" class="btn btn-secondary btn-lg" id="Salvar" disabled>Salvar</button>

                <button type="button" class="btn btn-dark btn-lg" id="editarPerfil" onclick="habilitarEdicao()">Editar perfil</button>
            </form>
        </div>
    </div>
</div>

<script>
    function habilitarEdicao() {
        document.getElementById('nome').disabled = false;

        // Altera a classe do botão para btn-secondary
        document.getElementById('editarPerfil').classList.replace('btn-dark', 'btn-secondary');
        document.getElementById('Salvar').classList.replace('btn-secondary', 'btn-dark');

        // Remove a propriedade 'disabled' do botão "Salvar" e adiciona a propriedade 'disabled' no botão "Editar perfil"
        document.getElementById('Salvar').disabled = false;
        document.getElementById('editarPerfil').disabled = true;
    }
</script>

<?php
require 'rodape.php'; ?>