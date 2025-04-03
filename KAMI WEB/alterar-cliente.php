<?php
session_start();
require ('logica-autenticacao.php');

$titulo = "Página de alteração dos dados do cliente";

require 'conexao.php';

$id_cli = filter_input(INPUT_POST, "id_cli", FILTER_SANITIZE_NUMBER_INT);
$nomeCli = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
$telefoneCli = filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_SPECIAL_CHARS);

$sql = "UPDATE cliente SET nomeCli = ?, telefoneCli = ? WHERE id_cli = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$nomeCli, $telefoneCli, $id_cli]);
$cont =  $stmt->rowCount();

if ($result == true && $cont >= 1) {
    $_SESSION["clientealterado"] = true;
    $_SESSION["nomecli"] = $nomeCli;
    $_SESSION["telefonecli"] = $telefoneCli;
?>
<?php

} elseif ($result == true && $cont == 0) {
?>
    <div class="alert alert-secondary" role="alert">
        <h4>Nenhum dado foi alterado</h4>
    </div>
<?php

} else {
    $errorArray = $stmt->errorInfo();

?>
    <div class="alert alert-danger" role="alert">
        <h4>FALHA ao efetuar a gravação dos dodos</h4>
        <p><?= $errorArray[2]; ?></p>
    </div>
<?php
}
redireciona();
?>
