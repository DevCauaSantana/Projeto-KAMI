<?php
session_start();
require ('logica-autenticacao.php');
$titulo = "Página de cadastro de salão";

if(!autenticadocab() and !autenticadocli()){
  $_SESSION["restrito"] = true;
  $_SESSION["erro"] = '<h4>Apenas os cabeleireiros possuem acesso à essa página.</h4><p class="fs-6">Clique <a href="formulario-cabeleireiro.php">aqui</a> para se cadastrar como cabeleireiro ou 
  <a href="form-login.php">aqui</a> para logar.</p>';

  redireciona();
  die();
}elseif(autenticadocli()){
  $_SESSION["restrito"] = true;
  $_SESSION["erro"] = '<h4>Apenas os cabeleireiros possuem acesso à essa página.</h4><p class="fs-6">Clique <a href="formulario-cabeleireiro.php">aqui</a> para se cadastrar como cabeleireiro ou 
  <a href="form-login.php">aqui</a> para logar.</p>';
  redireciona();
}

require 'cabecalho.php';

echo "<br>";
?>
<script>
    function imagePreview(valor) {
        var img = document.getElementById('image-preview');
        if (valor) {
            img.setAttribute('src', valor);
            img.style.display = 'inline';
        } else {
            img.style.display = 'none';
        }
    }
</script>

<div class="container">
  <div class="row">
    <div class="col">
<?php
    if (isset($_SESSION["erros_salao"])) {
    foreach ($_SESSION["erros_salao"] as $erro) {
?>
    <div class="alert alert-danger" role="alert">
        <h4>Falha ao efetuar a gravação</h4>
        <h6><?= $erro; ?></h6>
    </div>
<?php
    }
    unset($_SESSION["erros_salao"]);
}
?>
      <form action="inserir-salao.php" method="POST">

      <input type="hidden" id="id_cab" name="id_cab" value="<?=id_cab()?>">

        <div class="row">
          <div class="col-8">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" title="Informe apenas letras" required maxlength="40">
              <label for="nome" class="fw-bold">Nome</label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
            <div class="form-floating mb-3">
              <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Telefone" pattern="(\([0-9]{2}\))\s([9]{1})?([0-9]{5})-([0-9]{4})" title="Número de telefone precisa estar no formato (XX) XXXXX-XXXX"  maxlength="15" required>
              <label for="telefone" class="fw-bold">Telefone</label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
            <div class="form-floating mb-3">
              <input type="url" class="form-control" name="urlfoto" placeholder="URL da foto" onchange="imagePreview(this.value)" maxlength="1000">
              <label for="urlfoto" class="fw-bold">URL da foto do salão</label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="rua" name="rua" placeholder="Rua" required maxlength="40">
              <label for="rua" class="fw-bold">Rua</label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" required maxlength="40">
              <label for="bairro" class="fw-bold">Bairro</label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
            <div class="form-floating mb-3">
              <input type="number" class="form-control" id="num" name="num" placeholder="Numero" required>
              <label for="num" class="fw-bold">Número</label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" title="Informe apenas letras" required maxlength="40">
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
require 'rodape.php';
 ?>