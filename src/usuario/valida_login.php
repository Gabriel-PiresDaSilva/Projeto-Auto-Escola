<?php
session_start();
include("../config/conexao.php");

$email = ($_POST['email']);
$senha = ($_POST['senha']);

$sql = "SELECT * FROM usuario WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":email", $email);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    if ($senha == $user['senha']) {
        $_SESSION['email'] = $email;
        $_SESSION['nome']  = $user['nome'];
        $_SESSION['cargo'] = $user['cargo'];
        header("Location: ../pages/index.php");
        exit;
    } else {
        header("Location: ../usuario/form_login.php?erro=2"); //quando a senha estiver errada vaai aparecer na url index.php?erro=2  e na tela do login vai informar o erro.
        exit;
    }
} else {
    header("Location: ../usuario/form_login.php?erro=1"); //quando o email estiver errado vai aparecer na url index.php?erro=1 e na tela do login vai informar o erro.
    exit;
}

//codigo paraa usar quando estiver usando criptografia com (password hash)
/* if ($user && password_verify($senha, $user["senha"])) {
    $_SESSION["id_usuario"] = $user["id_usuario"];
    $_SESSION["email"] = $user["email"];
    $_SESSION["nome"] = $user["nome"];
    header("location: dashboard.php");
    exit;
 }else{
    header("location: form_login.php?erro=1");
    exit;
 }
 */