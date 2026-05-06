<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Autoescola Starter - Contato</title>
  <link rel="stylesheet" href="../assets/css/contato.css">
</head>

<body>

  <header>
    <div class="topo">
      <h1>Autoescola Starter</h1>

      <nav>
        <ul class="menu">
          <?php if (isset($_SESSION['cargo']) && $_SESSION['cargo'] == 'Administrador') : ?>
            <li class="dropdown">
              <span class="dropdown-btn">Cadastrar ▼</span>
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

          <!-- LOGIN À DIREITA -->
          <li class="login-menu">
            <?php if (isset($_SESSION['email'])): ?>
              <?php echo 'Bem vindo, ' . $_SESSION['nome']; ?>
              <a href="../usuario/logout.php">[ sair ]</a>
            <?php else: ?>
              <a href="../usuario/form_login.php">Login</a>
            <?php endif; ?>
          </li>
        </ul>
      </nav>
    </div>
  </header>

  <main>
    <section class="contato-container">
      <h1>Contato</h1>
      <p>Está pronto para dar a partida? Então fale com a gente!</p>
    </section>

    <section class="contato-grid">
      <!-- INFORMAÇÕES -->
      <div class="contato-info">
        <div class="card">
          <h3>📞 Telefone / WhatsApp</h3>
          <p>(XX) XXXX-XXXX</p>
        </div>
        <div class="card">
          <h3>✉️ E-mail</h3>
          <p>contato@autoescolastarter.com.br</p>
        </div>
        <div class="card">
          <h3>📍 Endereço</h3>
          <p>Rua Exemplo, 123 – Centro</p>
          <p>Cidade – Estado | CEP: 12345-678</p>
        </div>
        <div class="card">
          <h3>🕐 Horário</h3>
          <p>Segunda à sexta: 8h às 20h</p>
          <p>Sábado: 8h às 12h</p>
          <p>Domingo e feriados: fechado</p>
        </div>
      </div>
    </section>
  </main>

  <footer>
    <p>&copy; 2026 Autoescola Starter</p>
  </footer>

</body>

</html>