<?php
session_start();
include '../components/header.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Auto escola Starter</title>
  <link rel="stylesheet" href="../assets/css/index.css">
</head>

<body>
  <main>

    <div class="container">
      <div class="container-content">
        <h1>Dê o primeiro passo para sua CNH com quem sabe ensinar!</h1>
        <p>Na Starter, você aprende de verdade, do seu jeito e no seu ritmo. Aqui o iniciante vira motorista preparado, confiante e pronto para o trânsito.</p>

        <div class="container-buttons">
          <a href="../pages/form_aluno.php" class="btn primary">Começar agora</a>
          <a href="../pages/quem_somos.php" class="btn secondary">Saiba mais</a>
        </div>
      </div>
    </div>

    <!-- BENEFÍCIOS -->
    <div class="beneficios">
      <h2>Por que escolher a Starter?</h2>

      <div class="cards">
        <div class="card">
          <h3>🚗 Instrutores Qualificados</h3>
          <p>Profissionais experientes que te acompanham em todo processo.</p>
        </div>

        <div class="card">
          <h3>🕒 Horários Flexíveis</h3>
          <p>Manhã, tarde, noite e finais de semana.</p>
        </div>

        <div class="card">
          <h3>💰 Preço Justo</h3>
          <p>Planos acessíveis com condições especiais.</p>
        </div>
      </div>
    </div>

  </main>

  <footer>
    <p>&copy; 2026 Autoescola Starter</p>
  </footer>

</body>

</html>