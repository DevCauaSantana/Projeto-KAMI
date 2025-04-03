<?php
session_start();
require 'logica-autenticacao.php';

$titulo = "Agendamento";

require 'conexao.php';

$id_cli = filter_input(INPUT_POST, "id_cli", FILTER_SANITIZE_NUMBER_INT);
$id_salao = filter_input(INPUT_POST, "id_salao", FILTER_SANITIZE_NUMBER_INT);
$horario = filter_input(INPUT_POST, "agendamento", FILTER_SANITIZE_SPECIAL_CHARS);

$sql = "INSERT INTO agendamento (id_cli, id_salao, horario) VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);

$result = $stmt->execute([$id_cli, $id_salao, $horario]);

if ($result == true) {
    $_SESSION["agendamento"] = true;
?>
    <div class="alert alert-success" role="alert">1
        <h4>Horário agendado com sucesso!</h4>
    </div>
<?php
} else {
    $errorArray = $stmt->errorInfo();

?>
    <div class="alert alert-danger" role="alert">
        <h4>FALHA ao se agendar</h4>
        <p><?= $errorArray[2]; ?></p>
    </div>
<?php

}
redireciona();
?>