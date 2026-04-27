<?php
include("../config/conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);
    $cpf = trim($_POST['cpf']);
    $telefone = trim($_POST['telefone']);
    $endereco = trim($_POST['endereco']);
    $numero = trim($_POST['numero']);
    $complemento = !empty($_POST['complemento']) ? trim($_POST['complemento']) : null;
    $bairro = trim($_POST['bairro']);
    $estado = trim($_POST['estado']);
    $cep = trim($_POST['cep']);
    $id_plano = trim($_POST['plano']);
    $id_usuario = trim($_POST['instrutor']);

/*  $verifica = $pdo->prepare("select id_aluno from aluno where cpf = :cpf");
    $verifica->bindParam(':cpf', $cpf);
    $verifica->execute(); */


    $sql = "INSERT INTO aluno (nome, email, senha, cpf, telefone, endereco, numero, complemento, bairro, estado, cep, id_plano, id_usuario) VALUES (:nome, :email, :senha, :cpf, :telefone, :endereco, :numero, :complemento, :bairro, :estado, :cep, :id_plano, :id_usuario)";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':endereco', $endereco);
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':complemento', $complemento);
    $stmt->bindParam(':bairro', $bairro);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':cep', $cep);
    $stmt->bindParam(':id_plano', $id_plano);
    $stmt->bindParam(':id_usuario', $id_usuario);

    try {
        if ($stmt->execute()) {
            header('location: ../pages/dados_aluno.php');
            exit;
        } else {
            echo 'Erro ao cadastrar o aluno';
        }
    } catch (PDOException $e) {
        if ($e->errorInfo[1] == '2627') {
            echo "<script>
                    alert('erro: cpf ja cadastrado'); 
                    window.location.href = '../pages/dados_aluno.php';
                  </script>";
        } else {
            echo "Erro" . $e->getMessage();
        }
    }
}
