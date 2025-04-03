<?php
session_start();
require('logica-autenticacao.php');

$titulo = "Página de inserção de cabeleireiro";
require 'cabecalho.php';

require 'conexao.php';
$erros = [];

// Função para verificar se uma string está vazia ou composta apenas por espaços em branco
function isEmpty($str) {
    return !isset($str) || trim($str) === '';
}

$nomeCab = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
$emailCab = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, "senha");

// Verificações de campos obrigatórios
if (isEmpty($nomeCab)) {
    $erros[] = "O campo Nome é obrigatório.";
}

if (isEmpty($emailCab)) {
    $erros[] = "O campo Email é obrigatório.";
}

if (isEmpty($senha)) {
    $erros[] = "O campo Senha é obrigatório.";
}

if (empty($erros)) {
    $sql = "INSERT INTO cabeleireiro (nomeCab, emailCab, senhaCab) VALUES (?, ?, crypt(?, gen_salt('bf', 8)))";

    try {
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([$nomeCab, $emailCab, $senha]);
    } catch (Exception $e) {
        $result = false;
        $error = $e->getMessage();
    }

    if ($result == true) {
        $_SESSION["result"] = true;
    } else {
        if (stripos($error, "duplicate key") !== false) {
            $error = "Atenção, o email \"$emailCab\" já está registrado.<br>";
        }
        $_SESSION["result"] = false;
        $_SESSION["erro"] = $error;
    }
} else {
    $_SESSION["result"] = false;
    $_SESSION["erro"] = implode("<br>", $erros);
}

redireciona("formulario-cabeleireiro.php");
?>
