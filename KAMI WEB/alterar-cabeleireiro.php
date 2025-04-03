<?php
session_start();
require ('logica-autenticacao.php');

$titulo = "Página de alteração dos dados do cabeleireiro";

require 'conexao.php';

$id_cab = filter_input(INPUT_POST, "id_cab", FILTER_SANITIZE_NUMBER_INT);
$nomeCab = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);

$sql = "UPDATE cabeleireiro SET nomecab = ? WHERE id_cab = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$nomeCab, $id_cab]);
$cont =  $stmt->rowCount();

if ($result == true && $cont >= 1) {
    $_SESSION["cabeleireiroalterado"] = true;
    $_SESSION["nomecab"] = $nomeCab;
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
