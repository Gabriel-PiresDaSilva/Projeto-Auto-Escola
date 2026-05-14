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

if ($user && password_verify($senha, $user["senha"])) {
  $_SESSION["email"] = $user["email"];
  $_SESSION["nome"] = $user["nome"];
  $_SESSION["cargo"] = $user["cargo"];
  header("location: ../pages/index.php");
  exit;
} else {
  header("location: ../pages/form_login.php?erro=1");
  exit;
}
