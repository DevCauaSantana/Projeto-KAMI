<?php
session_start();
require('logica-autenticacao.php');
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
            height: 150vh;
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
            height: 125vh;
            background-color: #08100F;
            padding: 7%;
        }
    </style>

    <script>
        function verifica_senhas() {
            var senha = document.getElementById("senha");
            var confsenha = document.getElementById("confsenha");

            if (senha.value && confsenha.value) {
                if (senha.value != confsenha.value) {
                    senha.classList.add("is-invalid");
                    confsenha.classList.add("is-invalid");
                    confsenha.value = null;
                } else {
                    senha.classList.remove("is-invalid");
                    confsenha.classList.remove("is-invalid");
                }
            }
        }
    </script>

    <div class="pai-login">

        <div class="esquerda-login">

            <h1 class="h1-login">KAMI</h1>

            <img src="logo.PNG" alt="logo do projeto KAMI" class="img-fluid rounded mx-auto d-block">

        </div>

        <div class="direita-login">

            <div class="div-login text-center">
                <h2 class="my-auto h2-login">Cadastro</h2>
                <h4>Cadastre-se para continuar </h4>
            </div>

            <div class="">
                <form class="formulario-login" action="inserir-cliente.php" method="POST">
                    <?php
                    if (isset($_SESSION["result"])) {
                        if ($_SESSION["result"]) {
                    ?>
                            <div class="alert alert-success" role="alert">
                                <h4>Conta cadastrada com sucesso!</h4>
                                <p>
                                    Clique <a href="form-login.php"> aqui </a>
                                    para se autenticar.
                                </p>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="alert alert-danger" role="alert">
                                <h4>Falha ao cadastrar a conta</h4>                              
                                <h6><?=$_SESSION["erro"]?></h6>
                            </div>
                    <?php
                        }
                        unset($_SESSION["result"]);
                        unset($_SESSION["erro"]);
                    }
                    ?>

                    <div class="col-5  mx-auto mb-2">
                        <label for="nome" class="form-label label-login">Insira seu nome</label>
                        <input type="text" class="form-control input-login" id="nome" name="nome" title="Informe apenas letras" required maxlength="40">
                    </div>
                    <div class="col-5  mx-auto mb-2">
                        <label for="email" class="form-label label-login">Insira seu email</label>
                        <input type="email" class="form-control input-login" id="email" name="email" required maxlength="40">
                    </div>
                    <div class="col-5  mx-auto mb-2">
                        <label for="tel" class="form-label label-login">Insira seu telefone</label>
                        <input type="telefone" class="form-control input-login" id="telefone" name="telefone" pattern="(\([0-9]{2}\))\s([9]{1})?([0-9]{5})-([0-9]{4})" title="Número de telefone precisa estar no formato (XX) XXXXX-XXXX" maxlength="15" required>
                    </div>
                    <div class="col-5  mx-auto mb-2">
                        <label for="senha" class="form-label label-login">Insira sua senha</label>
                        <input type="password" class="form-control input-login" id="senha" name="senha" required maxlength="150">
                    </div>
                    <div class="col-5  mx-auto mb-2">
                        <label for="confsenha" class="form-label label-login">Confirmação senha</label>
                        <input type="password" class="form-control input-login" id="confsenha" name="confsenha" required aria-describedby="confsenha confsenhaFeedback" onblur="verifica_senhas();">
                        <div id="confsenhaFeedback" class="invalid-feedback">
                            As senhas informadas não estão iguais.
                        </div>
                    </div>

                    <button type="submit" class="btn botao-login">Cadastrar-se</button>
                    <div class="text-center">
                        <br>
                        <a href="form-login.php" class="lh-lg link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Já possui conta? Entre já!</a>
                        <br>
                        <a href="index.php" class="lh-lg link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Voltar para página inicial</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="kami.js"></script>
</body>

</html>