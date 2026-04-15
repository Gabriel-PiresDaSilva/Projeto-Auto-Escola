<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit;
}

require_once __DIR__ . '';

$id = $_POST['id'] ?? null;

if (!$id || !is_numeric($id)) {
    echo "ID inválido!";
    exit;
}

// hard Delete
 $stmt = $pdo->prepare("DELETE FROM usuario WHERE id_usuario = ? AND tipo = 'aluno'");
 $stmt->execute([$id]);

header('Location: alunos.php');
exit;
?>