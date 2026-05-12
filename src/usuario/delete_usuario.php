<?php 
require_once '../config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_usuario = $_POST['id_usuario'];

    if (!$id_usuario || !is_numeric($id_usuario)) {
        echo "ID inválido!";
        exit;
    }

    try {
        $sqlVerifica = "select id_usuario from aluno where id_usuario = :id_usuario";
        $stmtVerifica = $pdo->prepare($sqlVerifica);
        $stmtVerifica->bindParam(':id_usuario', $id_usuario);
        $stmtVerifica->execute();
        
        $existeAluno = $stmtVerifica->fetch(PDO::FETCH_ASSOC);
        
        if($existeAluno){
            echo "<script>
                alert('ERRO: Não é possível deletar este usuario pois ele está vinculado a um aluno!');
                window.location.href = '../pages/dados_usuario.php';
            </script>";
            exit;
        }

        $sql = "DELETE FROM usuario WHERE id_usuario = :id_usuario";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario);

        if ($stmt->execute()) {
            header('Location: ../pages/dados_usuario.php?sucesso=deletado');
            exit;
        } else {
            echo 'Erro ao deletar o usuario';
        }
        
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>