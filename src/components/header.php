<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/header.css">
  <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/1085/1085961.png">
</head>

<body>
  <div class="topo">
    <a href="../pages/index.php" class="img-logo"> <img src="../assets/img/logo-car.png" alt="logo-autoescola" class="img-logo"></a>
    <nav>
      <ul class="menu">
        <?php if (isset($_SESSION['cargo']) && $_SESSION['cargo'] == 'Administrador') : ?>
          <li class="dropdown">
            <span class="dropdown-btn">Cadastrar ▾</span>
            <ul class="dropdown-content">
              <li><a href="../pages/form_aluno.php">📝 Cadastrar Aluno</a></li>
              <li><a href="../pages/form_usuario.php">👤 Cadastrar Usuário</a></li>
              <li><a href="../pages/dados_aluno.php">✏️ Lista de alunos</a></li>
              <li><a href="../pages/dados_usuario.php">✍️ Lista de usuarios</a></li>

            </ul>
          </li>
        <?php endif; ?>
        <li><a href="../pages/index.php">Home</a></li>
        <li><a href="../pages/quem_somos.php">Quem Somos</a></li>
        <li><a href="../pages/contato.php">Contato</a></li>

        <li class="login-menu">
          <?php if (isset($_SESSION['email'])): ?>
            <?php echo 'Bem vindo, ' . $_SESSION['nome']; ?>
            <a href="../usuario/logout.php">[ sair ]</a>
          <?php else: ?>
            <a href="../pages/form_login.php">Login</a>
          <?php endif; ?>
        </li>
      </ul>
    </nav>
  </div>
</body>

</html>