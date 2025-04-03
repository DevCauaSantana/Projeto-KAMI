<?php
session_start();
require('logica-autenticacao.php');

/* Proteção página --- Permissão acesso */
if(!autenticadocli() or autenticadocab()){
    $_SESSION["restrito"] = true;
    redireciona();
    die();
}

$titulo = "Seu perfil";
require 'cabecalho.php';

$id_cli = filter_input(INPUT_GET, "id_cli", FILTER_SANITIZE_NUMBER_INT);

if(id_cli() != $id_cli){
    $_SESSION["result"] = false;
    $_SESSION["erro"] = "Operação não permitida";
    redireciona();
    die();
}

if (empty($id_cli)) {
?>
    <div class="alert alert-danger" role="alert">
        <h4>FALHA ao abrir formulário para edição</h4>
        <p>ID do cliente está vazio</p>
    </div>
<?php
}

require 'conexao.php';

$sql = "SELECT nomeCli, telefoneCli FROM  cliente WHERE id_cli = ?";

$stmt = $conn->prepare($sql);

$result = $stmt->execute([$id_cli]);

$rowCli = $stmt->fetch();
?>

<div class="container">
    <div class="row">
        <div class="col">
            <img src="profile-client-animate.svg" alt="">
        </div>

        <div class="col my-5">
            <form action="alterar-cliente.php" method="POST">
                <input type="hidden" name="id_cli" id="id_cli" value="<?= $id_cli ?>">

                <div class="row">
                    <div class="col-8">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="<?= $rowCli['nomecli'] ?>" disabled maxlength="40">
                            <label for="nome" class="fw-bold">Nome</label>
                        </div>
                    </div>
                </div>
                <!--length>40-->

                <div class="row">
                    <div class="col-8">
                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Telefone" value="<?= $rowCli['telefonecli'] ?>" pattern="(\([0-9]{2}\))\s([9]{1})?([0-9]{5})-([0-9]{4})" title="Número de telefone precisa estar no formato (XX) XXXXX-XXXX" disabled maxlength="15">
                            <label for="telefone" class="fw-bold">Telefone</label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-secondary btn-lg" id="Salvar" disabled>Salvar</button>

                <button type="button" class="btn btn-dark btn-lg" id="editarPerfil" onclick="habilitarEdicao()">Editar perfil</button>
            </form>
        </div>
    </div>
</div>

<script>
    function habilitarEdicao() {
        document.getElementById('nome').disabled = false;
        document.getElementById('telefone').disabled = false;

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