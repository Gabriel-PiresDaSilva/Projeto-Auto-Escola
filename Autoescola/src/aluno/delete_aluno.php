<?php 
require_once '../config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_aluno = $_POST['id_aluno'];

    if (!$id_aluno || !is_numeric($id_aluno)) {
        echo "ID inválido!";
        exit;
    }

    $sql = "DELETE FROM aluno WHERE id_aluno = :id_aluno";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_aluno', $id_aluno);

    try {
        if ($stmt->execute()) {
            header('Location: ../pages/dados_aluno.php');
            exit;
        } else {
            echo 'Erro ao deletar o aluno';
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>