<?php
session_start();
include '../components/header.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Autoescola Starter - Cadastro de Usuário</title>
  <link rel="stylesheet" href="../assets/css/form_user.css">
</head>

<body>
  <main>
    <div class="form-container">
      <h1>Cadastro de Usuário</h1>
      <p class="subtitle">Preencha os dados para criar um novo usuário</p>

      <form action="../usuario/insert_usuario.php" method="POST" class="usuario-form">

        <div class="form-group">
          <label for="nome">Nome Completo*</label>
          <input type="text" id="nome" name="nome" value="<?php echo isset($nome) ? $nome : ""; ?>" required placeholder="Digite o nome completo">
        </div>

        <div class="form-group">
          <label for="email">E-mail*</label>
          <input type="email" id="email" name="email" required value="<?php echo isset($email) ? $email : ""; ?>" placeholder="email@exemplo.com">
        </div>

        <div class="form-group">
          <label for="senha">Senha*</label>
          <input type="password" id="senha" name="senha" required value="<?php echo isset($senha) ? $senha : ""; ?>" placeholder="Digite a senha">
        </div>

        <div class="form-group">
          <label for="cargo">Cargo*</label>
          <select id="cargo" name="cargo" value="<?php echo isset($cargo) ? $cargo : ""; ?>" required>
            <option value="">Selecione o cargo</option>
            <option value="Administrador">Administrador</option>
            <option value="Instrutor">Instrutor</option>
          </select>
        </div>

        <div class="form-buttons">
          <button type="submit" class="btn-submit">Cadastrar Usuário</button>
          <button type="reset" class="btn-reset">Limpar</button>
          <a href="../pages/index.php" class="btn-cancel">Cancelar</a>
        </div>
      </form>
    </div>
  </main>
</body>

</html>
<?php
include '../components/footer.php';
?>