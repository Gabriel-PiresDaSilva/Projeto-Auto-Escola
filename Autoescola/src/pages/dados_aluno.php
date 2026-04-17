<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Autoescola Starter - Gerenciar Alunos</title>
    <link rel="stylesheet" href="../assets/css/dados_aluno.css">
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
                <h1>Gerenciar Alunos</h1>
                <p class="subtitle">Visualize, edite ou remova alunos cadastrados</p>
                <a href="../aluno/cadastro_aluno.php" class="btn-novo">+ Novo Aluno</a>
            </div>

            <!-- Barra de pesquisa -->
            <div class="search-bar">
                <input type="text" id="pesquisa" placeholder="🔍 Pesquisar aluno por nome, CPF ou e-mail...">
                <button class="btn-pesquisar">Pesquisar</button>
            </div>

            <!-- Tabela de alunos -->
            <div class="table-responsive">
                <table class="tabela-alunos">
                    <thead>
                        <tr>
                            <th>ID></th>
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
                        <?php if(count($aluno) > 0): ?>
                        
                        <?php foreach ($aluno as $row): ?>
                        <tr>
                            <td><?php echo $row ['id_aluno'] ?></td>
                            <td><?php echo $row ['nome'] ?></td>
                            <td><?php echo $row ['email'] ?></td>
                            <td><?php echo $row ['cpf'] ?></td>
                            <td><?php echo $row ['telefone'] ?></td>
                            <td><?php echo $row ['categoria'] ?></td>
                            <td><?php echo $row ['Instrutor'] ?></td>
                            <td class="acoes">
                                <a href="../usuario/form_update_aluno.php?id_aluno=<?php echo $row['id_aluno']; ?>" class="btn-editar">✏️ Editar</a>
                                <a href="#" class="btn-excluir" onclick="return confirm('Tem certeza que deseja excluir este aluno?')">🗑️ Excluir</a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        <?php else: ?>
                            <tr colspan="8">Nenhum aluno encontrado</tr>
                            <?php endif?>

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