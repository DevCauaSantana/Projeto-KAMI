<?php
session_start();
require 'logica-autenticacao.php';

require 'conexao.php';

$tipo_acesso = filter_input(INPUT_POST, "tipo_acesso", FILTER_SANITIZE_SPECIAL_CHARS);

if ($tipo_acesso == "cliente") {

    $emailCli = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $senhaCli = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_SPECIAL_CHARS);

    $sql = "SELECT id_cli, emailcli, nomecli, telefonecli, senhacli FROM cliente WHERE emailcli = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$emailCli]);
    $row = $stmt->fetch();


    if (password_verify($senhaCli, $row['senhacli'])) {
        //DEU CERTO
        $_SESSION["emailcli"] = $emailCli;
        $_SESSION["nomecli"] = $row['nomecli'];
        $_SESSION["telefonecli"] = $row['telefonecli'];
        $_SESSION["id_cli"] = $row['id_cli'];

        $_SESSION["result_login"] = true;
        $_SESSION["logado"] = true;
        redireciona("index.php");

    } else {
        //NÂO DEU CERTO
        unset($_SESSION["emailcli"]);
        unset($_SESSION["nomecli"]);
        unset($_SESSION["telefonecli"]);

        $_SESSION["result_login"] = false;
        $_SESSION["erro"] = "Usuário e/ou Senha incorretos";
        redireciona("form-login.php");
    }

}

elseif($tipo_acesso == "cabeleireiro"){

    $emailCab = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $senhaCab = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_SPECIAL_CHARS);

    $sql = "SELECT id_cab, emailcab, nomecab, senhacab FROM cabeleireiro WHERE emailcab = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$emailCab]);
    $row = $stmt->fetch();


    if (password_verify($senhaCab, $row['senhacab'])) {
        //DEU CERTO
        $_SESSION["emailcab"] = $emailCab;
        $_SESSION["nomecab"] = $row['nomecab'];
        $_SESSION["id_cab"] = $row['id_cab'];

        $_SESSION["result_login"] = true;
        redireciona("index.php");

    } else {
        //NÂO DEU CERTO
        unset($_SESSION["emailcab"]);
        unset($_SESSION["nomecab"]);

        $_SESSION["result_login"] = false;
        $_SESSION["erro"] = "Usuário ou Senha incorretos";
        redireciona("form-login.php");
    }

}
