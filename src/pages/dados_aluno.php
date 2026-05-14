<?php
session_start();
include '../components/header.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Autoescola Starter - Gerenciar Alunos</title>
  <link rel="stylesheet" href="../assets/css/dados_aluno.css">
</head>

<body>
  <?php
  require_once('../config/conexao.php');

  $sql = "select 
a.id_aluno,
a.nome,
a.email,
a.cpf,
a.telefone,
p.categoria,
u.nome as Instrutor
from aluno a
left join plano p on a.id_plano = p.id_plano
left join usuario u on a.id_usuario = u.id_usuario";

  $stmt = $pdo->prepare($sql);
  $stmt->execute();

  $aluno = $stmt->fetchAll(PDO::FETCH_ASSOC);
  ?>

  <main>
    <div class="container">
      <div class="header-table">
        <h1>Gerenciar Alunos<br>
          <p class="subtitle">Visualize, edite ou remova alunos cadastrados</p>
        </h1>

        <a href="../pages/form_aluno.php" class="btn-novo">+ Novo Aluno</a>
      </div>

      <div class="table-responsive">
        <table class="tabela-alunos">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>E-mail</th>
              <th>CPF</th>
              <th>Telefone</th>
              <th>Categoria</th>
              <th>Instrutor</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php if (count($aluno) > 0): ?>

              <?php foreach ($aluno as $row): ?>
                <tr>
                  <td><?php echo $row['id_aluno'] ?></td>
                  <td><?php echo $row['nome'] ?></td>
                  <td><?php echo $row['email'] ?></td>
                  <td><?php echo $row['cpf'] ?></td>
                  <td><?php echo $row['telefone'] ?></td>
                  <td><?php echo $row['categoria'] ?></td>
                  <td><?php echo $row['Instrutor'] ?></td>
                  <td class="acoes">
                    <a href="../pages/form_update_aluno.php?id_aluno=<?php echo $row['id_aluno']; ?>" class="btn-editar">✏️ Editar</a>
                    <!-- <a href="#" class="btn-excluir" onclick="return confirm('Tem certeza que deseja excluir este aluno?')">🗑️ Excluir</a> -->

                    <form method="POST" action="../aluno/delete_aluno.php"
                      style="display:inline;"
                      onsubmit="return confirm('Tem certeza que deseja excluir este aluno?');">

                      <input type="hidden" name="id_aluno" value="<?= $row['id_aluno']; ?>">

                      <button type="submit" class="btn-excluir">🗑️ Excluir</button>
                    </form>

                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr colspan="8">Nenhum aluno encontrado</tr>
            <?php endif ?>

          </tbody>
        </table>
      </div>
    </div>
  </main>

  <footer>
    <p>&copy; 2026 Autoescola Starter</p>
  </footer>

</body>

</html>