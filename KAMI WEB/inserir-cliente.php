<?php
session_start();
require ('logica-autenticacao.php');

$titulo = "Página de inserção de cliente";
require 'cabecalho.php';

require 'conexao.php';
$erros = [];

// Função para verificar se uma string está vazia ou composta apenas por espaços em branco
function isEmpty($str) {
    return !isset($str) || trim($str) === '';
}

$nomeCli = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
$emailCli = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$telefoneCli = filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_SPECIAL_CHARS);
$senha = filter_input(INPUT_POST, "senha");

// Verificações de campos obrigatórios
if (isEmpty($nomeCli)) {
    $erros[] = "O campo Nome é obrigatório.";
}

if (isEmpty($emailCli)) {
    $erros[] = "O campo Email é obrigatório.";
}

if (isEmpty($telefoneCli)) {
    $erros[] = "O campo Telefone é obrigatório.";
}

if (isEmpty($senha)) {
    $erros[] = "O campo Senha é obrigatório.";
}

if (empty($erros)) {
    $sql = "INSERT INTO cliente (nomeCli, emailCli, telefoneCli, senhaCli) VALUES (?, ?, ?, crypt(?, gen_salt('bf', 8)))";

    try {
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([$nomeCli, $emailCli, $telefoneCli, $senha]);
    } catch (Exception $e) {
        $result = false;
        $error = $e->getMessage();
    }

    if ($result == true) {
        $_SESSION["result"] = true;
    } else {
        if (stripos($error, "duplicate key") !== false) {
            $error = "Atenção, o email \"$emailCli\" já está registrado.<br>";
        }
        $_SESSION["result"] = false;
        $_SESSION["erro"] = $error;
    }
} else {
    $_SESSION["result"] = false;
    $_SESSION["erro"] = implode("<br>", $erros);
}

redireciona("formulario-cliente.php");
?>
