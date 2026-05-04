<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/login.css">
  <title>Formulario de login</title>
</head>

<body>
  <div class="login-container">
    <div class="logo">
      <img src="../assets/img/logo-car.png" alt="logo-autoescola" class="img-logo">
    </div>

    <form method="POST" action="../usuario/valida_login.php">
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
      </div>

    </form>

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