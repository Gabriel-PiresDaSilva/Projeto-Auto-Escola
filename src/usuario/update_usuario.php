<?php 
require_once '../config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_usuario = $_POST['id_usuario'];
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);
    $cargo = trim($_POST['cargo']);


    $sql = "update usuario set nome=:nome,email=:email,senha=:senha,cargo=:cargo where id_usuario=:id_usuario";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_usuario', $id_usuario);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
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
                    alert('erro: cpf ja cadastrado'); 
                    window.location.href = '../pages/dados_usuario.php';
                  </script>";
        } else {
            echo "Erro" . $e->getMessage();
        }
    }

}

?>