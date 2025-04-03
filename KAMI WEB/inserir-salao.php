<?php
session_start();
require('logica-autenticacao.php');

$titulo = "Página de cadastro de salão";
require 'conexao.php';

$id_cab = filter_input(INPUT_POST, "id_cab", FILTER_SANITIZE_NUMBER_INT);
$nomeSalao = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
$telefoneSalao = filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_SPECIAL_CHARS);
$ruaSalao = filter_input(INPUT_POST, "rua", FILTER_SANITIZE_SPECIAL_CHARS);
$bairroSalao = filter_input(INPUT_POST, "bairro", FILTER_SANITIZE_SPECIAL_CHARS);
$numSalao = filter_input(INPUT_POST, "num", FILTER_SANITIZE_NUMBER_INT);
$cidadeSalao = filter_input(INPUT_POST, "cidade", FILTER_SANITIZE_SPECIAL_CHARS);

// Verificações de campos obrigatórios
$erros = [];

if (empty($nomeSalao)) {
    $erros[] = "O campo Nome é obrigatório.";
}

if (empty($telefoneSalao)) {
    $erros[] = "O campo Telefone é obrigatório.";
}

if (empty($ruaSalao)) {
    $erros[] = "O campo Rua é obrigatório.";
}

if (empty($bairroSalao)) {
    $erros[] = "O campo Bairro é obrigatório.";
}

if (empty($numSalao)) {
    $erros[] = "O campo Número é obrigatório.";
}

if (empty($cidadeSalao)) {
    $erros[] = "O campo Cidade é obrigatório.";
}

if (empty($erros)) {
    $sql = "INSERT INTO salao (id_cab, nomeSalao, telefoneSalao, ruaSalao, bairroSalao, numSalao, cidadeSalao) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$id_cab, $nomeSalao, $telefoneSalao, $ruaSalao, $bairroSalao, $numSalao, $cidadeSalao]);

    if ($result == true) {
        $_SESSION["salao"] = true;
    } else {
        $errorArray = $stmt->errorInfo();
        $_SESSION["erro"] = "FALHA ao efetuar a gravação dos dados. Detalhes: " . $errorArray[2];
    }
} else {
    $_SESSION["erros_salao"] = $erros;
    redireciona("formulario-salao.php");
    exit; // Adicionando 'exit' para garantir que o script pare aqui e não continue para a exibição do formulário.
}

redireciona();
?>
