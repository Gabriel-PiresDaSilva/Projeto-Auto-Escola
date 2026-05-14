<?php
session_start();
include '../components/header.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Autoescola Starter - Gerenciar Usuarios</title>
  <link rel="stylesheet" href="../assets/css/dados_usuario.css">
</head>

<body>
  <?php
  require_once('../config/conexao.php');

  $sql = "select id_usuario, nome, email, cargo from usuario";

  $stmt = $pdo->prepare($sql);
  $stmt->execute();

  $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);
  ?>

  <main>
    <div class="container">
      <div class="header-table">
        <h1>Gerenciar Alunos<br>
          <p class="subtitle">Visualize, edite ou remova usuarios cadastrados</p>
        </h1>
        <a href="../pages/form_usuario.php" class="btn-novo">+ Novo usuario</a>
      </div>

      <div class="table-responsive">
        <table class="tabela-usuario">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>E-mail</th>
              <th>Cargo</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php if (count($usuario) > 0): ?>

              <?php foreach ($usuario as $row): ?>
                <tr>
                  <td><?php echo $row['id_usuario'] ?></td>
                  <td><?php echo $row['nome'] ?></td>
                  <td><?php echo $row['email'] ?></td>
                  <td><?php echo $row['cargo'] ?></td>
                  <td class="acoes">
                    <a href="../pages/form_update_usuario.php?id_usuario=<?php echo $row['id_usuario']; ?>" class="btn-editar">✏️ Editar</a>

                    <form method="POST" action="../usuario/delete_usuario.php"
                      style="display:inline;"
                      onsubmit="return confirm('Tem certeza que deseja excluir este usuario?');">

                      <input type="hidden" name="id_usuario" value="<?= $row['id_usuario']; ?>">

                      <button type="submit" class="btn-excluir">🗑️ Excluir</button>
                    </form>

                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr colspan="8">Nenhum usuario encontrado</tr>
            <?php endif ?>

          </tbody>
        </table>
      </div>
    </div>
  </main>
</body>

</html>
<?php
include '../components/footer.php';
?>