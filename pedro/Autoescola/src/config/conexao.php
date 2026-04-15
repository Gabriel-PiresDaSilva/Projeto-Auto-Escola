<?php
$server = "localhost\\SQLEXPRESS";
$database = "AutoEscola";

try {
    $pdo = new PDO("sqlsrv:Server=$server;Database=$database;TrustServerCertificate=true");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro na conexao:" . $e->getMessage();
    echo "Erro de conexao" . $e->getCode();
}
    