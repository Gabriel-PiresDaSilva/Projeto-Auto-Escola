<?php 
require_once '../config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_usuario = $_POST['id_usuario'];

    if (!$id_usuario || !is_numeric($id_usuario)) {
        echo "ID inválido!";
        exit;
    }

    $sql = "DELETE FROM usuario WHERE id_usuario = :id_usuario";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_usuario', $id_usuario);

    try {
        if ($stmt->execute()) {
            header('Location: ../pages/dados_usuario.php');
            exit;
        } else {
            echo 'Erro ao deletar o usuario';
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>