<?php

/*exemplo de validações*/ 

require 'conexao.php';
require 'cabecalho.php';

// Inicialize o array de erros
$erros = [];

// ...

// Validar o campo "cpf"
$cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_SPECIAL_CHARS);
if (empty($cpf)) {
    $erros["cpf"] = "O CPF do usuário é obrigatório.";
    echo '<div class="alert alert-danger" role="alert">' . $erros["cpf"] . '</div>';
} elseif (!preg_match('/^\d{3}\.\d{3}\.\d{3}-\d{2}$/', $cpf)) {
    $erros["cpf"] = "O CPF do usuário deve ter o formato correto.";
}

// Validar o campo "nome"
$nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
if (empty($nome)) {
    $erros["nome"] = "O nome do Usuário é obrigatório.";
    echo '<div class="alert alert-danger" role="alert">' . $erros["nome"] . '</div>';
} elseif (!preg_match('/^[A-Za-zÀ-ÿ\s]+$/', $nome)) {
    $erros["nome"] = "O nome do Usuário contém caracteres inadequados. Apenas letras e espaços são permitidos.";
} elseif (strlen($nome) < 3 || strlen($nome) > 30) {
    $erros["nome"] = "O nome do Usuário deve ter entre 3 e 30s caracteres.";
}

// Validar o campo "email"
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
if (empty($email)) {
    $erros["email"] = "O email do usuário é obrigatório.";
    echo '<div class="alert alert-danger" role="alert">' . $erros["email"] . '</div>';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erros["email"] = "O email do usuário não é válido.";
}

// Validar o campo "telefone"
$telefone = filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_SPECIAL_CHARS);
if (empty($telefone)) {
    $erros["telefone"] = "O número de telefone do usuário é obrigatório.";
    echo '<div class="alert alert-danger" role="alert">' . $erros["telefone"] . '</div>';
} elseif (!preg_match('/^\(\d{2}\) \d{4,5}-\d{5}$/', $telefone)) {
    $erros["telefone"] = "O número de telefone do usuário deve ter o formato correto.";
}

// Validar o campo "senha"
$senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_SPECIAL_CHARS);
if (empty($senha)) {
    $erros["senha"] = "A senha do usuário é obrigatória.";
    echo '<div class="alert alert-danger" role="alert">' . $erros["senha"] . '</div>';
} elseif (strlen($senha) < 3) {
    $erros["senha"] = "A senha do usuário deve ter pelo menos 3 caracteres.";
}


if (!empty($erros)) {
    $_SESSION["erros"] = $erros;
    header("Location: cadastro.php");
    exit();
}


$cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_SPECIAL_CHARS);
$nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$telefone= filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_SPECIAL_CHARS);
$senha= filter_input(INPUT_POST, "senha", FILTER_SANITIZE_SPECIAL_CHARS);
$tipo_usuario = 1;
$senha_hash = password_hash($senha, PASSWORD_BCRYPT);



$sql_verificar_cpf = "SELECT COUNT(*) FROM usuario WHERE cpf = ?";
$stmt_verificar_cpf = $conn->prepare($sql_verificar_cpf);
$stmt_verificar_cpf->execute([$cpf]);
$cpf_existente = $stmt_verificar_cpf->fetchColumn();

$sql_verificar_email = "SELECT COUNT(*) FROM usuario WHERE email = ?";
$stmt_verificar_email = $conn->prepare($sql_verificar_email);
$stmt_verificar_email->execute([$email]);
$email_existente = $stmt_verificar_email->fetchColumn();


if ($cpf_existente) {
    ?>
    <div class="alert alert-danger" role="alert">
        <h4>FALHA ao efetuar a gravação dos dados</h4>
        <p>O CPF já está cadastrado. Escolha outro CPF ou Clique aqui <a href="login.php">Entrar</a></li></p>
    </div>
    <?php
} elseif ($email_existente) {
    ?>
    <div class="alert alert-danger" role="alert">
        <h4>FALHA ao efetuar a gravação dos dados</h4>
        <p>O email já está cadastrado. Escolha outro email ou Clique aqui <a href="login.php"> Entrar</a></p>
    </div>
    <?php
} else {
    $sql = "INSERT INTO usuario(cpf, nome, email, telefone, senha) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$cpf, $nome, $email, $telefone, $senha_hash]);

    if ($result == true) {
        ?>
        <div class="alert alert-success" role="alert">
            <h4>Perfil gravado com SUCESSO!</h4>
            <meta http-equiv="refresh" content="1.2; login.php">
        </div>
        <?php
    } else {
        $errorArray = $stmt->errorInfo();
        ?>
        <div class="alert alert-danger" role="alert">
            <h4>FALHA ao efetuar a gravação dos dados</h4>
            <p><?= $errorArray[2]; ?></p>
        </div>
        <?php
    }
}

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
