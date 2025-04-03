<?php

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="logo.PNG" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>KAMI</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/bootstrap.min.css" rel="stylesheet">
    <link href="kami.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .font-1 {
            color: #000 !important;
            font-weight: bolder;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="dist/dashboard.css" rel="stylesheet">

</head>

<body style="background-color: #e6ccb2;">


    <nav class="navbar navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand fs-2" href="index.php">K A M I</a>

            <?php
            if (!autenticadocli() and !autenticadocab()) {
            ?>
                <a href="tipo-acesso.php" class="btn btn-light px-3" style="background-color: #fdfffc;">
                    <span data-feather="user-plus"></span>
                    Cadastrar
                </a>
                <a href="form-login.php" class="btn btn-light px-3" style="background-color: #fdfffc;">
                    <span data-feather="log-in"></span>
                    Entrar
                </a>
            <?php
            } elseif (autenticadocli()) {
            ?>
                <a href="perfil-cliente.php?id_cli=<?= id_cli() ?>">
                    <span class="fs-6 text-light btn btn-secondary me-2">
                        <span data-feather="user"></span>
                        <?= nomecli();?>
                    </span>
                </a>

                <a href="sair.php" class="btn btn-danger me-2">
                    <span data-feather="log-out"></span>
                    Sair
                </a>
            <?php
            } elseif (autenticadocab()) {
            ?>
            <a href="perfil-cabeleireiro.php?id_cab=<?= id_cab() ?>">
                <span class="fs-6 text-light btn btn-secondary me-2">
                    <span data-feather="user"></span>
                    <?= nomecab(); ?>
                </span>

                <a href="sair.php" class="btn btn-danger me-2">
                    <span data-feather="log-out"></span>
                    Sair
                </a>
            <?php
            }
            ?>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end fade" style="background-color: #433128;" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h1 class="offcanvas-title text-light" id="offcanvasDarkNavbarLabel">Opções</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item fs-3">
                            <a class="nav-link active" aria-current="page" href="listagem-salao.php"><span data-feather="scissors" style="width:36px;height:36px;"></span> Salões</a>
                        </li>

                        <?php
                        if (autenticadocab()) {
                        ?>
                            <li class="nav-item fs-3">
                                <a class="nav-link active" aria-current="page" href="formulario-salao.php"><span data-feather="plus-square" style="width:36px;height:36px;"></span> Adicionar Salão</a>
                            </li>
                        <?php
                        }
                        ?>
                        <li class="nav-item fs-3">
                            <a class="nav-link active" aria-current="page" href="index.php"><span data-feather="info" style="width:36px;height:36px;"></span> Sobre</a>
                        </li>
                        <?php
                        if (autenticadocli()) {
                        ?>
                            <li class="nav-item fs-3">
                                <a class="nav-link active text-danger" aria-current="page" href="excluir-cliente.php?id_cli=<?= id_cli() ?>" onclick="if(!confirm('Tem certeza que deseja excluir sua conta?')) return false;"><span data-feather="trash" style="width:36px;height:36px;"></span> Excluir conta</a>
                            </li>
                        <?php
                        } elseif (autenticadocab()) {
                        ?>
                            <li class="nav-item fs-3">
                                <a class="nav-link active text-danger" aria-current="page" href="excluir-cabeleireiro.php?id_cab=<?= id_cab() ?>" onclick="if(!confirm('Tem certeza que deseja excluir sua conta?')) return false;"><span data-feather="trash" style="width:36px;height:36px;"></span> Excluir conta</a>
                            </li>
                        <?php
                        }
                        ?>
                </div>
            </div>
        </div>

    </nav>


    <main class="col-md-9 mx-auto col-lg-auto px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="display-4"><?php echo $titulo ?></h1>
        </div>