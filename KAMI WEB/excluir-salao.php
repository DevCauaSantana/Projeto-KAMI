<?php
session_start();
require ('logica-autenticacao.php');

if(!autenticadocab() and !autenticadocli()){
    $_SESSION["restrito"] = true;
    $_SESSION["erro"] = "<h4>Operação não permitida</h4>";
    redireciona();
    die();
  }elseif(autenticadocli()){
    $_SESSION["restrito"] = true;
    $_SESSION["erro"] = "<h4>Operação não permitida</h4>";
    redireciona();
    die();
  }

$titulo = "Pagina de exclusão de salões";

require 'conexao.php';

$id_salao= filter_input(INPUT_GET, "id_salao", FILTER_SANITIZE_NUMBER_INT);


echo "<p><b>ID:</b> $id_salao</p>";

$sqlsalao = "DELETE FROM salao WHERE id_salao= ?;"; 
$sqlagendamento = "DELETE FROM agendamento WHERE id_salao = ?";

try {
    
   $stmt = $conn->prepare($sqlagendamento);
    $result = $stmt->execute([$id_salao]);  

    $stmt = $conn->prepare($sqlsalao);
    $result = $stmt->execute([$id_salao]);   
    
} catch (Exception $e) {
    $result = false;
    $error = $e->getMessage();
    echo $error;
}

$cont =  $stmt->rowCount();

if ($result == true && $cont >= 1) {
    $_SESSION["salaoexcluido"] = true;
    redireciona("");
    die();
} elseif ($cont == 0) {
    $_SESSION["result"] = false;
    $_SESSION["erro"] = "Não foi encontrado nenhum salão com o ID ($id_salao)";
    //redireciona();
    die();

} else {
    $_SESSION["result"] = false;
    $_SESSION["erro"] = $error;
    //redireciona();
    die();
    $errorArray = $stmt->errorInfo();

}