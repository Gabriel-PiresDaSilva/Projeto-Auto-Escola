<?php
session_start();

$usuarios = [
    'admin@autoescola.com' => [
        'senha' => '123456',
        'nome' => 'Administradora'
    ]
];

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    if (isset($usuarios[$email]) && $usuarios[$email]['senha'] === $senha) {
        $_SESSION['logado'] = true;
        $_SESSION['usuario_nome'] = $usuarios[$email]['nome'];
        $sucesso = 'Login realizado com sucesso!';
    } else {
        $erro = 'E-mail ou senha inválidos.';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Login - Autoescola</title>
</head>

<body>
    <div class="login-container">
        
    <div class="logo">
            <div class="icone"></div>
        </div>

        <?php if (!empty($erro)): ?>
            <div class="erro"><?= htmlspecialchars($erro) ?></div>
        <?php endif; ?>

        <?php if (!empty($sucesso)): ?>
            <div class="sucesso"><?= htmlspecialchars($sucesso) ?></div>
        <?php endif; ?>

        <form method="POST" action="main.php">
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input class="input" type="email" id="email" name="email" value="<?php echo isset($email) ? $email : ""; ?>" placeholder="Digite seu e-mail" required>
            </div>

            <div class="form-group">
                <label for="senha">Senha:</label>
                <input class="input" type="password" id="senha" name="senha" value="<?php echo isset($senha) ? $senha : ""; ?>" placeholder="Digite sua senha" required>
            </div>

            <div class="footer">
                <button type="submit" class="btn-login">Entrar</button>
          </form>
               <form method="POST" action="cadastro.php">
            <button type="submit" class="btn-cadastrar">Cadastrar</button>
             </form>             
            </div>
        <?php
        if (isset($_GET['erro']) && $_GET['erro'] == '1') {
            echo "<div class='erro'>Email incorreto.</div>";
        } else if (isset($_GET['erro']) && $_GET['erro'] == '2') {
            echo "<div class='erro'>Senha incorreta.</div>";
        }
        ?>

    </div>
</body>

</html>