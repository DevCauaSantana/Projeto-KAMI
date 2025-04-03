<?php
session_start();
require ('logica-autenticacao.php');

$titulo = "Página de alteração de salão";

require 'conexao.php';

$id_salao = filter_input(INPUT_POST, "id_salao", FILTER_SANITIZE_NUMBER_INT);
$nomeSalao = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
$telefoneSalao = filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_SPECIAL_CHARS);
$urlfoto = filter_input(INPUT_POST, "urlfoto", FILTER_SANITIZE_URL);
$ruaSalao= filter_input(INPUT_POST, "rua", FILTER_SANITIZE_SPECIAL_CHARS);
$bairroSalao = filter_input(INPUT_POST, "bairro", FILTER_SANITIZE_SPECIAL_CHARS);
$numSalao = filter_input(INPUT_POST, "num", FILTER_SANITIZE_NUMBER_INT);
$cidadeSalao = filter_input(INPUT_POST, "cidade", FILTER_SANITIZE_SPECIAL_CHARS);

$sql = "UPDATE salao SET nomeSalao = ?, telefoneSalao = ?, urlfoto = ?, ruaSalao = ?, bairroSalao = ?, numSalao = ?, cidadeSalao = ? WHERE id_salao = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$nomeSalao, $telefoneSalao, $urlfoto, $ruaSalao, $bairroSalao, $numSalao, $cidadeSalao, $id_salao]);
$cont =  $stmt->rowCount();

if ($result == true && $cont >= 1) {
    $_SESSION["salaoalterado"] = true;

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
