<?php
session_start();
require 'logica-autenticacao.php';

if (autenticadocli() or autenticadocab()) {
    redireciona();
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="kami.css" rel="stylesheet">
</head>

<body>

    <style>
        .botao-login {
            background-color: #926952;
            width: 35%;
            letter-spacing: 2px;
            font-weight: 500;
            margin-top: 5%;
            margin-left: 33%;
        }

        .input-login {
            background-color: gray;
            border: solid 0.5px #926952;
            border-radius: 0;
        }

        .label-login {
            color: #926952;
        }

        .h2-login {
            font-size: 200%;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        .h1-login {
            font-size: 10vw;
            font-family: 'Poppins', sans-serif;
            letter-spacing: 3vw;
        }


        .pai-login {
            display: flex;
        }

        .esquerda-login {
            width: 50vw;
            height: 110vh;
            background-color: #433128;
            color: #AD826A;
            text-align: center;
        }

        .direita-login {
            width: 50vw;
        }

        .div-login {
            height: 25vh;
            background-color: #926952;
            font-size: xx-large;
            padding: 5vh;
        }

        .formulario-login {
            height: 85vh;
            background-color: #08100F;
            padding: 7%;
        }
    </style>

    <div class="pai-login">

        <div class="esquerda-login">

            <h1 class="h1-login">KAMI</h1>

            <img src="logo.PNG" alt="logo do projeto KAMI" class="img-fluid rounded mx-auto d-block">

        </div>

        <div class="direita-login">

            <div class="div-login text-center ">
                <h2 class="my-auto h2-login">Login</h2>
                <h4>Entre para continuar </h4>
            </div>

            <div class="">
                <form class="formulario-login" action="login.php" method="POST">

                    <?php
                    if (isset($_SESSION["result_login"])) {
                        if ($_SESSION["result_login"]) {
                    ?>
                            <div class="alert alert-success" role="alert">
                                <h4>Autenticado com sucesso!</h4>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="alert alert-danger" role="alert">
                                <h4>Falha ao se autenticar</h4>
                                <h6><?= $_SESSION["erro"] ?></h6>
                            </div>
                    <?php
                        }
                        unset($_SESSION["result_login"]);
                        unset($_SESSION["erro"]);
                    }
                    ?>

                    <div class="col-5  mx-auto ">
                        <label for="email" class="form-label label-login">Insira seu email</label>
                        <input type="email" class="form-control input-login" id="email" name="email" aria-describedby="emailHelp" maxlength="40" placeholder="exemplo@email.com" required>
                    </div>

                    <br>

                    <div class="col-5  mx-auto ">
                        <label for="senha" class="form-label label-login">Insira sua senha</label>
                        <input type="password" class="form-control input-login" id="senha" name="senha" aria-describedby="senha" placeholder="******" required maxlength="150">
                    </div>

                    <br>

                    <div class="form-check col-5  mx-auto">
                        <input class="form-check-input" type="radio" name="tipo_acesso" id="cliente" value="cliente" checked>
                        <label class="form-check-label text-light" for="cliente">
                            Cliente
                        </label>
                    </div>

                    <div class="form-check col-5  mx-auto">
                        <input class="form-check-input" type="radio" name="tipo_acesso" id="cabeleireiro" value="cabeleireiro">
                        <label class="form-check-label text-light" for="cabeleireiro">
                            Cabeleireiro
                        </label>
                    </div>

                    <br>

                    <button type="submit" class="btn botao-login">Entrar</button>
                    <br>
                    <div class="text-center">
                        <br>
                        <a href="tipo-acesso.php" class="lh-lg link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Ainda não possui conta? Cadastre-se já!</a>
                        <br>
                        <a href="index.php" class="lh-lg link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Voltar para página inicial</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>

</html>