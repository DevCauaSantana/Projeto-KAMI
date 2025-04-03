<?php
session_start();
require ('logica-autenticacao.php');

/* Proteção página --- Permissão acesso */
if(!autenticadocab() or autenticadocli()){
    $_SESSION["restrito"] = true;
    $_SESSION["erro"] = "<h4>Operação não permitida</h4>";
    redireciona();
    die();
}


/* Proteção página --- Permissão acesso */
require 'conexao.php';
$id_cab = filter_input(INPUT_GET, "id_cab", FILTER_SANITIZE_NUMBER_INT);

if(id_cab() != $id_cab){
    $_SESSION["result"] = false;
    $_SESSION["erro"] = "<h4>Operação não permitida</h4>";
    redireciona();
    die();
}
    
// echo "<p><b>ID:</b> $id</p>";
$sqlAgendamento = "DELETE FROM agendamento WHERE id_salao IN (SELECT id_salao FROM salao WHERE id_cab = ?)";
$sqlsalao = "DELETE FROM salao WHERE id_cab = ?;"; 
$sqlcab = "DELETE FROM cabeleireiro WHERE id_cab = ?";


try {

    $stmt = $conn->prepare($sqlAgendamento);
    $result = $stmt->execute([$id_cab]);
    
   $stmt = $conn->prepare($sqlsalao);
    $result = $stmt->execute([$id_cab]);  

    $stmt = $conn->prepare($sqlcab);
    $result = $stmt->execute([$id_cab]);   
    
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
    $_SESSION["erro"] = "Não foi encontrado nenhum usuário com o ID ($id_cab)";
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