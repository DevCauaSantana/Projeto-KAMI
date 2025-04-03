<?php
session_start();
require ('logica-autenticacao.php');

/* Proteção página --- Permissão acesso */
if(!autenticadocli() or autenticadocab()){
    $_SESSION["restrito"] = true;
    redireciona();
    die();
}

/* Proteção página --- Permissão acesso */
require 'conexao.php';
$id_cli = filter_input(INPUT_GET, "id_cli", FILTER_SANITIZE_NUMBER_INT);

if(id_cli() != $id_cli){
    $_SESSION["result"] = false;
    $_SESSION["erro"] = "Operação não permitida";
    redireciona();
    die();
}

// echo "<p><b>ID:</b> $id</p>";

$sqlagendamento = "DELETE FROM agendamento WHERE id_cli= ?;"; 
$sqlcli = "DELETE FROM cliente WHERE id_cli = ?";

try {
    
   $stmt = $conn->prepare($sqlagendamento);
    $result = $stmt->execute([$id_cli]);  

    $stmt = $conn->prepare($sqlcli);
    $result = $stmt->execute([$id_cli]);   
    
} catch (Exception $e) {
    $result = false;
    $error = $e->getMessage();
    echo $error;
}

$cont =  $stmt->rowCount();

if ($result == true && $cont >= 1) {
    redireciona("sair.php");
    die();
} elseif ($cont == 0) {
    $_SESSION["result"] = false;
    $_SESSION["erro"] = "Não foi encontrado nenhum usuário com o ID ($id_cli)";
    //redireciona();
    die();

} else {
    $_SESSION["result"] = false;
    $_SESSION["erro"] = $error;
    //redireciona();
    die();
    $errorArray = $stmt->errorInfo();

}
?>