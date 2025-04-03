<?php

function autenticadocli(){
    if (isset($_SESSION["emailcli"])) {
        return true;
    } else {
        return false;
    }
}

function autenticadocab(){
    if (isset($_SESSION["emailcab"])) {
        return true;
    } else {
        return false;
    }
}

function nomecli(){
    return $_SESSION['nomecli']; 
}

function emailcli(){
    return $_SESSION["emailcli"];
}

function telefonecli(){
    return $_SESSION["telefonecli"]; 
}

function id_cli(){
    return $_SESSION["id_cli"];
}

function nomecab(){
    return $_SESSION["nomecab"]; 
}

function emailcab(){
    return $_SESSION["emailcab"];
}

function id_cab(){
    return $_SESSION["id_cab"];
}

function redireciona ($pagina = null){

    if(empty($pagina)){
        $pagina = "index.php";
    }
header("Location: " . $pagina);
}