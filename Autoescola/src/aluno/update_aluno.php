<?php 
require_once '../config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_aluno = $_POST['id_aluno'];
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

    $sql = "update aluno set nome=:nome,email=:email,senha=:senha,cpf=:cpf,telefone=:telefone,endereco=:endereco,numero=:numero,complemento=:complemento,bairro=:bairro,estado=:estado,cep=:cep,id_plano=:plano,id_usuario=:instrutor where id_aluno=:id_aluno";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_aluno', $id_aluno);
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
    $stmt->bindParam(':plano', $id_plano);
    $stmt->bindParam(':instrutor', $id_usuario);

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

?>