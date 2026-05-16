<?php
include("../config/conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $nome = trim($_POST['nome']);
  $email = trim($_POST['email']);
  $senha = trim($_POST['senha']);
  $cargo = trim($_POST['cargo']);

  $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

  $sql = "insert into usuario (nome, email, senha, cargo) values (:nome, :email, :senha, :cargo)";

  $stmt = $pdo->prepare($sql);

  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':senha', $senhaHash);
  $stmt->bindParam(':cargo', $cargo);

  try {
    if ($stmt->execute()) {
      header('location: ../pages/dados_usuario.php');
      exit;
    } else {
      echo 'Erro ao cadastrar o usuario';
    }
  } catch (PDOException $e) {
    if ($e->errorInfo[1] == '2627') {
      echo "<script>
                    alert('erro: email ja cadastrado'); 
                    window.location.href = '../pages/dados_usuario.php';
                  </script>";
    } else {
      echo "Erro" . $e->getMessage();
    }
  }
}
