<?php
session_start();
include '../components/header.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Autoescola Starter - Contato</title>
  <link rel="stylesheet" href="../assets/css/contato.css">
</head>

<body>
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
          <p>(11) 12345-6784</p>
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

</body>

</html>
<?php
include '../components/footer.php';
?>