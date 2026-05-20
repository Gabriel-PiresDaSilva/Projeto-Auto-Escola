<?php
session_start();
include '../components/header.php';
require_once('../config/conexao.php');

if (isset($_GET['id_usuario'])) {
  $id = $_GET['id_usuario'];

  $sql = "SELECT * FROM usuario where id_usuario = :id_usuario";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(":id_usuario", $id);
  $stmt->execute();

  $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$usuario) {
    die("Usuario nao encontrado");
  }
} else {
  die("Id do aluno nao informado");
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Autoescola Starter - Alterar cadastro de Aluno</title>
  <link rel="stylesheet" href="../assets/css/form_user.css">
</head>

<body>

  <main>
    <div class="form-container">
      <h1>Alterar cadastro de Usuário</h1><br>
      <form action="../usuario/update_usuario.php" method="POST" class="usuario-form">

        <input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario'] ?>">

        <div class="form-group">
          <label for="nome">Nome Completo*</label>
          <input type="text" id="nome" name="nome" maxlength="100" value="<?php echo ($usuario['nome']); ?>" required placeholder="Digite o nome completo">
        </div>

        <div class="form-group">
          <label for="email">E-mail*</label>
          <input type="email" id="email" name="email" maxlength="100" required value="<?php echo ($usuario['email']); ?>" placeholder="email@exemplo.com">
        </div>

        <div class="form-group">
          <label for="senha">Senha*</label>
          <input type="password" id="senha" name="senha" maxlength="100" placeholder="Digite a senha">
        </div>

        <div class="form-group">
          <label for="cargo">Cargo*</label>
          <select id="cargo" name="cargo" required>
            <option value="">Selecione o cargo</option>
            <option value="Administrador" <?= ($usuario['cargo'] == 'Administrador') ? 'selected' : '' ?>>Administrador</option>
            <option value="Instrutor" <?= ($usuario['cargo'] == 'Instrutor') ? 'selected' : '' ?>>Instrutor</option>
          </select>
        </div>

        <div class="form-buttons">
          <button type="submit" class="btn-submit">Alterar</button>
          <button type="reset" class="btn-reset">Limpar</button>
          <a href="../pages/dados_usuario.php" class="btn-cancel">Voltar</a>
        </div>
      </form>
    </div>
  </main>
</body>
</html>
<?php
include '../components/footer.php';
?>