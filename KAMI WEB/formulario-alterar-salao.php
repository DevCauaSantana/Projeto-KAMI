<?php
session_start();
require ('logica-autenticacao.php');

$titulo = "Formulário de alteração de salão";
require 'cabecalho.php';

$id_salao = filter_input(INPUT_GET, "id_salao", FILTER_SANITIZE_NUMBER_INT);

if (empty($id_salao)) {
?>
    <div class="alert alert-danger" role="alert">
        <h4>FALHA ao abrir formulário para edição</h4>
        <p>ID do salão está vazio</p>
    </div>
<?php
}

require 'conexao.php';

$sql = "SELECT nomeSalao, telefoneSalao, urlfoto, ruaSalao, bairroSalao, numSalao, cidadeSalao FROM salao WHERE id_salao = ?";

$stmt = $conn->prepare($sql);

$result = $stmt->execute([$id_salao]);

$rowSalao = $stmt->fetch();
?>

<div class="container">
    <div class="row">
        <div class="col">
            <form action="alterar-salao.php" method="POST">
                <input type="hidden" name="id_salao" id="id_salao" value="<?= $id_salao ?>">

                <div class="row">
                    <div class="col-8">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="<?= $rowSalao['nomesalao'] ?>" required maxlength="40">
                            <label for="nome" class="fw-bold">Nome</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Telefone" value="<?= $rowSalao['telefonesalao'] ?>" pattern="(\([0-9]{2}\))\s([9]{1})?([0-9]{5})-([0-9]{4})" title="Número de telefone precisa estar no formato (XX) XXXXX-XXXX" required maxlength="15">
                            <label for="telefone" class="fw-bold">Telefone</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="form-floating mb-3">
                            <input type="url" class="form-control" name="urlfoto" placeholder="URL da foto" value="<?= $rowSalao['urlfoto'] ?>" maxlength="1000">
                            <label for="urlfoto" class="fw-bold">URL da foto do salão</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="rua" name="rua" placeholder="Rua" value="<?= $rowSalao['ruasalao'] ?>" required maxlength="40">
                            <label for="rua" class="fw-bold">Rua</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" value="<?= $rowSalao['bairrosalao'] ?>" required maxlength="40">
                            <label for="bairro" class="fw-bold">Bairro</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="num" name="num" placeholder="Numero" value="<?= $rowSalao['numsalao'] ?>" required>
                            <label for="num" class="fw-bold">Número</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" value="<?= $rowSalao['cidadesalao'] ?>" required maxlength="40">
                            <label for="cidade" class="fw-bold">Cidade</label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-dark btn-lg">Salvar</button>
                <button type="reset" class="btn btn-danger btn-lg">Cancelar</button>
        </div>
        <div class="col">
            <img src="barber-animate.svg" alt="">
        </div>
    </div>
</div>
</form>
</div>

<?php
require 'rodape.php'; ?>