<?php
session_start();
include("../config/conexao.php");

$email = ($_POST['email']);
$senha = ($_POST['senha']);

$sql = "select * from usuario where email = :email";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":email", $email);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($senha, $user["senha"])) {
    $_SESSION["email"] = $user["email"];
    $_SESSION["nome"] = $user["nome"];
    $_SESSION["cargo"] = $user["cargo"];
    header("location: ../pages/index.php");
    exit;
}

$sqlAluno = "select * from aluno where email = :email";
$stmtAluno = $pdo->prepare($sqlAluno);
$stmtAluno->bindValue(":email", $email);
$stmtAluno->execute();

$aluno = $stmtAluno->fetch(PDO::FETCH_ASSOC);

if ($aluno && password_verify($senha, $aluno["senha"])) {
    $_SESSION["email"] = $aluno["email"];
    $_SESSION["nome"] = $aluno["nome"];   
    header("location: ../pages/index.php"); 
    exit;
}
header("location: ../pages/form_login.php?erro=1");
exit;
?>