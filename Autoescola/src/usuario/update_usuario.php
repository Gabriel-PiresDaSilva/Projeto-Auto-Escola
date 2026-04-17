<?php 
require_once '../config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_aluno = $_POST['id_aluno'];
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);
    $cargo = trim($_POST['cargo']);


    $sql = "update aluno set nome=:nome,email=:email,senha=:senha,cargo=:cargo where id_aluno=:id_usuario";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_aluno', $id_aluno);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':cargo', $cargo);


try {
        if ($stmt->execute()) {
            header('location: ../usuario/dados_aluno.php');
            exit;
        } else {
            echo 'Erro ao cadastrar o aluno';
        }
    } catch (PDOException $e) {
        if ($e->errorInfo[1] == '2627') {
            echo "<script>
                    alert('erro: cpf ja cadastrado'); 
                    window.location.href = '../usuario/dados_aluno.php';
                  </script>";
        } else {
            echo "Erro" . $e->getMessage();
        }
    }

}

?>